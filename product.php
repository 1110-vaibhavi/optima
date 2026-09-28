<?php
$conn= new mysqli("localhost","root","","optima");
if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
$product_type=isset($_GET['type'])?htmlspecialchars($_GET['type']):null;
$product_brand=isset($_GET['brand'])?htmlspecialchars($_GET['brand']):null;
$product_shape=isset($_GET['shape'])?htmlspecialchars($_GET['shape']):null;
$sql="SELECT * FROM glasses_catalog WHERE  1=1";
if(!empty($product_type)){
    $sql .= " AND type='$product_type'";
}
if(!empty($product_shape)){
    $sql .= " AND shape='$product_shape'";
}
if(!empty($product_brand)){
    $sql .= " AND brand='$product_brand'";
}
$result=$conn->query($sql);
if($result && $result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $glasses_catalog[]=$row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eyeglasses Dashboard</title>
    <style>
        body{background-image:radial-gradient(#ddd,black);}
        .grid { display: flex; gap: 20px; font-family: sans-serif; flex-wrap: wrap; gap:50px;align-items: center;justify-content: center;}
        .card { border: 1px solid #ddd; padding: 15px; border-radius: 8px; text-align: center; width: auto;background-color: #ddd; box-shadow: 0px 0px 25px black;  }
        .product-image{
            height: 300px;width: 300px;background-position: center;background-repeat: no-repeat;background-size: cover;
        }
        .btn { display: inline-block; background: #007BFF; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="grid">
        <?php if(!empty($glasses_catalog)):?>
        <?php foreach ($glasses_catalog as $item): ?>
            <div class="card">
                 <img src="photos/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>"class="product-image">
                <h3><?php echo $item['name']; ?></h3><p><?php echo  $item['brand'];?></p>
                <p>₹<?php echo number_format($item['price'], 2); ?></p>
                <!-- Clicking this link sends the ID to product.php -->
                <a href="productdetails.php?id=<?php echo $item['id']; ?>" class="btn">View Details</a>
            </div>
        <?php endforeach; ?>
        <?php else:?>
            <p>No Product Found.</p>
            <?php endif;?>
    </div>
</body>
</html>