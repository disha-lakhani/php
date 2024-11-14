<?php 
$server="localhost";
$username="root";
$password="";
$db="test";

$conn=new mysqli($server,$username,$password,$db);

if($conn->connect_error){
    die("connection failed : ".$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];

    $sql="INSERT INTO product(name,price,category)VALUES('$name',$price,'$category')";

    if($conn->query($sql)===TRUE){
        header("Location:index.php");
        exit();
    }
    else{
        echo "error :".$sql."<br>" .$conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

</head>
<body>
  
    <h2>ADD PRODUCTS</h2>
    <form action="" id="proform" method="POSt">
        <label for="">NAME :</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="">PRICE :</label><br>
        <input type="text" id="price" name="price" required><br><br>
        <label for="">CATEGORY :</label><br>
        <input type="text" id="category" name="category" required><br><br>
        <button type="submit">ADD PRODUCT</button>
    </form>
    <script>
        $("#proform").validate({
            rules:{
                name:{
                    required:true,
                    minlength:2
                },
                price:{
                    required:true,
                    minlength:2
                },
                category:{
                    required:true,
                    minlength:2
                }
            },
            messages:{
                name:{
                    required:"please enter product name",
                    minlength:"product name must consist of at least 2 characters"
                },
                price:{
                    required:"please enter price..",
                    minlength:"price must consist of at least 2 number"
                },
                category:{
                    required:"please enter product category..",
                    minlength:"category must consist of at least 2 characters"
                }
            }
        });
    </script>
    
</body>
</html>