<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id10914702_admin');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'id10914702_db');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} 
else {
    echo "Connected successfully";
}
?>