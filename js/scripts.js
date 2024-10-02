// Basic form validation for email input
document.querySelector('form').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value;
    if (!email.includes('@')) {
        alert('Please enter a valid email address');
        event.preventDefault(); // If validation fails, prevent form submission
    }
});
