<!DOCTYPE html>
<html lang="en">

<head>
  <title>Book Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
    <div class="container-xl">
      <!-- Logo -->
      <a class="navbar-brand" href="#">
        books.ro
      </a>
      <!-- Navbar toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Nav -->
        <div class="navbar-nav mx-lg-auto">
          <a class="nav-item nav-link active" href="index.php" aria-current="page">Home</a>
          <a class="nav-item nav-link" href="addBook.php">Add books</a>
          <a class="nav-item nav-link" href="news.php">News</a>

        </div>
        <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
          <?php
          $city_name = "Iasi";
          $api_key = '260346b0f3780da0b1a6a04c381e501f';
          $api_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city_name . '&appid=' . $api_key;
          $weather_data = json_decode(file_get_contents($api_url), true);
          $temp = $weather_data['main']['temp'];
          $temp_cels = round($temp - 273.15);
          $temp_current = $weather_data['weather'][0]['main'];
          $temp_current_descr = $weather_data['weather'][0]['description'];
          $temp_current_icon = $weather_data['weather'][0]['icon'];
          echo "<div><img src='http://openweathermap.org/img/wn/" . $temp_current_icon . "@2x.png' /><b style='color:white'>" . $city_name . "  : " . $temp_cels . " °C.</b><div>";
          date_default_timezone_set("Europe/Bucharest");
          $date_stamp = date("d/m/Y H:i");
          echo "<center style='color:white'> $date_stamp</center>";

          ?>
        </div>
      </div>
  </nav>

  <div class="p-10 bg-surface-secondary">
    <div class="row">
      <div class="col-sm-8"><img src="https://specials-images.forbesimg.com/imageserve/5f85be4ed0acaafe77436710/960x0.jpg?fit=scale"></div>
      <div class="col-sm-4">
        <h4 style="padding: 31% 16%;"> Hi there,
          <br>This app was build for bookstore & it's workers<br>
          In order to help & be improved
        </h4>
      </div>
    </div>

  </div>
  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>