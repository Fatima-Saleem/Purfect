<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE TABLE IF NOT EXISTS comments (
  comment_id int(11) NOT NULL,
  parent_comment_id int(11) NOT NULL,
  comment varchar(200) NOT NULL,
  comment_sender_name varchar(40) NOT NULL,
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table 'comments' created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


$sql="ALTER TABLE comments ADD PRIMARY KEY (comment_id)";

if ($conn->query($sql) === true) {
  echo "'comment_id' added successfully to 'primary key' ";
} else {
  echo "Error adding column: " . $conn->error;
}

$sql="ALTER TABLE comments MODIFY comment_id int(11) NOT NULL AUTO_INCREMENT";

  if ($conn->query($sql) === true) {
    echo " 'comment_id' modified successfully ";
} else {
    echo "Error adding column: " . $conn->error;
}

mysqli_close($conn);
?>