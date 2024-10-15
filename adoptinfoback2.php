<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE adoptinfo (
    adopt_id INT AUTO_INCREMENT PRIMARY KEY,
    experience VARCHAR(50),
    years INT,
    pet_id INT UNSIGNED,
    email VARCHAR(255),
    needs_aware VARCHAR(50),
    training_familiar VARCHAR(50),
    financial_prep VARCHAR(50),
    statuss VARCHAR(50),
    FOREIGN KEY (pet_id) REFERENCES petsadopt(pet_id) ON DELETE CASCADE,
    FOREIGN KEY (email) REFERENCES customer(email) ON DELETE CASCADE
)"; // Ensure InnoDB engine is used

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table 'adoptinfo' created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
