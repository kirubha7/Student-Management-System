<?php
include '../db.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "delete from user where id = ".$_GET['id'];
$result = $conn->query($sql);
if ($result) {
  echo 1;exit;
}
echo 0;exit;
