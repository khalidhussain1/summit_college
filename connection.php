<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "summit_college";


$connection = mysqli_connect($servername,$username,$password,$database);

if(!$connection){
    echo "connection failed ";
}

?>
