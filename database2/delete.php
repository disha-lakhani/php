<?php
 
 $server="localhost";
 $username="root";
 $password="";
 $db="php_db";

 $conn=mysqli_connect($server,$username,$password,$db);

 if(!$conn){
    die("connection failed : ".mysqli_connect_error());
 }
 $id=$_GET['id'];

 $sql="DELETE FROM student WHERE id=$id";

 if(mysqli_query($conn,$sql)){
    header("location:index.php");
    exit();
 }
 else{
    echo "error:" .$sql."<br>" .mysqli_error($conn);
 }
 mysqli_close($conn);

?>