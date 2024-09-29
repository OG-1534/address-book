<?php
include 'config/database.php';

// Get cities for the dropdown
$cities_query = "SELECT * FROM cities";
$cities_result = $conn->query($cities_query);

// Check if editing an existing entry
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM address_book WHERE id = $id";
    $result = $conn->query($query);
    $entry = $result->fetch_assoc();
}
?>

<form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($entry['id']) ? $entry['id'] : ''; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo isset($entry['name']) ? $entry['name'] : ''; ?>" required>
    
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo isset($entry['first_name']) ? $entry['first_name'] : ''; ?>" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo isset($entry['email']) ? $entry['email'] : ''; ?>" required>
    
    <label for="street">Street:</label>
    <input type="text" id="street" name="street" value="<?php echo isset($entry['street']) ? $entry['street'] : ''; ?>">
    
    <label for="zip_code">Zip Code:</label>
    <input type="text" id="zip_code" name="zip_code" value="<?php echo isset($entry['zip_code']) ? $entry['zip_code'] : ''; ?>">
    
    <label for="city">City:</label>
    <select id="city" name="city_id" required>
        <?php while($row = $cities_result->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>"
                <?php echo isset($entry['city_id']) && $entry['city_id'] == $row['id'] ? 'selected' : ''; ?>>
                <?php echo $row['city_name']; ?>
            </option>
        <?php } ?>
    </select>
    
    <button type="submit" name="save_entry">Save</button>
</form>
