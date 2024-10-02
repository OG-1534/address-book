<?php
include 'config/database.php';

// Fetch all entries with city info.
$query = "SELECT address_book.*, cities.city_name FROM address_book 
          JOIN cities ON address_book.city_id = cities.id";
$result = $conn->query($query);

// Export to XML
if (isset($_GET['export']) && $_GET['export'] == 'xml') {
    header('Content-Type: text/xml');
    header('Content-Disposition: attachment; filename="address_book.xml"');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<entries>';
    while($row = $result->fetch_assoc()) {
        echo '<entry>';
        echo '<name>' . htmlspecialchars($row['name']) . '</name>';
        echo '<first_name>' . htmlspecialchars($row['first_name']) . '</first_name>';
        echo '<email>' . htmlspecialchars($row['email']) . '</email>';
        echo '<street>' . htmlspecialchars($row['street']) . '</street>';
        echo '<zip_code>' . htmlspecialchars($row['zip_code']) . '</zip_code>';
        echo '<city>' . htmlspecialchars($row['city_name']) . '</city>';
        echo '</entry>';
    }
    echo '</entries>';
    exit;
}

// Export to JSON
if (isset($_GET['export']) && $_GET['export'] == 'json') {
    $entries = [];
    while($row = $result->fetch_assoc()) {
        $entries[] = [
            'name' => htmlspecialchars($row['name']),
            'first_name' => htmlspecialchars($row['first_name']),
            'email' => htmlspecialchars($row['email']),
            'street' => htmlspecialchars($row['street']),
            'zip_code' => htmlspecialchars($row['zip_code']),
            'city' => htmlspecialchars($row['city_name']),
        ];
    }
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="address_book.json"');
    echo json_encode($entries, JSON_PRETTY_PRINT);
    exit;
}
?>

<!-- Export buttons for export functionality -->
<a href="export.php?export=xml" class="export-btn">Export to XML</a>
<a href="export.php?export=json" class="export-btn">Export to JSON</a>
