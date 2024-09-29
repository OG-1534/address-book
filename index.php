<?php
include 'config/database.php';

// Fetch all entries from address_book
$query = "SELECT address_book.*, cities.city_name FROM address_book JOIN cities ON address_book.city_id = cities.id";
$result = $conn->query($query);
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
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['street']; ?></td>
            <td><?php echo $row['zip_code']; ?></td>
            <td><?php echo $row['city_name']; ?></td>
            <td>
                <a href="add_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="add_edit.php">Add New Entry</a>
