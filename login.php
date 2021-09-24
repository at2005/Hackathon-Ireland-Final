
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Help support the causes you love</title>
    <link href = "CSS/styles-login.css" type = "text/css" rel = "stylesheet">
    <!-- <script type = "text/javascript" src = "script.js"></script> -->
</head>
<body>
    <div>
        <h1 class = "title"></h1>
    </div>

    <div class = "form">
        <form action = "action-login.php" method="POST" id = "signin">
            <h1 id = "header">Login</h1>

            <input name = "email" type = "text" placeholder="Email" required id = "mail">
            <input name = "password" type = "password" placeholder="Password" required id = "pword">
           
           <?php
                session_start();
                if(isset($_SESSION["login_check"])) {
                    echo "<p id = 'incorrect'>Incorrect username or password</p>";
                }
            
                session_destroy();
           ?>


            <input value = "Login" type = "submit" id = "button">
            <a href = "#" id = "login">Forgotten Password?</a>

        </form>
    </div>


 


    
</body>
</html>