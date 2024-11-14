$(document).ready(function() {
    $("#registerForm").on("submit", function(e) {
        let valid = true;
        
        // Check username
        if ($("#username").val().trim() === "") {
            alert("Username is required");
            valid = false;
        }

        // Check email
        const email = $("#email").val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email");
            valid = false;
        }

        // Check password
        const password = $("#password").val().trim();
        const confirmPassword = $("#confirm_password").val().trim();
        if (password.length < 6) {
            alert("Password must be at least 6 characters");
            valid = false;
        }
        if (password !== confirmPassword) {
            alert("Passwords do not match");
            valid = false;
        }

        // Prevent form submission if validation fails
        if (!valid) {
            e.preventDefault();
        }
    });
});
$(document).ready(function() {
    $("#loginForm").on("submit", function(e) {
        let valid = true;
        
        // Check email
        const email = $("#email").val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email");
            valid = false;
        }

        // Check password
        const password = $("#password").val().trim();
        if (password === "") {
            alert("Password is required");
            valid = false;
        }

        // Prevent form submission if validation fails
        if (!valid) {
            e.preventDefault();
        }
    });
});

