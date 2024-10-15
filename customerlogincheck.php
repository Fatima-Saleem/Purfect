
<?php
session_start();

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = new mysqli("localhost", "root", "", "administrator");
    $stmt = "SELECT * FROM `customer` WHERE `email`='$email' AND `password`='$password';";
    $result = $con->query($stmt);

    if($result->num_rows > 0) {
        // Generate 4-digit random code
        $code = sprintf('%04d', rand(0, 9999));
        
        // Store code and login email in session

        $_SESSION['verification_code'] = $code;
        $_SESSION['login_status']='1';
        $_SESSION['login_email'] = $email;

        // Insert email and code into a table
        $insert_stmt = "INSERT INTO `verification_codes` (`email`, `code`) VALUES ('$email', '$code')";
        $con->query($insert_stmt);

        // Redirect to verification page
        header('location: verification.php');
    } else {
        // Redirect back to login page with error
        header('location: customerlogin2.php?login=false');
    }
}
?>




