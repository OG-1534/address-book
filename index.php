<?php
// Include database connection
include 'config/database.php';

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all entries from address_book
$query = "SELECT address_book.*, cities.city_name FROM address_book
          JOIN cities ON address_book.city_id = cities.id";
$result = $conn->query($query);

// Check if query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<h2>Address Book Entries</h2>
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
                <a href="add_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="add_edit.php">Add New Entry</a>

<?php
// Free the result set and close the connection only after the data is processed
if ($result) {
    $result->free();
}
$conn->close();
?>
