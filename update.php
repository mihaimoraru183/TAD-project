<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>

<?php
    include('conndb.php');

    $id = $_GET['b_id'];

    $query = "SELECT * FROM book_table WHERE book_id='$id'";
    $res = $db->query($query);
?>


<div class="container">
<h2>Update Book Info</h2>
<div class="row" style="margin-top:10px; margin-bottom:10px;">
<div class="col-sm-6">

<form action="edit.php" method="post">

    <?php 
    while($row = $res->fetchArray()){

    ?>

    <input type="hidden" name="id" value="<?php echo $row['book_id']; ?>">



  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row['book_name']; ?>" >
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $row['book_author']; ?>" >
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" name="price" value="<?php echo $row['book_price']; ?>" >
    <?php
    
}

    ?>
  </div>
    <div align="center">
    <button type="submit" class="btn btn-success">Update</button>
    </div>
</form> 

</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html> 