
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-1</title>
    <!-- Bootstrap cdn's -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Css files -->
    <link rel="stylesheet" type="text/css" href="page-1.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>

<nav class="navbar">
  <a class="nav-link nav-hotels" href="#"><strong>Hotels</strong></a>
  <a class="nav-link nav-home" href="#"><span><i class="fas fa-home"></i><strong>Home</strong></span></a>
</nav>
<main>
  <div class="container">
    <div class="panel">
      <form class="panel-body " action="Page2.php" method="post">
        <div class="row justify-content-center">
          <div class="col-md-5 select-col">
            <select name="city" class="form-control select-city">
              <option value="" disabled selected>City</option>
              <option value="Athens">Athens</option>
              <option value="Thessaloniki">Thessaloniki</option>
              <option value="Kavala">Kavala</option>
              <option value="Santorini">Santorini</option>
            </select>
          </div>
          <div class="col-md-5 select-col">
            <select name="room_type" class="form-control select-room" name="room_type">
              <option value="" disabled selected>Room Type</option>
              <option value="1">Single Room</option>
              <option value="2">Double Room</option>
              <option value="3">Tripple Room</option>
              <option value="4">Fourfold Room</option>
            </select>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5 select-col">
            <input class="form-control check-in" type="text" placeholder="Check-In Date" onfocus="(this.type='date')" onblur="(this.type='text')" name="start_date">
          </div>
          <div class="col-md-5 select-col">
            <input class="form-control check-out" type="text" placeholder="Check-Out Date" onfocus="(this.type='date')" onblur="(this.type='text')" name="end_date">
          </div>
        </div>
        <div class="row justify-content-center">
          <button class="btn btn-search" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>
</main>
<footer class="fixed-bottom">
  <div class="container">
    <div class="row justify-content-center">
      <p><i class="far fa-copyright"></i>CollegeLink 2018</p>
    </div>
  </div>
</footer>
</body>
</html>
