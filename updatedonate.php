<?php
$con = new mysqli("localhost", "root", "", "administrator");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $pet_id = $_POST['pet_id'];
    $sql = "SELECT pet_name FROM petsdonate WHERE pet_id = $pet_id";
    $result= $con->query($sql);
    if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    }

    if (isset($_POST['pet_name'])) {
        $update_stmt= "UPDATE petsdonate SET pet_name='".$_POST['pet_name']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
   
    if(isset($_POST['breed']))
    {
        $update_stmt= "UPDATE petsdonate SET breed='".$_POST['breed']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['age']))
    {
        $update_stmt= "UPDATE petsdonate SET age='".$_POST['age']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    if(isset($_POST['pet_type']))
    {
        $update_stmt= "UPDATE petsdonate SET pet_type ='".$_POST['pet_type']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    
    if(isset($_POST['health_condition']))
    {
        $update_stmt= "UPDATE petsdonate SET health_condition ='".$_POST['health_condition']."' where pet_id=".$_POST['pet_id'];
        $con->query($update_stmt);
    }
    
    if(isset($_POST['total_amount']))
{
   
    $donation_query = "SELECT SUM(donation_amount) AS total_donation FROM donateinfo WHERE pet_id=" . $_POST['pet_id'];
    $donation_result = $con->query($donation_query);

    if($donation_result)
    {
        $donation_row = $donation_result->fetch_assoc();
        $amount_collected = $donation_row['total_donation'];

       
        $new_amount_left = $_POST['total_amount'] - $amount_collected;

        // Ensure the new amount_left is not negative
        if($new_amount_left >= 0)
        {
            // Update total_amount and amount_left
            $update_stmt = "UPDATE petsdonate SET total_amount='" . $_POST['total_amount'] . "', amount_left='" . $new_amount_left . "' WHERE pet_id=" . $_POST['pet_id'];

            $con->query($update_stmt);
        }
        else
        {
            echo "Error: New total amount cannot be less than the amount collected.";
        }
    }
}
   
   
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $targetDirectory = "./pet_images/";
        $pet_name = $row['pet_name'];
        $targetFile = "{$pet_name}_{$pet_id}.jpg"; 

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDirectory . $targetFile)) {
            echo "Image updated successfully.";
        } else {
            echo "Error updating the image.";
        }
    }
     header('Location: updatedonatefront.php');
        exit();
}

$stmt = "SELECT * FROM petsdonate";
$result = $con->query($stmt);

if (!$result) {
    die("Error: " . $con->error);
}

$con->close();
?>