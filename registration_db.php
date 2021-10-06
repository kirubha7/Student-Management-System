<?php

include 'configuration.php';
if(isset($_POST['upload']))
{

$target="images/".basename($_FILES['image']['name']);	
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST["phone"];
$gender=$_POST['gender'];
$image=$_FILES['image']['name']; 

$query="INSERT INTO registration(name,mail,phonenumber,gender,image)VALUES('".strtoupper($name)."','".$email."',
".$phone.",'".strtoupper($gender)."','".$image."')";

mysqli_query($conn, $query);

move_uploaded_file($_FILES['image']['tmp_name'], $target);


}
header('Location:registration.php');

?>