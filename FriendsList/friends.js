// Encapsulate your code to avoid conflicts with other scripts
(function() {
    // Get the button that opens the popup
    var btn = document.getElementById("openForm");

    // Get the popup form element
    var popup = document.getElementById("findFriendsModal");

    // Get the element that closes the popup
    var closeBtn = document.getElementsByClassName("close-btn")[0];

    // When the user clicks the button, open the popup
    btn.onclick = function() {
        popup.style.display = "block";
    };

    // When the user clicks on <span> (x), close the popup
    closeBtn.onclick = function() {
        popup.style.display = "none";
    };

    // When the user clicks anywhere outside of the popup, close it
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    };
})();



$(document).ready(function() {
    $('#findFriendsForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        var formData = $(this).serialize(); // Serialize form data
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: 'http://localhost/CSC-482-Final-Project/FriendsList/friend_list.php', // Adjust the path to your PHP script
            data: formData,
            dataType: 'json', // Expect JSON response from the server
            success: function(response) {
                if (response.success && response.users) {
                    var userNames = response.users.map(function(user) {return user.username;}).join(", ");
                    alert("Users found: " + userNames);
                } else if (response.success && response.message) {
                    alert(response.message);
                } else {
                    alert(response.message || "An error as occurred");
                }
            },
            error: function() {
                alert('There was an error processing your request. Please try again.');
            }
        });
    });
});


$(document).ready(function() {
    $('#openForm').on('click', function() {
        // Call fetch friend requests when the Find Friends button is clicked
        fetchFriendRequests();
    });
});

function fetchFriendRequests() {
    fetch('../FriendsList/display_request.php') // Adjust the path to your PHP script
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const requestsList = document.getElementById('friendRequestsList');
                requestsList.innerHTML = ''; // Clear existing list
                data.requests.forEach(request => {
                    requestsList.innerHTML += `
                        <li class="list-group-item">
                            ${request.username} - Requested on: ${new Date(request.request_date).toLocaleDateString()}
                            <button class="btn btn-success btn-sm" onclick="acceptRequest(${request.user_id})">Accept</button>
                            <button class="btn btn-danger btn-sm" onclick="rejectRequest(${request.user_id})">Reject</button>
                        </li>`;
                });
            } else {
                // No requests or an error occurred
                document.getElementById('friendRequestsList').innerHTML = '<li class="list-group-item">No incoming requests.</li>';
            }
        })
        .catch(error => {
            console.error('There was an error fetching the friend requests:', error);
        });
}


function acceptRequest(friendUserId) {
    fetch('../FriendsList/request_accept.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user_id=${friendUserId}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.success) {
            
            fetchFriendRequests();
        }
    })
    .catch(error => {
        console.error('There was an error accepting the friend request:', error);
    });
}

function rejectRequest(friendUserId) {
    fetch('../FriendsList/request_reject.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user_id=${friendUserId}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.success) {
            
            fetchFriendRequests();
        }
    })
    .catch(error => {
        console.error('There was an error rejecting the friend request:', error);
    });
}

$(document).ready(function() {
    $('#openForm').on('click', function() {
        fetchFriendRequests();
        fetchFriends();
    });
});

function fetchFriends() {
    console.log("fetchFriends is called");
    fetch('../FriendsList/fetch_friends.php') 
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.success) {
                const friendsList = document.getElementById('currentFriendsList');
                friendsList.innerHTML = ''; // Clear existing list
                data.friends.forEach(friend => {
                    console.log(friend);
                    friendsList.innerHTML += `<li class="list-group-item">${friend.friend_username}</li>`;
                });
            } else {
                document.getElementById('currentFriendsList').innerHTML = '<li class="list-group-item">No friends found.</li>';
            }
        })
        .catch(error => {
            console.error('There was an error fetching the friends:', error);
        });
}
