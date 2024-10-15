
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Adoption Pets</title>
 <link rel="stylesheet" href="cusdisplay2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css2/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css2/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css2/responsive.css" rel="stylesheet" />
    <style>

.navbar {
    margin-bottom: 20px;
  }

  .pet-heading {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
  }

  .pet-frame {
    background-color: rgb(255, 255, 255); /* Pure white background for a clean look */
    display: flex;
    margin-bottom: 40px; /* Margin at the bottom for spacing between items */
    margin-left: 20px; /* Added left margin */
    margin-right: 20px; /* Added right margin */
    overflow: hidden;
    border: 2px solid #333; /* Visible border */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Pronounced shadow for depth */
    transition: transform 0.3s ease; /* Smooth transform on hover */
    border-radius: 10px; /* Rounded corners */
}

.pet-frame:hover {
    transform: scale(1.03); /* Slight scale up on hover for interactive effect */
}

.pet-info {
    flex: 1; 
    padding: 20px; /* Increased padding for better spacing inside the box */
    background-color: #fff; /* Consistent background with the frame */
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Distributes space between items */
}

.pet-image {
    width: auto; /* Adjust width automatically */
    height: 400px; /* Fixed height */
    object-fit: cover; /* Ensure the image covers the area without distortion */
    border-radius: 0 10px 10px 0; /* Rounded corners on the right side */
}

.adopt-button {
    display: inline-block;
    padding: 10px 15px; /* Increased padding for a larger button */
    background-color: #29a59b; /* Modern teal color for the button */
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-top: 20px; /* Added margin on top of the button */
    max-width: 120px; /* Max width can limit the button's expansion */
    width: 100%; /* This makes the button width flexible up to the max-width */
    display: block; /* Makes the button take the full width of its content up to max-width */
    text-align: center; 
  } 

.adopt-button:hover {
    background-color: #206a5d; /* Darker shade on hover */
}


</style>
</head>
<body>
    
<header class="header_section" style="background-color: #ced08b;">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
        <a class="navbar-brand" href="index.html">
          <img src="images2/logo.png" alt="">
        </a>
  
        <!-- Navbar links -->
        <div class="navbar-collapse justify-content-center" id="navbarSupportedContent">
           <!-- Navbar links -->
      <div class="navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="mainpage2.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="donateview2.php">Donation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adoptview1.php">Adoption</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">FAQ'S</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="resource.php">Resource Library</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="commentsindex.php">Reviews</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="displaypet.php">Find Your Pet</a>
          </li>
          <?php
            if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == '1') {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="myprofile2.php">My Profile</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="logout.php">Logout</a>';
                echo '</li>';
            } else {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="customerlogin2.php">Login</a>';
                echo '</li>';
            }
          ?>

        </ul>
      </div>
        </div>

       
        
      </nav>
    </div>
  </header>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "administrator";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM petsadopt WHERE statuss != 'accept'";
        

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h1 class="pet-heading"></h1>';
    echo '<div class="pet-details">';
      while($row = $result->fetch_assoc()) {
        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
        echo '<div class="pet-frame">';
        echo '<div class="pet-info">';
      
        echo '<h2>' .'Name :'. $row["pet_name"] . '</h2>';
        echo '<p>' . 'Color : ' . $row["color"] . '</p>';
        echo '<p>' . 'Breed : '.$row["breed"] . '</p>';
        echo '<p>' . 'Pet Type : ' . $row["pet_type"] . '</p>';
        echo '<p>' . 'Health Condition : '.$row["health_condition"] . '</p>';
        echo '<p>' . 'Trained : ' . $row["trained"] . '</p>';
        echo '<p>' . 'Gender : '.$row["gender"] . '</p>';
        echo '<p>' . 'Arrival Date : ' . $row["arrival_date"] . '</p>';
        echo '<p>' . 'Size : '.$row["size"] . '</p>';
        echo '<p>' . 'Weight : ' . $row["weight"] . '</p>';
        echo '<a href="adoptinfoform2.php?pet_id='.$row["pet_id"].'" class="adopt-button">Adopt Now</a>';
        echo '</div>';
        $imagePath = "pet_images/{$row['pet_name']}_{$row['pet_id']}.jpg";
        echo "<img src=\"{$imagePath}\" alt=\"{$row['pet_name']}\"  class=\"pet-image\" width=\"250\" height=\"150\">";
        echo'</div>';
      }
    
      echo '</div>';
    } else {
        echo 'No pet donations available.';
    }
  
    ?>




    