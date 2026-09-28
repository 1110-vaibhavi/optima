<?php
session_start();

$conn = mysqli_connect("localhost","root","","optima");

if(!$conn){
    die("Connection Failed");
}

if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$address   = $_POST['address'];
$city      = $_POST['city'];
$pincode   = $_POST['pincode'];
$phone     = $_POST['phone'];
$email     = $_POST['email'];
$shipping  = $_POST['shipping'];
$payment   = $_POST['payment'];

$sql = "INSERT INTO `orders` ( `firstname`, `lastname`, `address`, `city`, `pincode`, `phone`, `email`, `shipping`, `payment`, `ordered_at`) 
VALUES ('$firstname', '$lastname', '$address', '$city', '$pincode', '$phone', '$email', '$shipping', '$payment', current_timestamp());";

if(mysqli_query($conn,$sql))
{
    $order_id = mysqli_insert_id($conn);

    // Get all products from cart
    $cart = mysqli_query($conn,"SELECT * FROM cart WHERE username='$username';");

    while($row = mysqli_fetch_assoc($cart))
    {
        $product_name = $row['product_name'];
        $price        = $row['price'];
        $quantity     = $row['quantity'];

        $sql2 = "INSERT INTO `order_items`
        (`order_id`,`product_name`,`price,quantity`)
        VALUES
        ('$order_id','$product_name','$price','$quantity');";

        mysqli_query($conn,$sql2);
    }

    // Empty the cart
    mysqli_query($conn,"DELETE FROM cart WHERE username='$username';");

    header("location:orderplace.html");
    exit();
}
else
{
    echo "Error : ".mysqli_error($conn);
}

mysqli_close($conn);
?>