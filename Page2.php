<?php

if(isset($_POST['start_date'])) {
  $start_date = $_POST['start_date'];
} else {
  $start_date = '';
}

if(isset($_POST['end_date'])) {
	$end_date   = $_POST['end_date'];
} else {
	$end_date = '';
}

if(isset($_POST['city'])) {
	$city   = $_POST['city'];
} else {
	$city = '';
}

if(isset($_POST['room_type'])) {
	$room_type   = $_POST['room_type'];
} else {
	$room_type  = '';
}

if(isset($_POST['count_of_guests'])) {
	$count_of_guests   = $_POST['count_of_guests'];
} else {
	$count_of_guests  = '';
}

//////////////////
//echo $start_date.','.$end_date.','.$city.','.$room_type.','.$count_of_guests."<br>";



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


$sql = "SELECT * FROM room WHERE room_type=".$room_type." AND city='".$city."'";
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
    <title>Page-2</title>
    <!-- Bootstrap cdn's -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Css files -->
    <link rel="stylesheet" type="text/css" href="page-2.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!--Range-price-slider-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

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
    <div class="container">
      <div class="row justify-content-center">
        <div class=" col-md-3 justify-content-center text-center">
          <form id="side-form" action="Page2.php" method="post">
              <fieldset>
                <legend>FIND THE PERFECT HOTEL</legend>
                <select name="count_of_guests" class="form-control select-room">
                  <option value="" disabled selected>Count of Guests</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">3</option>
                </select>
                <select name="room_type" class="form-control select-room">
                  <option value="" disabled selected>Room Type</option>
                  <option value="1">Single Room</option>
                  <option value="2">Double Room</option>
                  <option value="3">Tripple Room</option>
                  <option value="4">Fourfold Room</option>
                </select>
                <select name="city" class="form-control select-city">
                  <option value="" disabled selected>City</option>
                  <option value="athens">Athens</option>
                  <option value="thessaloniki">Thessaloniki</option>
                  <option value="Kavala">Kavala</option>
                  <option value="Santorini">Santorini</option>
                </select>
                <input type="amount" id="amount" readonly style="border:0;">
                <div id="slider-range"></div>
                <span class="price-range" style="float:left;">PRICE MIN.</span><span class="price-range" style="float:right;">PRICE MAX.</span>
                <input class="form-control check-in" type="text" placeholder="Check-In Date" name="start_date" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input class="form-control check-out" type="text" placeholder="Check-Out Date" name="end_date" onfocus="(this.type='date')" onblur="(this.type='text')">
                <button class="btn btn-search" type="submit">FIND HOTEL</button>
              </fieldset>
          </form>
        </div>
        <div class=" col-md-7 justify-content-center search-results">
          <div class="row results-title">
            <h5>Search Results</h5>
          </div>
<?php

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM room
                 LEFT JOIN room_type ON room.room_type = room_type.id
                 WHERE room.room_type=".$room_type." AND room.city='".$city."'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            echo '<form action="Page3.php" method="post">
                    <div class="row">
                      <div class="card">
                        <div class="row ">
                          <div class="col-4">
                            <img src="images/rooms/' .$row['photo']. '" class="w-100" alt="room image">
                          </div>
                          <div class="col-8 border-block">
                            <div class="card-block">
                              <blockquote>
                                <h4 class="card-title">' .$row['name']. '</h4>
                                <footer class="blockquote-footer">' .$row['city']. ', ' .$row['area']. '</footer>
                              </blockquote>
                              <p class="card-text">' .$row['short_description']. '</p>
                              <div class="button-room">
                                <button type="submit" class="btn btn-search">Go to Room Page</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
          		      <div class="row">
                      <div class="col-3 per-night">
                        <p>Per Night: ' .$row['price']. '&euro;</i></p>
                      </div>
                      <div class="col-9 guests-room">
                        <div class="row">
                          <div class="col-6">
                            <p class="guest-room">Count of Guests: ' .$row['count_of_guests']. '</p>
                          </div>
                          <div class="divider"></div>
                          <div class="col-6">
                            <p class="guest-room">Type of Room: ' .$row['room_type']. '</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <input value="'.$row['room_id'].'" name="room_id" type="hidden">
					          <input value="'.$start_date.'" name="start_date" type="hidden">
					          <input value="'.$end_date.'" name="end_date" type="hidden">
                    <input value="'.$row['room_type'].'" name="room_type" type="hidden">
                  </form>';
                }
} else {
  echo "No available Rooms";
}

mysqli_close($conn);

?>
		    </div>
      </div>
    </div>
  </main>
  <span id="euro" style="visibility: hidden;">&euro;</span>
  <footer class="page-footer">
    <div class="container">
      <div class="row justify-content-center">
        <p><i class="far fa-copyright"></i>CollegeLink 2018</p>
      </div>
    </div>
  </footer>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
var euro=document.getElementById("euro").innerHTML;
$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + euro + " - " + ui.values[ 1 ] + euro);
      }
    });
    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) + euro +
      " - " + $( "#slider-range" ).slider( "values", 1 ) + euro);
  } );
</script>
</body>
</html>
