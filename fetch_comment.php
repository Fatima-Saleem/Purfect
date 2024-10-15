<?php
//fetch_comment.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ADMINISTRATOR";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM comments WHERE parent_comment_id = '0' ORDER BY comment_id DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->get_result(); // Use get_result() to fetch the mysqli result
$output = '';
while ($row = $result->fetch_assoc()) { // Fetch each row as an associative array
 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
  <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "SELECT * FROM comments WHERE parent_comment_id = '".$parent_id."'";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->get_result(); // Use get_result() to fetch the mysqli result
 $count = $result->num_rows; // Use num_rows to get the count of rows
 if($parent_id != 0)
 {
  $marginleft += 48;
 }
 if($count > 0)
 {
  while($row = $result->fetch_assoc()) // Fetch each row as an associative array
  {
   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">'.$row["comment"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
   </div>
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}
?>
