<?php

if (isset($_POST["submit"])){
    include_once("../dbconnect.php");
    $contact = $_POST["Contact"];
    $title = $_POST["Title"];
    $description = $_POST["Description"];
    $price = $_POST["Price"];
    $deposit = $_POST["Deposit"];
    $state = $_POST["State"];
    $area = $_POST["Area"];
    $latitude = $_POST["Latitude"];
    $longitude = $_POST["Longitude"];
    $sqlregister = "INSERT INTO tbl_rentaroom (Contact, Title, Description, Price, Deposit, State, Area, Latitude, Longitude) 
    VALUES('$contact', '$title', '$description', '$price', '$deposit', '$state', '$area', '$latitude', '$longitude')";
  
    try {
    $conn->exec($sqlregister);
    if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file ($_FILES["fileToUpload"]["tmp_name"])) {
    uploadImage($title);
    }
    echo "<script>alert('Registration successful')</script>";
    echo "<script>window.location.replace('mainpage.php')</script>";
    } catch (PDOException $e) {
    echo "<script>alert('Registration failed')</script>";
    echo "<script>window.location.replace('newroom.php')</script>";
    }
}
    
  function uploadImage($title) {
    $target_dir = "../res/images/";
    $target_file = $target_dir . $title . ".png"; 
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<script src="../javascript/script.js"></script>
<title>RENT A ROOM</title>
</head>

<body>
    <div class="w3-header w3-container w3-pale-red w3-padding-32 w3-center">
        <h1 style="font-size:calc(8px + 4vw);">Aeronna Room Rental</h1>
        <p style="font-size:calc(8px + 1vw);">We give you a legendary welcome, every time you come back!</p>
    </div>

    <div class="w3-bar w3-light-grey">
        <a href="mainpage.php" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="mainpage.php" class="w3-bar-item w3-button w3- left">Home</a>
    </div>

    <div class="w3-container w3-padding-64 form-container">
        <div class="w3-card">
        <div class="w3-container w3-pale-red">
        <p>New Room Registration<p>
    </div>

    <form class="w3-container w3-padding" name="registerForm" action="newroom.php" method="POST" enctype="multipart/form-data" onsubmit="return confirmDialog()">
       <p> 
            <div class="w3-container w3-border w3-center w3-padding">
            <img class="w3-image w3-round w3-margin" src="../res/images/images.png" style="width:100%; max-width:600px"><br>
            <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
        </div></p>
 
        <p>
            <i class = "fa fa-phone icon"></i>
            <label>Contact</label>
            <input class="w3-input w3-border w3-round" name="Contact" id="idContact" type="text" required>
        </p>
        <p>
        <i class = "fa fa-info icon"></i>
            <label>Title</label>
            <input class="w3-input w3-border w3-round" name="Title" id="idTitle" type="text" required>
        </p>
        <p>
        <i class = "fa fa-info icon"></i>
            <label>Description</label>
            <textarea class="w3-input w3-border" id="idDescription" name="Description" rows="4" cols="50" width="100%" placeholder="Please enter your description" required></textarea>
        </p>
        <p>
        <i class = "fa fa-dollar icon"></i>
            <label>Price</label>
            <input class="w3-input w3-border w3-round" name="Price" id="idPrice" type="text" required>
        </p>
        <p>
        <i class = "fa fa-dollar icon"></i>
            <label>Deposit</label>
            <input class="w3-input w3-border w3-round" name="Deposit" id="idDeposit" type="text" required>
        </p>
        <i class = "fa fa-map-pin icon"></i>
            <label>State</label>
            <input class="w3-input w3-border w3-round" name="State" id="idState" type="text" required>
        </p>
        <p>
        <i class = "fa fa-map-pin icon"></i>
            <label>Area</label>
            <input class="w3-input w3-border w3-round" name="Area" id="idArea" type="text" required>
        </p>
        <p>
        <i class = "fa fa-location-arrow icon"></i>
            <label>Latitude</label>
            <input class="w3-input w3-border w3-round" name="Latitude" id="idLatitude" type="text" required>
        </p>
        <p>
        <i class = "fa fa-location-arrow icon"></i>
            <label>Longitude</label>
            <input class="w3-input w3-border w3-round" name="Longitude" id="idLongitude" type="text" required>
        </p>
        <div class="row">
            <input class="w3-input w3-border w3-block w3-pale-red w3-round" type="submit" name="submit" value="Submit">
        </div>    
    </form>
        </div>
    </div>

    <footer class="w3-footer w3-pale-red w3-center">
    <div class="w3-xlarge w3-section">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-pinterest-p w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>© 2021 copyright all right reserved | Designed by <a class="text-white">Aeronna Room Rental</a></p>
</footer>
</body>

</html>