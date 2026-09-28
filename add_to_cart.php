<?php
session_start();

if(!isset($_SESSION['loggedin'])){
    header("Location: login.html");
    exit();
}

$conn = mysqli_connect("localhost","root","","optima");

$username = $_SESSION['username'];
$user_id= $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$image = $_POST['image'];

// Check if product already exists in cart
$check = mysqli_query($conn,"SELECT * FROM cart
WHERE username='$username' AND product_id='$product_id';");

if(mysqli_num_rows($check)>0){

    mysqli_query($conn,"UPDATE cart
    SET quantity = quantity + 1
    WHERE username='$username' AND product_id='$product_id';");

}else{

    mysqli_query($conn,"INSERT INTO cart
    (user_id,username,product_id,product_name,price,quantity,image)
    VALUES
    ('$user_id','$username','$product_id','$product_name','$price',1,'$image');");
}

header("Location: cart.php");
?>