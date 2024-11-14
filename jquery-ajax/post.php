<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX POST Example</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $.post("demo2.asp",
                    {
                        name: "disha",
                        city: "surat"
                    },
                    function(data, status){
                        alert("Data: " + data + "\nStatus: " + status);
                    }
                );
            });
        });
    </script>
</head>
<body>
    <button>Post Data</button>
</body>
</html>
