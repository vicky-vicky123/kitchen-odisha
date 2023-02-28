<?php
$conn=mysqli_connect('localhost','root','','order_details') or die("No Connection");
$fullname=$_POST['fullname'];
$email=$_POST['email'];

$query="insert into user_sign_up(fname,emial) values('$fullname','$email')";

mysqli_query($conn,$query) or die("Query Not Executed");

header('location:log_in.php');
?>