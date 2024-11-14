<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
     $(document).ready(function(){
        $("button").click(function(){
            $.ajax({
                url:"demo.php",
                success:function(result){
                    $("#div1").html(result);
                }
            });
        });
     });
    </script>
</head>
<body>
    <div id="div1"><h2>Change the text</h2></div>
    <button>Gooo</button>
</body>
</html>