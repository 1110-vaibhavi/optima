
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
<html>
    <head>
        <title>Check Out</title>
        <style>
             body{background-image:radial-gradient(white,#2c0f7cd3);}
             .form-container{
                 display:flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 10px;
                justify-content: center;
                align-items: center;
             }
             .billing-shipping{
                display: flex;
              background-color: #ddd;
                 justify-content: flex-start;
                align-items:flex-start;
                flex-direction: column;
                flex-wrap: wrap;
                padding: 20px;
                width: 500px;
                line-height: 20px;
                font-size: 20px;
                box-shadow: 0px 0px 25px black;  
             }
             .billing-shipping label{
                font-size: large;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: #000000;
        }
             .billing-shipping input[type=radio]{
                width:100px;
                height:20px;
                line-height: 10px;
             }
             .billing-shipping textarea,input{
                width:500px;
                height:30px;
                line-height: 10px;
                background-color: rgb(0,0,0,0.2);
            border:none;
            border-radius: 4px;
           border-style: groove;
            border-color: green;
            border-top: none;
            border-left: none;
            border-right: none;
             }
             .your-order{
                 display: flex;
              background-color: #ddd;
                 justify-content: center;
                align-items: center;
                flex-direction: column;
                flex-wrap: wrap;
                padding: 10px;
                width: 500px;
                line-height: 20px;
               height: 761px;
               box-shadow: 0px 0px 25px black;  
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
    background-color: green;
    color:white;
    height:40px;
    width:100px;
    border-radius: 10px;
}
.billing-shipping input[type=radio]{
background-color: green;
}
        </style>
    </head>
    <body>
        <div class="logo-container"></div>
        <form method="POST" action="checkoutform.php">
        <div class="form-container">
                <div class="billing-shipping">
                <h2>Billing & Shipping Details</h2>
                <label for="firstname">First Name</label>
                <input type="text" name="firstname"><br>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname"><br>
                <label for="address">Address</label>
                <textarea name="address"></textarea><br>
                <label for="city">City</label>
                <input type="text" name="city"><br>
                <label for="pincode">Pin Code</label>
                <input type="text" name="pincode"><br>
                <label for="phone">Phone</label>
                <input type="number" name="phone"><br>
                <label for="email">Email</label>
                <input type="text" name="email"><br>
                <h2>Shipping Method</h2>

<label>
    <input type="radio" name="shipping" value="FREE" checked>
    Standard Shipping (Free)
</label><br>

<label>
    <input type="radio" name="shipping" value="15">
    Express Shipping (₹15)
</label>
                <h2>Payment Method</h2>


<label>
    <input type="radio" name="payment" value="cash_on_delivery" checked>
    Cash on Delivery
</label><br>

<label>
    <input type="radio" name="payment" value="UPI">
    UPI
</label>
                </div>
                <div class="your-order">
                    <h2>Your Order</h2>
<table>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
<?php

while($row=mysqli_fetch_assoc($result))
{
$itemTotal = $row['price']*$row['quantity'];
$total += $itemTotal;
?>

<tr>
<td>
<img src="<?php echo $row['image']; ?>">
</td>

<td>
<?php echo $row['product_name']; ?>
</td>

<td>
₹<?php echo $row['price']; ?>
</td>

<td>
<?php echo $row['quantity']; ?>
</td>

<td>
₹<?php echo $itemTotal; ?>
</td>
<?php
}
?>
</tr>
<tr>

<td colspan="4"><b>Sub Total</b></td>

<td colspan="4"><b>₹<?php echo $total; ?></b></td>
</tr>
<tr>
    <td colspan="4"><b>Shipping</b></td>
    <td><b id="shippingAmount">₹0</b></td>
</tr>

<tr>
    <td colspan="4"><b>Total</b></td>
    <td><b id="grandTotal">₹<?php echo $total; ?></b></td>
</tr>
<tr>
    <td colspan="6">
    <a href=""><button>Place Order</button></a>
     </form>
</td>

</tr>
</table>

                </div>
            </form>
        </div>
        <script>
let subtotal = <?php echo $total; ?>;

function updateTotal() {

    let shipping = 0;

    let selected = document.querySelector('input[name="shipping"]:checked');

    if(selected.value == "15"){
        shipping = 15;
    }

    document.getElementById("shippingAmount").innerHTML = "₹" + shipping;
    document.getElementById("grandTotal").innerHTML = "₹" + (subtotal + shipping);
}

let radios = document.querySelectorAll('input[name="shipping"]');

radios.forEach(function(radio){
    radio.addEventListener("change", updateTotal);
});

updateTotal();
</script>
    </body>

</html>
