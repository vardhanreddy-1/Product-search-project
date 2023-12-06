<?php
// Connect to your database (ensure you have the necessary credentials)
$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $category = $_POST["category"];

    // Use SQL to retrieve search results from the database (replace with your actual table/column names)
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$productName%'";

    if ($category != "all") {
        $sql .= " AND category = '$category'";
    }

    $result = $conn->query($sql);

    // Display search results
    echo "<div class='container'>";
    echo "<h1>Search Results</h1>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>{$row['product_name']} - {$row['price']}</p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }

    echo "</div>";
}

$conn->close();
?>
