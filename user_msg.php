<?php
    $conn=mysqli_connect('localhost','root','','order_details') or die("No Connection");

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mesage=$_POST['message'];

    $query="insert into user_msg(user_name ,user_email ,user_massage) values('$name','$email','$mesage')";

    mysqli_query($conn,$query) or die("Query Not Executed");

    header('location:contact.php');

?>