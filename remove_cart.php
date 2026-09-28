<?php
session_start();

$conn = mysqli_connect("localhost","root","","optima");

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM cart WHERE cart_id='$id'");

header("Location: cart.php");
?>