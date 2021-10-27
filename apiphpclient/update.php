<?php

include 'configuration.php';
if(isset($_POST['update']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST["phone1"];
$gender=$_POST['gender'];
$studentid=$_POST['studentid'];

$query="UPDATE registration SET name='".strtoupper($name)."',mail='".$email."',phonenumber=".$phone.",gender='".strtoupper($gender)."' WHERE id='$studentid' ";
if(mysqli_query($conn, $query))
{
	echo "updated";
}

}
header('Location:registration.php');

?>