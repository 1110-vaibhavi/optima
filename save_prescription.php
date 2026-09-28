<?php
session_start();

$conn = mysqli_connect("localhost","root","","optima");

if(!isset($_SESSION['loggedin'])){
    header("Location:login.php");
    exit();
}

$username = $_SESSION['username'];

$right_sph  = $_POST['right_sph'];
$right_cyl  = $_POST['right_cyl'];
$right_axis = $_POST['right_axis'];

$left_sph  = $_POST['left_sph'];
$left_cyl  = $_POST['left_cyl'];
$left_axis = $_POST['left_axis'];

$pd = $_POST['pd'];
$prescription_status=['prescription_status'];
$filePath = "";

if(isset($_FILES['prescription_file']) && $_FILES['prescription_file']['error']==0){

    $folder = "uploads/";

    if(!is_dir($folder)){
        mkdir($folder,0777,true);
    }

    $filename = time()."_".$_FILES['prescription_file']['name'];

    $target = $folder.$filename;

    move_uploaded_file($_FILES['prescription_file']['tmp_name'],$target);

    $filePath = $target;
}

$sql = "INSERT INTO `spectacle_prescription`
(username,right_sph,right_cyl,right_axis,left_sph,left_cyl,left_axis,pd,prescription_file)
VALUES
('$username','$right_sph','$right_cyl','$right_axis',
'$left_sph','$left_cyl','$left_axis','$pd','$filePath')";

mysqli_query($conn,$sql);

header("Location:cart.php");
exit();
?>