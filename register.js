document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('register-form');

    if (!form) {
        console.error('Register form not found!');
        return;
    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if (!email || !password || !confirmPassword) {
            alert('Please fill in all fields.');
            return;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return;
        }

        // For testing: store to localStorage (optional)
        localStorage.setItem('registeredEmail', email);
        localStorage.setItem('registeredPassword', password);

        alert('Registration successful! Redirecting to login page.');

        // Redirect to login.html
        window.location.href = 'login.html';
    });
});
