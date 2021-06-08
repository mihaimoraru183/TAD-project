<?php

include('conndb.php');

$bid = $_POST['id'];

$bname = $_POST['name'];

$aname = $_POST['author'];

$price = $_POST['price'];

$query = "UPDATE book_table SET book_name='$bname' , book_author='$aname' , book_price='$price'  WHERE book_id='$bid'";


if($db->exec($query)){

    header("Location:index.php");

}

else{


    echo "Error in query ...";
}
?>