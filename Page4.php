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

if(isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];
} else {
  $user_id = '';
}

if(isset($_POST['today'])) {
  $today = $_POST['today'];
} else {
  $today = '';
}

if(isset($_POST['room_type'])) {
  $room_type = $_POST['room_type'];
} else {
  $room_type = '';
}



/////////////////////////////////////////////////////////////////////////

//echo $start_date.','.$end_date.','.$room_id.','.$user_id.','.$today.','.$room_type."<br>";

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


$sql = "INSERT INTO bookings (check_in_date,check_out_date,user_id,room_id)
VALUES ('".$start_date."','".$end_date."',".$user_id.",".$room_id.")";


if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



?>



<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-4</title>
    <!-- Bootstrap cdn's -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Css files -->
    <link rel="stylesheet" type="text/css" href="page-4.css">
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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-3 justify-content-center text-center">
          <div class="panel panel-default">
            <div class="panel-body">
              <h5>FAVORITES</h5>
              <ol>
                <li><span>Megali Vretania Hotel<span></li>
              </ol>
              <h5>REVIEWS</h5>
              <ol>
                <li><span>Hilton Hotel<span><p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p></li>
                  <li><span>Megali Vretania Hotel<span><p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p></li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-7 justify-content-center bookings-results">
          <div class="row results-title">
            <h5>My Bookings</h5>
          </div>
<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM bookings
                LEFT JOIN room ON bookings.room_id = room.room_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $type_room="";
    if ($row['room_type']==='1'){
      $type_room="Single Room";
    }elseif ($row['room_type']==='2'){
      $type_room="Double Room";
    }elseif ($row['room_type']==='3'){
      $type_room="Triple Room";
    }else{
      $type_room="Fourfold Room";
    };
    echo '<form action="Page3.php" method="post">
          <div class="row">
            <div class="card">
              <div class="row ">
                <div class="col-4">
                  <img src="images/rooms/'.$row['photo'].'" class="w-100" alt="Card image cap">
                </div>
                <div class="col-8 border-block">
                  <div class="card-block">
                    <blockquote>
                      <h4 class="card-title">'.$row['name'].'</h4>
                      <footer class="blockquote-footer">'.$row['city'].', '.$row['area'].'</footer>
                    </blockquote>
                    <p class="card-text">'.$row['short_description'].'</p>
                    <div class="button-room">
                      <button href="#" class="btn btn-search" type="submit">Go to Room Page</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3 per-night">
              <p>Per Night: '.$row['price'].'&euro;</i></p>
            </div>
            <div class="col-9 date-type">
              <div class="row">
                <div class="col-4" style="border-right: 1px solid black;">
                  <p class="guest-room">Check-in Date: <span style="display: inline-block;">'.$row['check_in_date'].'</span></p>
                </div>
                <div class="col-4">
                  <p class="guest-room" style="border-right: 1px solid black;">Check-out Date: <span style="display: inline-block;">'.$row['check_out_date'].'</span></p>
                </div>
                <div class="col-4">
                  <p class="guest-room">Type of Room: <span style="display: inline-block;">'.$type_room.'</span></p>
                </div>
              </div>
            </div>
          </div>
          <input value="'.$row['room_id'].'" name="room_id" type="hidden">
        </form>';
        }
}

mysqli_close($conn);
?>
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
</body>
</html>
