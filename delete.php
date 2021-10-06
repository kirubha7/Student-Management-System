<?php

include 'configuration.php';

$id=$_GET['id1'];

$query1="DELETE FROM registration WHERE id='$id' ";
  if(mysqli_query($conn, $query1))
  {
  	echo"deleted";
  }
header('Location:registration.php');


?>