<?php
$conn = mysqli_connect("localhost","root","","optima");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$product_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;

if(!$product_id){
    header("Location: product.php");
    exit;
}

$sql = "SELECT * FROM glasses_catalog WHERE id='$product_id'";
$result = $conn->query($sql);

$glasses_catalog = [];

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $glasses_catalog[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Product Details</title>

<link rel="stylesheet" href="bootstrap-icons.css">

<style>

body{
    margin:0;
    padding:20px;
    background-image:radial-gradient(#ddd,black);
    font-family:Arial, Helvetica, sans-serif;
}

.grid{
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top:100px;
   
}

.card{
    width:70%;
    background:#ddd;
    border-radius:10px;
    padding:20px;
    display:flex;
    gap:30px;
    box-shadow:0 0 25px black;
    position:relative;
    justify-content: center;
    align-items: center;
}

.left{
    width:70%;
}

.left img{
    width:100%;
    height:550px;
    object-fit:cover;
    box-shadow: 0 15px 15px rgba(0,0,0,0.9);
    border-radius:8px;

}

.right{
    width:55%;
    line-height:1.8;
}

.right h2{
    margin-top:0;
}

.right p{
    margin:6px 0;
}

.icon-container{
    position:absolute;
    top:20px;
    right:20px;
    display:flex;
    flex-direction:column;
    gap:12px;
}

.icon-container form{
    margin:0;
}

.icon-btn{
    width:50px;
    height:50px;
    border:none;
    border-radius:50%;
    background:white;
    cursor:pointer;
    display:flex;
    justify-content:center;
    align-items:center;
    box-shadow:0 3px 10px rgba(0,0,0,.4);
    transition:.3s;
}

.icon-btn:hover{
    background:#2c0f7c;
}

.icon-btn i{
    font-size:24px;
    color:black;
}

.icon-btn:hover i{
    color:white;
}

.stock{
    color:red;
    font-weight:bold;
}

.status{
    color:green;
    font-weight:bold;
}

.out{
    color:red;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="grid">

<?php if(!empty($glasses_catalog)): ?>

<?php foreach($glasses_catalog as $item): ?>

<div class="card">

    <!-- Cart & Wishlist Icons -->
    <div class="icon-container">

        <!-- Cart -->
        <form action="add_to_cart.php" method="POST">

            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $item['name']; ?>">
            <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
            <input type="hidden" name="image" value="<?php echo $item['image']; ?>">

            <button class="icon-btn" type="submit">
                <i class="bi bi-cart"></i>
            </button>

        </form>

        <!-- Wishlist -->
        <form action="wishlist.php" method="POST">

            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">

            <button class="icon-btn" type="submit">
                <i class="bi bi-heart"></i>
            </button>

        </form>

    </div>

    <!-- Left Image -->
    <div class="left">

        <img src="photos/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">

    </div>

    <!-- Right Details -->
    <div class="right">

        <h2><?php echo $item['name']; ?></h2>

        <h3>₹<?php echo number_format($item['price'],2); ?></h3>

        <p><b>Brand :</b> <?php echo $item['brand']; ?></p>

        <p><b>Type :</b> <?php echo $item['type']; ?></p>

        <p><b>Shape :</b> <?php echo $item['shape']; ?></p>

        <p><b>Available Colours :</b> <?php echo $item['available_color']; ?></p>

        <p><b>Lens Type :</b> <?php echo $item['select_lenstype']; ?></p>

        <p><b>Gender :</b> <?php echo $item['gender']; ?></p>

        <p><b>Material :</b> <?php echo $item['material']; ?></p>

        <p><b>Size :</b> <?php echo $item['size']; ?></p>

        <?php
        if($item['stock']==0){
            echo "<p class='out'>Status : Out of Stock</p>";
        }
        else{
            echo "<p class='status'>Status : Available</p>";
        }

        if($item['stock']<20 && $item['stock']>0){
            echo "<p class='stock'>Only ".$item['stock']." pieces left!</p>";
        }
        ?>

        <p><b>Description :</b></p>

        <p><?php echo $item['description']; ?></p>

    </div>

</div>

<?php endforeach; ?>

<?php else: ?>

<h2>No Product Found.</h2>

<?php endif; ?>

</div>

</body>
</html>