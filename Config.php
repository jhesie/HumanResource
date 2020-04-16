<?php
$server="localhost";//server name
$user="root";		//user name
$pass="";			//user password
$db_name="humanresource";//database name


$conn= new mysqli($server,$user,$pass,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

 ?>