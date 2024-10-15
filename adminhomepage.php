<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomePage</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <style>
        body {
            background-color: rgb(255, 255, 204); /* Light yellow background color */
            margin: 0;
            padding: 0;
        }
        .AdminHomePageLayout {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .AdminHomePageActionButton {
            margin: 5px;
            flex-basis: calc(25% - 10px); /* Four buttons per row */
        }
        .HomePageButton {
            background-color: #eee600; /* Box color */
            border: 2px solid darkgreen;
            color: darkgreen;
            padding: 15px 25px; /* Increased padding */
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: all 0.3s ease;
            display: block;
            text-align: center;
        }
        .HomePageButton:hover {
            background-color: darkgreen;
            color: white;
        }
    </style>
</head>
<body>

<div class="AdminHomePageLayout">
    <div class="AdminHomePageActionButton">
        <a href="addadoptionmerges.php" class="HomePageButton">Add Adopt Pets</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="adddonationpetback2.php" class="HomePageButton">Add Donate Pets</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="updateadoptpetfront.php" class="HomePageButton">Update Adopt Pets</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="updatedonatefront.php" class="HomePageButton">Update Donate Pets</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="deletepet.php" class="HomePageButton">Delete Adopt Pets</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="deletedonatepets.php" class="HomePageButton">Delete Donate Pets</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="viewpet2.php" class="HomePageButton">View Pets</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="adminchoice3.php" class="HomePageButton">Adoption Requests</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="adopthistory.php" class="HomePageButton">Adoption History</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="donatehistory.php" class="HomePageButton">Donation History</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="adminreview.php" class="HomePageButton">Reviews</a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="Veri_code_Display.php" class="HomePageButton">Veify Code </a>
    </div>
    <div class="AdminHomePageActionButton">
        <a href="mainpage2.php" class="HomePageButton">Log Out</a>
    </div>
</div>

</body>
</html>
