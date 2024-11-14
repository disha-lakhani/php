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
                $("#div1").load("demo.php" , function(responseTxt, statusTxt, xhr){
                    if(statusTxt=="success"){
                        alert("successfully loaded...");
                    }
                    if(statusTxt=="error"){
                        alert("error:"+xhr.status+":"+xhr.statusText);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div id="div1">
        <h2>jquery ajax with alert box</h2>
    </div>
    <button>Gooo</button>    
</body>
</html>