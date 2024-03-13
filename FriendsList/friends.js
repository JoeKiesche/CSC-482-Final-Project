// Encapsulate your code to avoid conflicts with other scripts
(function() {
    // Get the button that opens the popup
    var btn = document.getElementById("openForm");

    // Get the popup form element
    var popup = document.getElementById("popupForm");

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

        $.ajax({
            type: 'POST',
            url: 'http://localhost/CSC-482-Final-Project/FriendsList/friend_list.php', // Adjust the path to your PHP script
            data: formData,
            dataType: 'json', // Expect JSON response from the server
            success: function(response) {
                if (response.success) {
                    alert(response.message); // Or update the UI in a more sophisticated way
                    // Optional: Close modal or clear form
                } else {
                    alert(response.message); // Or show the error in the modal directly
                }
            },
            error: function() {
                alert('There was an error processing your request. Please try again.');
            }
        });
    });
});
