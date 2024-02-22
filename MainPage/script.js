document.addEventListener("DOMContentLoaded", function() {
    // Filter button click event
    document.getElementById("filter-btn").addEventListener("click", function() {
        var selectedGame = document.getElementById("game-filter").value;
        filterPosts(selectedGame);
    });

    // Create post button click event
    document.getElementById("create-post-btn").addEventListener("click", function() {
        var game = document.getElementById("game-select").value;
        var rank = document.getElementById("rank-input").value;
        createPost(game, rank);
    });

    // Function to filter posts by game
    function filterPosts(game) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_posts.php?game=" + game, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.querySelector(".posts-section").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    // Function to create a new post
    function createPost(game, rank) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "create_post.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                filterPosts("all"); // Refresh posts after creating a new one
            }
        };
        xhr.send("game=" + game + "&rank=" + rank);
    }

    // Initial load of all posts
    filterPosts("all");
});
