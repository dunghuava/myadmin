<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <style>
        .center{
            text-align:center;
            position:fixed;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
        }
    </style>
</head>
<body>
    <div class="center">
        <h2 id="c-time">404</h2>
    </div>
    <script>
        var ctime = document.getElementById('c-time');
        var t=5;
        setInterval(() => {            
            t--;
            ctime.innerHTML=t+'s';
            if (t<=0){
                history.back();
            }
        }, 1000);
    </script>
</body>
</html>