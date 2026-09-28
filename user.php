
<?php
session_start();

if(!isset($_SESSION['loggedin'])){
    header("Location: login.html");
    exit();
}

$conn = mysqli_connect("localhost","root","","optima");

$username = $_SESSION['username'];
$sql="SELECT * FROM registration WHERE username='$username';" ;
 $result=$conn->query($sql);
   
?>
<html>
    <head>
           <link rel="stylesheet" href="bootstrap-icons.css">
        <style>
            body{
                display: flex;
                align-items: center;
                justify-content: center;
            }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #ddd;
            height: 800px;
            width: 800px;
            font-size: 30px;
            border-radius: 40px;
            border: 1px solid black;
            line-height: 60px;
        }
        .container i{
            display:flex;
           position:absolute;
           font-size: 200px;
            color: gray;
        }
        .user{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            height: 220px;
            width: 220px;
            border-radius:50%;
              border: 1px solid black;
        }
        button{
            color: red;
            height: 50px;
            width: 100px;
            font-size: 20px;
            border-radius: 20px;
        }
    </style></head>
    <body>
        <div class="container">
           <div class="user"><i class="bi bi-person-fill"></i></div>
            <?php
    while($row=mysqli_fetch_assoc($result))
{
?>
<div><b>Name : </b><?php echo $row['name'];?></div>
<div><b>User Name :</b> <?php echo $row['username']; ?></div>
<div><b>Email : </b><?php echo $row['email'];?></div>
<?php
 }
?>
<button>Log Out</button>
        </div>
    </body>
</html>