<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Password for your MySQL server
$database = "administrator"; // Name of your MySQL database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is set
if (isset($_GET['id'])) {
    // Prepare SQL statement to delete record
    $id = $_GET['id'];
    $sql = "DELETE FROM verification_codes WHERE id=$id";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Record deleted successfully, redirect to Veri_code_Display.php
        header('Location: Veri_code_Display.php');
        exit; // Stop further execution
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
