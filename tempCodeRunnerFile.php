<?php

$dbname = "store.db";

$db = new SQLite3($dbname);

if(!$db){
    die("db not create ...");
}

/*else{
    echo "Create database successfully ...";
}*/

//Create table in sqlite DB

$query = "CREATE TABLE IF NOT EXISTS book_table(book_id integer primary key ,
            book_name text , author_book text, book_price text)";


$db->exec($query);


?>