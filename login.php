<?php
session_start();
$conn= mysqli_connect('localhost','root','','optima') ;
if($conn->connect_error){
   // echo "Connection Fail :".$conn->connect_error;
}else{
    //echo"Connected";
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $pass=$_POST['pass'];
    $sql="SELECT * FROM registration WHERE username='$username';";
    $result=$conn->query($sql);
    if($result && $result->num_rows>0){
    $row=$result->fetch_assoc();
        if(password_verify($pass,$row['pass'])){
        $_SESSION['username']=$username;
        $_SESSION['loggedin']=true;
        $SESSION['user_id']=$row['user_id'];
        echo "success";
        }else{
            echo"Fail : Incorrect Password ";
        }
}else{
    echo "user doesnt exist";
}
}
//$username=$_POST['username'];
//$sql="SELECT * FROM registration WHERE username='$username';";
//$result=$conn->query($sql);
//if($result && $result->num_rows>0){
//$row=$result->fetch_assoc();
//$user_input=$_POST['pass'];
//$db_password=trim($row['pass']);
//if(password_verify($user_input,$db_password)){
//    echo"Login ";
//
//}else{
//    echo"Fail";
//}
//}else{
//    echo"Fail : USer does not exsist";
//}
$conn->close();
?>