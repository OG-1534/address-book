<?php
// Include database connection
include 'config/database.php';

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all entries with their city names
$query = "SELECT address_book.*, cities.city_name FROM address_book
          JOIN cities ON address_book.city_id = cities.id";

// Check if query was successful
$result = $conn->query($query); // Execute the query
if (!$result) {
    die("Query failed: " . $conn->error); // Show error if query fails
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h2>Address Book Entries</h2>

<!-- Action buttons for adding and exporting -->
<div class="action-buttons">
    <a href="add_edit.php" class="add-btn">Add New Entry</a>
    <a href="export.php?export=xml" class="export-btn">Export to XML</a>
    <a href="export.php?export=json" class="export-btn">Export to JSON</a>
</div>
<!-- Display entries in a table -->
<table border="1">
    <tr>
        <th>Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Street</th>
        <th>Zip Code</th>
        <th>City</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['street']); ?></td>
            <td><?php echo htmlspecialchars($row['zip_code']); ?></td>
            <td><?php echo htmlspecialchars($row['city_name']); ?></td>
	    <td>
		<!-- Links to edit and delete the entry -->
                <a href="add_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<!-- Link to JavaScript file -->
<script src="js/scripts.js"></script>

</body>
</html>

<?php
// Free the result set and close the connection
if ($result) {
    $result->free();
}
$conn->close(); // Close the database connection
?>
