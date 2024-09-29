<?php
include 'config/database.php';

// Fetch all entries
$query = "SELECT address_book.*, cities.city_name FROM address_book JOIN cities ON address_book.city_id = cities.id";
$result = $conn->query($query);

// Export to XML
if (isset($_GET['export']) && $_GET['export'] == 'xml') {
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<entries>';
    while($row = $result->fetch_assoc()) {
        echo '<entry>';
        echo '<name>' . $row['name'] . '</name>';
        echo '<first_name>' . $row['first_name'] . '</first_name>';
        echo '<email>' . $row['email'] . '</email>';
        echo '<street>' . $row['street'] . '</street>';
        echo '<zip_code>' . $row['zip_code'] . '</zip_code>';
        echo '<city>' . $row['city_name'] . '</city>';
        echo '</entry>';
    }
    echo '</entries>';
    exit;
}

// Export to JSON
if (isset($_GET['export']) && $_GET['export'] == 'json') {
    $entries = [];
    while($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($entries);
    exit;
}
?>

<a href="export.php?export=xml">Export to XML</a>
<a href="export.php?export=json">Export to JSON</a>
