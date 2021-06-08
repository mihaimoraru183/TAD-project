<?php

$id = $_GET['b_id'];

echo "delete file", $id;

include('conndb.php');


$query = "DELETE FROM book_table WHERE book_id='$id'";


if($db->exec($query)){

    header("Location:index.php");
}

else{
    echo "Error in query ...";
}



?>