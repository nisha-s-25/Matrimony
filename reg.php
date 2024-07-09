<?php
$servername="localhost";
$username="root";
$password="nisha";
$dbname="matrimony";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection error".$conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $gender=$_POST["gender"];
    $religion=$_POST["religion"];
    $mothertongue=$_POST["mothertongue"];
    $emailid=$_POST["emailid"];
    $password=$_POST["password"];
    echo "REGISTERED SUCCESSFULLY";
    echo "name:$name<br>";
    echo "gender:$gender<br>";
    echo "religion:$religion<br>";
    echo "mothertongue:$mothertongue<br>";
    echo "email id:$emailid<br>";
    echo "password:$password<br>";
    $sql="INSERT INTO mat1(ename,gender,religion,mothertongue,emailid,password1) VALUES('$name','$gender','$religion','$mothertongue','$emailid','$password')";
    if($conn->query($sql)==TRUE)
    {
        echo "new record created successfully";
    }
    else{
        echo "error in creation";
    }
}
?>