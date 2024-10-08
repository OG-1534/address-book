<?php
include 'config/database.php'; // Include database connection

// Handle form submission to insert or update entry
if (isset($_POST['save_entry'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $zip_code = $_POST['zip_code'];
    $city_id = $_POST['city_id'];
    
    if ($id) {
        // Update existing entry
        $query = "UPDATE address_book SET name='$name', first_name='$first_name', email='$email', street='$street', zip_code='$zip_code', city_id=$city_id WHERE id=$id";
    } else {
        // Insert new entry
        $query = "INSERT INTO address_book (name, first_name, email, street, zip_code, city_id) VALUES ('$name', '$first_name', '$email', '$street', '$zip_code', $city_id)";
    }

    // Execute query and redirect
    if ($conn->query($query)) {
        header('Location: index.php'); // Redirect to index upon success
    } else {
        echo "Error: " . $conn->error; // Show error if query fails
    }
}

// Handle deleting an entry
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM address_book WHERE id=$id"; // Delete query
    if ($conn->query($query)) {
        header('Location: index.php'); // Redirect after deleting successfully
    } else {
        echo "Error: " . $conn->error; // Show error if deletion fails
    }
}
?>
