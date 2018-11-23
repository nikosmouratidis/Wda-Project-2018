<?php

if(isset($_POST['room_id'])) {
  $room_id = $_POST['room_id'];
} else {
  $room_id = '';
}

if(isset($_POST['start_date'])) {
  $start_date = $_POST['start_date'];
} else {
  $start_date = '';
}

if(isset($_POST['end_date'])) {
  $end_date = $_POST['end_date'];
} else {
  $end_date = '';
}

if(isset($_POST['room_type'])) {
  $room_type = $_POST['room_type'];
} else {
  $room_type = '';
}

$user_id = 1;
$today = date("Y-m-d");
//echo $room_id."<br>";
//echo $start_date."<br>";
//echo $end_date."<br>";
//echo  "<br>";

// ======================================== Connection with the database ================================== //
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wda_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully"."<br>";

$sql = "SELECT * FROM room WHERE room_id=".$room_id."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["room_id"]. " - Name: " . $row["name"]. " " . $row["city"]. " " .$row["area"]. " " .$row["photo"]. "<br>";
    }
} else {
    //echo "0 results";
}
mysqli_close($conn);


 ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-3</title>
    <!-- Bootstrap cdn's -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Css files -->
    <link rel="stylesheet" type="text/css" href="page-3.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar">
    <a class="nav-link nav-hotels" href="#"><strong>Hotels</strong></a>
    <form class="form-inline nav-home-profile">
      <a class="nav-home" href="#"><span><i class="fas fa-home"></i>Home</span></a>
      <a class="nav-profile" href="#"><span><i class="fas fa-user"></i>Profile</span></a>
    </form>
  </nav>
  <main>

<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM room WHERE room_id=".$room_id."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if ($row['wifi']==='1'){
        $wifi="Yes";
      }else{
        $wifi="No";
      };
      if ($row['pet_friendly']==='1'){
        $pet_friendly="Yes";
      }else{
        $pet_friendly="No";
      };
      echo
    '<form action="Page4.php" method="post">
	<div class="container">
      <div class="row justify-content-center">
        <div class="col-10 hotel-info">
          <p class="hotel">
            <span style="display:inline-block;">'.$row['name'].' - '.$row['city'].', '.$row['area'].'</span>
            <span class="divider"></span>
            <span style="display:inline-block;">Reviews:<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            <span class="divider"></span>
            <span><i class="fas fa-heart"></i></span>
            <span style="float:right;">Per Night: '.$row['price'].'&euro;</span>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 row-img">
          <img src="images/rooms/'.$row['photo'].'" style="max-width: 60%;" alt="Card image cap">
        </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-2 room-info">
            <p><i class="fas fa-user"></i> '.$row['count_of_guests'].'</p>
            <p>COUNT OF GUESTS</p>
          </div>
          <div class="col-2 room-info">
            <p><i class="fas fa-bed"></i> '.$row['room_type'].'</p>
            <p>TYPE OF ROOM</p>
          </div>
          <div class="col-2 room-info">
            <p><i class="fas fa-car-side"></i> '.$row['parking'].'</p>
            <p>PARKING</p>
          </div>
          <div class="col-2 room-info">
            <p><i class="fas fa-wifi"></i> '.$wifi.'</p>
            <p>WIFI</p>
          </div>
          <div class="col-2 room-info" style="border-right:none;">
            <p>'.$pet_friendly.'</p>
            <p>PET FRIENDLY</p>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 room-description">
          <h5>Room Description</h5>
          <p>'.$row['long_description'].'</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 text-right">
          <button href="#" type="submit" class="btn btn-search">Book Now</button>
		  <input value="'.$room_id.'" name="room_id" type="hidden">
		  <input value="'.$start_date.'" name="start_date" type="hidden">
		  <input value="'.$end_date.'" name="end_date" type="hidden">
		  <input value="'.$user_id.'" name="user_id" type="hidden">
		  <input value="'.$today.'" name="today" type="hidden">
      <input value="'.$room_type.'" name="room_type" type="hidden">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 map-row">
          <span id="lat" style="visibility: hidden;">'.$row['lat_location'].'</span>
          <span id="lng" style="visibility: hidden;">'.$row['lng_location'].'</span>
          <div id="map-container" class="z-depth-1" style="height: 500px"></div>
        </div>
      </div>
	  </form>';
    }
}

mysqli_close($conn);
?>
      <div class="row justify-content-center">
        <div class="col-10 reviews">
          <h5>Reviews</h5>
          <blockquote>
            <p>1. username_default1 <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
            <footer class="blockquote-footer">Add time: 2018-03-27 13:20:04</footer>
          </blockquote>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 add-review">
          <h5>Add review</h5>
          <div class="form-group">
            <label for="review-textarea" style="margin-bottom:0%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
            <textarea class="form-control" id="review-textarea" rows="2" placeholder="Review"></textarea>
            <button href="#" class="btn btn-search" type="submit">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="page-footer">
    <div class="container">
      <div class="row justify-content-center">
        <p><i class="far fa-copyright"></i>CollegeLink 2018</p>
      </div>
    </div>
  </footer>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyA84wNlSYpQ6wqW-4ok5A6C3LyO2pRYKN0"></script>
<script>
var x=Number(document.getElementById("lat").innerHTML);
var y=Number(document.getElementById("lng").innerHTML);

// Regular map
function regular_map() {
var var_location = new google.maps.LatLng(x, y);

var var_mapoptions = {
center: var_location,
zoom: 16
};

var var_map = new google.maps.Map(document.getElementById("map-container"),
var_mapoptions);

var var_marker = new google.maps.Marker({
position: var_location,
map: var_map,
title: "New York"
});
}

// Initialize maps
google.maps.event.addDomListener(window, 'load', regular_map);
</script>

</body>
</html>
