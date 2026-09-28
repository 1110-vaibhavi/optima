<?php
$conn=mysqli_connect("localhost","root","","optima");
if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
$sql="SELECT id,name,price,image,type,brand,shape FROM glasses_catalog;";
$result=$conn->query($sql);
if($result && $result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $glasses_catalog[]=$row;
    }
}
$conn->close();
?>
<html>
    <head><title>Optima-Custom Your Style</title>
        <link rel="stylesheet" href="bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="btn-container">
        <button id="menu-btn">&#9776;</button>
        <a href="cart.php"><i class="bi bi-cart-fill" ></i></a>
        <a href="user.php"><i class="bi bi-person-fill"></i></a>
        </div>
        <nav id="sidebar" class="hidden-nav">
            <a href="product.php?type=eyeglasses">Eyeglasses</a>
            <a href="product.php?type=sunglasses">Sunglasses</a>
            <a href="product.php?type=contactlens">Contact lenses & Accessories</a>
            <a href="product.php?type=kidsglasses">Kids Glasses</a>
            <a href="product.php?type=splpower">Spetial Power</a>
            
        </nav>
            <div class="slide-show-container">
                <div class="slide-show"></div>
                 <div class="slide-show"></div>
                 <div class="slide-show"></div>
                <div class="slide-show"></div>
                 <div class="slide-show"></div>
                  <div class="slide-show"></div>
            </div><br>
            <h2>Top Categories</h2>
            <div class="categories-container">
              <div class="categories"><a href="product.php?type=eyeglasses">Eyeglasses</a></div>
              <div class="categories"><a href="product.php?type=sunglasses">Sunglasses</a></div>
              <div class="categories"><a href="product.php?type=contactlens">Contact lenses</a></div>
              <div class="categories"><a href="product.php?type=kidsglasses">Kids Glasses</a></div>
              <div class="categories"><a href="product.php?type=splpower">Spetial Power</a></div>
            </div>

            <h2>Get The Perfect Shape Eyeglasses</h2>
            <div class="shape-container">
              <div class="shape"><a href="product.php?type=eyeglasses&amp;shape=rectangle">Rectangle</a></div>
              <div class="shape"><a href="product.php?type=eyeglasses&amp;shape=cateye">Cateye</a></div>
              <div class="shape"><a href="product.php?type=eyeglasses&amp;shape=Aviator">Aviator</a></div>
              <div class="shape"><a href="product.php?type=eyeglasses&amp;shape=geometric">Geometric</a></div>
              <div class="shape"><a href="product.php?type=eyeglasses&amp;shape=round">Round</a></div>
              <div class="shape"><a href="product.php?type=eyeglasses&amp;shape=clubmaster">Clubmaster</a></div>
              <div class="shape"><a href="product.php?type=eyeglasses&amp;shape=square">Square</a></div>
            </div>

            <h2>Get The Perfect Shape Sunglasses</h2>
            <div class="shapesun-container">
              <div class="shapesun"><a href="product.php?type=sunglasses&amp;shape=rectangle">Rectangle</a></div>
              <div class="shapesun"><a href="product.php?type=sunglasses&amp;shape=cateye">Cateye</a></div>
              <div class="shapesun"><a href="product.php?type=sunglasses&amp;shape=aviator">Aviator</a></div>
              <div class="shapesun"><a href="product.php?type=sunglasses&amp;shape=geometric">Geometric</a></div>
              <div class="shapesun"><a href="product.php?type=sunglasses&amp;shape=round">Round</a></div>
              <div class="shapesun"><a href="product.php?type=sunglasses&amp;shape=clubmaster">Clubmaster</a></div>
              <div class="shapesun"><a href="product.php?type=sunglasses&amp;shape=square">Square</a></div>
            </div>

            <div class="photo-1"></div>

            <h2>Exclusive at Optima</h2>
            <div class="exclusive-container">
               <div class="exclusive"><b>Crystal-Clear</b>-Transparent Frames</div>
               <div class="exclusive"><b>Best-Sellers</b>-Popmart Inspired Eyeware</div>
               <div class="exclusive"><b>Bold-Signature</b>--John Jacobs</div>
               <div class="exclusive"><b >The Devil Ware</b>--John Jacobs</div>
               <div class="exclusive"><b >2 in 1: Eye + Sun</b>-Hustlr Switch</div>
               <div class="exclusive"><b >Feather-Light</b>-Ultra Lights Frame</div>
            </div>

            <div class="photo-2">Photo 2</div>

            <h2>Our Brands</h2>
             <div class="brand-container">
               <div class="brand"><a href="product.php?brand=VincentChase"><b style="font-size:20px;">Vincent Chase</b></a>-Start at &#8377 800</div>
               <div class="brand"><a href="product.php?brand=hustlr"><b style="font-size:20px;">-Hustlr</b></a>-Starts at &#8377 500</div>
               <div class="brand"><a href="product.php?brand=Jacobs"><b style="font-size:20px;">Johan Jacobs</b></a>Starts at &#8377 3200</div>
               <div class="brand"><a href="product.php?brand=Aqualens"><b style="font-size:20px;">Aqualens</b></a>Starts at &#8377 249</div>
               <div class="brand"><a href="product.php?brand=hopper"><b style="font-size:20px;">Hopper</b></a> at &#8377 500</div>
            </div>
    
            <h2>Primium Eyeware</h2>
             <div class="primium-container">
                <div class="big-card">
              <a href="product.php?brand=meller"><b style="font-size:20px;">Meller</b></a>Made in Spain
               </div>
               <div class="small-card">
               <div class="primium"><a href="product.php?brand=johanjacobs"><b style="font-size:20px;">JOHN JACOBS</a></b>Made in India</div>
               <div class="primium"><a href="product.php?brand=owndays"><b style="font-size:20px;">OWNDAYS</a></b>Made in Japan</div>
               <div class="primium"><a href="product.php?brand=lepitit"><b style="font-size:20px;">LEPETIT</a></b>Made in Paris</div>
               <div class="primium"><a href="product.php?brand=fossils"><b style="font-size:20px;">FOSSILS</a></b>Made in Italy</div>
               </div>
            </div>

            <h2>Get a Free Eye Check Up</h2>
            <div class="checkup-container">
                <div class="checkup"><b style="font-size:20px ;">Visit Nerest Store</b><br>Walk in for quick eye test.</div>
                <div class="checkup"><b style="font-size: 20px;">Schedule at Home</b>Try 1000+ frames</div>
                <div class="checkup"><b style="font-size: 20px;">Take an Online Eye Test</b>Any time, Anywhere</div>
            </div>

                <div class="logo">
            <div class="logocontainer">
            <div class="brand-name">
                <div class="glasses-icon">
                    <div class="left-arm"></div>
                    <div class="lens"></div>
                    <div class="bridge"></div>
                    <div class="lens"></div>
                    <div class="p-stem"></div>
                </div>
                <span class="text">tima</span>
                <span class="trademark">®</span>
            </div>
            <span class="subtitle">shop</span>
        </div>
        </div> 
          <h4 class="h4">Choose your Style!</h4>
            </div>
            <div class="footer-container">
                <h1>Buy Eyewear from Optima</h1>
                <div class="footer">
                <p>Optima - is a technology-driven eyewear company, with a belief that clear vision is 
                    fundamental to personal development and well-being.<br>Our aim is to build tech-enable 
                    supply and distribution solutions that improve access to affordable and quality
                    Eyewear for All.
                </p>
                <p>We sell a wide range of eyewear products including prescription eyeglasses,sunglasses and other products 
                    such as contact lenses and eyewear accessories.<br> Our brands are designed to be aspirational
                    and appeal to a wide range of customer segments. 
                </p>
                ______________________________________________________________________________________________________________
                </div>
            </div>
        <script>
            const menuBtn = document.getElementById('menu-btn');
            const sidebar = document.getElementById('sidebar');
            menuBtn.addEventListener('click',()=>{
                sidebar.classList.toggle('show');
                
            })
            </script>
    </body>
    </html>