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
          <a class="nav-item nav-link active" href="#" aria-current="page">Home</a>
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
    <div>

      <?php
      include('conndb.php');
      $query = "SELECT * FROM book_table";
      $result = $db->query($query);
      ?>

      <div class="row">
        <div class="col-sm-3">
          <h4> Insert New Book</h4>
          <form action="insert.php" method="post">
            <div class="form-group">
              <label for="book_name">Book name</label>
              <input type="text" class="form-control" name="book_name">
            </div>
            <div class="form-group">
              <label for="book_author">Author</label>
              <input type="text" class="form-control" name="book_author">
            </div>
            <div class="form-group">
              <label for="book_price">Price</label>
              <input type="text" class="form-control" name="book_price">
            </div> <br>
            <div align="right">
              <button type="submit" class="btn btn-primary">Insert</button>
            </div>
          </form>
        </div>
        <div class="col-sm-8">
          <br>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php

              while ($row = $result->fetchArray()) {

              ?>
                <tr>
                  <td><?php echo $row['book_id']; ?></td>
                  <td><?php echo $row['book_name']; ?></td>
                  <td><?php echo $row['book_author']; ?></td>
                  <td><?php echo $row['book_price']; ?></td>
                  <td>
                    <a href="update.php?b_id=<?php echo $row['book_id']; ?>" class="btn btn-info" role="button">Update</a>
                    <a href="delete.php?b_id=<?php echo $row['book_id']; ?>" class="btn btn-danger" role="button">Delete</a>

                  </td>
                </tr>

              <?php
              }

              ?>



            </tbody>
          </table>
        </div>
        <div class="col-sm-1"> </div>
      </div>


      <div class="row">
        <div class="col-sm-3">
          <h4> Currency Exchange</h4>
          <form method="POST">
            <div class="form-group">
              <label>FROM</label>
              <input type="text" class="form-control" name="from">
            </div>
            <div class="form-group">
              <label>TO</label>
              <input type="text" class="form-control" name="to">
            </div>
            <div class="form-group">
              <label>Amount</label>
              <input type="text" class="form-control" name="amount">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Convert" style="margin-top: 2%;width: 100%;">
          </form>
        </div>
      </div>
    </div>
  </div>










  <?php
  if (isset($_POST["submit"])) {
    $from = $_POST["from"];
    $to = $_POST["to"];
    $amount = $_POST["amount"];

    $string = $from . "_" . $to;


    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=$string&compact=ultra&apiKey=506094397329f9beeb86",
      CURLOPT_RETURNTRANSFER => 1
    ));
    $response = curl_exec($curl);
    $response = json_decode($response, true);
    $rate = $response[$string];

    $total = $rate * $amount;
    $total = sprintf("%01.2f", $total);
    $ec = "$amount $from = $total $to";
    echo "<left class='currencyResult'>$ec</left>";
  }
  ?>

  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>