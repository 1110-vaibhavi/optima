<?php

$conn= mysqli_connect('localhost','root','','optima') ;
if($conn->connect_error){
   // echo "Connection Fail :".$conn->connect_error;
}else{
    //echo"Connected";
}
$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$plainpass=$_POST['pass'];
$hashedpass=password_hash($plainpass,PASSWORD_DEFAULT);
$cpass=$_POST['cpass'];
$sql="INSERT INTO `registration` (`name`, `username`, `email`, `pass`)
 VALUES ('$name', '$username', '$email', '$hashedpass');";
 if($conn->query($sql)===true){
   // echo"Inserted";
   header("Location: login.html");
   exit();
 }else{
   // echo "\nNot Working";
   echo"Error:".$conn->error;
 }

?>

