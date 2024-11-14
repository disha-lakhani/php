<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "php_db";

$conn=mysqli_connect($server,$username,$password,$db);

if(!$conn){
    die("connection failed :".mysqli_connect_error());
}


$sql="SELECT * FROM student";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
            background-color: #f8f9fa; 
            padding: 20px;
        }
        h2 {
            text-align: center; 
            margin-bottom: 20px; 
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td {
            border: 1px solid #dee2e6; 
            padding: 10px; 
            text-align: center; 
        }
        th {
            background-color:bisque; 
            color: black;
           
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;   
        }
        a {
            color: #007bff; 
            text-decoration: none; 
        }
        a:hover {
            text-decoration: underline; 
        }
        .action-links {
            display: flex;
            gap: 10px; 
            justify-content: center;
        }
    </style>
</head>

<body>

    <h2>STUDENT DATA</h2>
    <a href="insert.php">ADD STUDENT</a><br><br>

    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>FNAME</th>
        <th>LNAME</th>
        <th>EMAIL</th>
        <th>CLASS</th>
        <th>ACTION</th>
    </tr>
        <?php
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" .$row['id']. "</td>";
                echo "<td>" .$row['fname']. "</td>";
                echo "<td>" .$row['lname']. "</td>";
                echo "<td>" .$row['email']. "</td>";
                echo "<td>" .$row['class']. "</td>";
                echo "<td class='action-links'>
                <a href='update.php?id=" .$row['id']. "'>EDIT</a> ||
                <a href='delete.php?id=" .$row['id']. "'>DELETE</a>
                </td>";
                echo"</tr>";
            }
        }
        else{
            echo "<tr><td colspan='4'>NO DATA FOUND</td></tr>";
        }


        ?>
    </table>
</body>
</html>
<?php
    mysqli_close($conn);
?>