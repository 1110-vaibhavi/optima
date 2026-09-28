
<?php
session_start();

if(!isset($_SESSION['loggedin'])){
    header("Location:login.html");
    exit();
}

$conn = mysqli_connect("localhost","root","","optima");

$username = $_SESSION['username'];
$user_id =isset( $_SESSION['user_id'])? $_SESSION['user_id']:0;
$sql = "SELECT * FROM cart WHERE username='$username'";
$result = mysqli_query($conn,$sql);

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>

    <style>
body{
    width:auto;
    height:800px;
     background-image:radial-gradient(white,#2c0f7cd3);
}
table{
    width:90%;
    margin:auto;
    border-collapse:collapse;
    background-color: #ddd;
    box-shadow: 0px 0px 25px black;
}

th,td{
    border:1px solid black;
    padding:10px;
    text-align:center;
}

img{
    width:80px;
}

button{
    background:red;
    color:white;
    padding:8px 15px;
    border:none;
    cursor:pointer;
}
h1{
    text-align:center;
    color: #ddd;
}
.btn{
    background-color: green;
    margin-left: 10px;
}
.qtybtn{
margin: 5px;
font-size: larger;
}
    </style>

</head>
<body>

<h1>Shopping Cart</h1>

<table>

<tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
$itemTotal = $row['price']*$row['quantity'];
$total += $itemTotal;
?>

<tr>

<td>
<img src="photos/<?php echo htmlspecialchars($row['image']); ?>" class="product-image">
</td>

<td>
<?php echo $row['product_name']; ?>
</td>

<td>
₹<?php echo $row['price']; ?>
</td>

<td>
<button class="qtybtn"><b>-</b></button><?php echo "\t". $row['quantity']."\t"; ?><button class="qtybtn"><b>+</b></button>
</td>

<td>
₹<?php echo $itemTotal; ?>
</td>

<td>
<a href="remove_cart.php?id=<?php echo $row['cart_id']; ?>">
<button>Remove</button>
</a>
</td>
<?php
}
?>
</tr>

<tr>

<td colspan="4"><b>Grand Total</b></td>

<td colspan="4"><b>₹<?php echo $total; ?></b></td>

</tr>
<tr>
    <td colspan="6">
        <a href="product.php"><button class="btn">Continue Shopping</button></a>
        <a href="checkout.php"><button class="btn">Proceed to checkout!</button></a>
    </td>
</tr>
</table>

</body>
</html>