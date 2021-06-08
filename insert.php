<?php

include('conndb.php');



$name = $_POST['book_name'];
$author = $_POST['book_author'];
$price = $_POST['book_price'];


$query = "INSERT INTO book_table(book_name, book_author, book_price) VALUES('$name' , '$author', '$price')";


if($db->exec($query)){

    header("Location:index.php");

}

else{

    echo "Error in query...";


}


?>