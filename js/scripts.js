// Event listener for form submission
document.querySelector('form').addEventListener('submit', function(event) {

    // Get the value of the email input field by its ID
    var email = document.getElementById('email').value;

    // Basic email validation
    if (!email.includes('@')) {

	// Show an alert if email is invalid
        alert('Please enter a valid email address');

	// Prevent the form from submitting if validation fails
        event.preventDefault();
    }
});
