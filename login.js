document.addEventListener('DOMContentLoaded', function() {
    // Check if user is logged in and update the navigation
    if (localStorage.getItem("isLoggedIn") === "true") {
        const loginLink = document.getElementById("login-link");
        if (loginLink) {
            loginLink.innerHTML = '<i class="fas fa-user"></i>';
            loginLink.href = "profile.html"; // Direct to profile page (or any other page for logged-in users)
        }
    }

    // Handle login form submission
    const loginForm = document.getElementById("login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            // Get the email and password
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            // Allow any email and password combination to log in
            localStorage.setItem("isLoggedIn", "true"); // Set login status in localStorage

            alert("Login successful! Redirecting to homepage.");
            window.location.href = "Homepage.html"; // Redirect to homepage
        });
    }
});
