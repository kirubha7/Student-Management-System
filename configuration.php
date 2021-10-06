<?php
$conn = new mysqli("localhost","root","");

if ($conn->connect_error) 
{
    die("Connection failed:a " . $conn->connect_error);
} 

mysqli_select_db($conn,"studentregistration");
?>