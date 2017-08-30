<?php
session_start();
$conn=mysqli_connect("127.0.0.1","root","","emp");
if(mysqli_connect_errno())
    die(mysqli_connect_error());
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>