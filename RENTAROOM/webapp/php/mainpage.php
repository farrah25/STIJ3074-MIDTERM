<?php
include_once("../dbconnect.php");
$sqlroom = "SELECT * FROM tbl_rentaroom ORDER BY DateCreated DESC";
$stmt = $conn->prepare($sqlroom);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
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
        <p style="font-size:calc(8px + 1vw);;">We give you a legendary welcome, every time you come back!</p>
    </div>

    <div class="w3-bar w3-light-grey">
        <a href="#contact" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="newroom.php" class="w3-bar-item w3-button w3-left">New Room</a>
    </div>

    <br>
    <br>

    <div class="w3-grid-template">
<?php
foreach($rows as $room){

    $contact = $room['Contact'];
    $title = $room['Title'];
    $description = $room['Description'];
    $price = $room['Price'];
    $deposit = $room['Deposit'];
    $state = $room['State'];
    $area = $room['Area'];
    $dateCreated = $room['DateCreated'];
    $latitude = $room['Latitude'];
    $longitude = $room['Longitude'];
    echo "<div class='w3-center w3-padding'>";
    echo "<div class='w3-card-4 w3-light-grey' style='background-color:#FCDCF1'>";
    echo "<header class='w3-container w3-pale-red'>";
    echo "<h5>$title</h5>";
    echo "</header>";
    echo "<img class='w3-image' src=../res/images/$title.png" ." onerror=this.onerror=null;this.src='../res/images/images.png'" . " style='width:100%;height:250px'>";
    echo "<div class='w3-container w3-left-align'><hr>";
    echo "<p><i class='fa fa-phone' style='font-size 20px;'> Contact:</i> &nbsp&nbsp$contact<br>
    <i class='fa fa-info' style='font-size 20px;'> Description:</i>  &nbsp&nbsp$description<br>
    <i class='fa fa-dollar' style='font-size 20px;'> Price:</i>  &nbsp&nbsp$price<br>
    <i class='fa fa-dollar' style='font-size 20px;'> Deposit:</i> &nbsp&nbsp$deposit<br>
    <i class='fa fa-map-pin'style='font-size 20px;'> State:</i> &nbsp&nbsp$state<br>
    <i class='fa fa-map-pin'style='font-size 20px;'> Area:</i> &nbsp&nbsp$area<br>
    <i class='fa fa-map-pin style='font-size 20px;'> Date Created:</i> &nbsp&nbsp$dateCreated<br>
    <i class='fa fa-location-arrow' style='font-size 20px;'> Latitude:</i> &nbsp&nbsp$latitude<br>
    <i class='fa fa-location-arrow' style='font-size 20px;'> Longitude: </i> &nbsp&nbsp$longitude<br></p><hr>";  
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
</div>
<br>
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