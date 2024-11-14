<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "php_db";

$conn = mysqli_connect($server,$username,$password,$db);

if (!$conn) {
  die("connection failed : " . mysqli_connect_error());
}

$id=$_GET['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $class = $_POST['class'];

  $sql = "UPDATE student SET fname='$fname',lname='$lname',email='$email',class='$class' WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    header("location:index.php");
    exit();
  } else {
    echo "error" . $sql . "<br>" . mysqli_error($conn);
  }
} else {
  $sql = "SELECT * FROM student WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $student = mysqli_fetch_assoc($result);
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;

    }

    #stdform {
      width: 100%;
      max-width: 500px;
      padding: 20px;
      background-color: white;
      border-radius: 5px;
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .btn {
      width: 100%;
    }
    .error{
      color: red;
    }
  </style>
</head>

<body>

  <form action="" id="stdform" method="POST">
    <center>
      <h2>UPDATE STUDENTS DATA</h2>
    </center><br>
    <div class="mb-3 mt-3">
      <label for="fname" class="form-label">FIRST NAME:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" value="<?php echo $student['fname']; ?>" >
      <small id="fnameError" class="error"></small>
    </div>
    <div class="mb-3 mt-3">
      <label for="lname" class="form-label">LAST NAME:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" value="<?php echo $student['lname']; ?>" >
      <small id="lnameError" class="error"></small>
    </div>
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">EMAIL:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $student['email']; ?>" >
      <small id="emailError" class="error"></small>
    </div>
    <div class="mb-3">
      <label for="class" class="form-label">CLASS:</label>
      <input type="text" class="form-control" id="class" placeholder="Enter class" name="class" value="<?php echo $student['class']; ?>" >
      <small id="classError" class="error"></small>
    </div>
    <button type="submit" class="btn btn-primary">UPDATE STUDENT</button>
  </form>

  <script>
    $(document).ready(function() {
      $("#stdform").validate({
        rules: {
          fname: {
            required: true,
            minlength: 2
          },
          lname: {
            required: true,
            minlength: 2
          },
          email: {
            required: true,
            minlength: 2
          },
          class: {
            required: true,
            minlength: 2
          }
        },
        messages: {
          fname: {
            required: "please enter student first name..",
            minlength: "first name must consist of at least 2 characters"
          },
          lname: {
            required: "please enter student last name..",
            minlength: "last name must consist of at least 2 characters"
          },
          email: {
            required: "please enter student email..",
            minlength: "email must consist of at least 2 characters"
          },
          class: {
            required: "please enter student class..",
            minlength: "class must consist of at least 2 characters"
          },
        }
      });
    });
  </script>

</body>

</html>