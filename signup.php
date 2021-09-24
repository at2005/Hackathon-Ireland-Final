<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel = "stylesheet" type = "text/css" href = "CSS/styles-signup.css">
    <script type = "text/javascript" src = "script-signup.js"></script>


</head>
<body>
    <div>
        <h1 class = "title"></h1>
    </div>
    
    <div class = "form">
        <h1 id = "header">Create Your Account</h1>
        <form method = "POST" id = "signup" action = "action.php">
            
            <input name = "firstName" type = "text" placeholder="First Name" required id = "fname">

            <input name = "lastName" type = "text" placeholder = "Last Name" required id = "lname">
            
            <input name = "Email" type = "email" placeholder="email, e.g. person@gmail.com" required id = "mail">
            
            <input name = "newPassword" type = "password" id = "password" placeholder="Password" required minlength="8" maxlength="25">
            
           
            <input name = "passwordConfirm" type = "password" placeholder = "Confirm Password" required minlength="8" maxlength="25" id = "cpassword">

           <br>
           <input name = "birthdate" type = "number" min = "1920" max = "2019" placeholder="Year Of Birth" id = bd required>
           <br>

            <input name = "terms" type ="checkbox" id = "box" required>

            <p id = "tc">I agree to the <a href = "termsandconditions.txt" id = "tcLink" target = "_blan">Terms and Conditions</a></p>
            
            
            <input name = "submit" type = "Submit" id = "button" value = "Sign up">
        
            
            <a href = "login.php" id = "login">Already have an account? Login</a>
        </form>
    </div>    
</body>
</html>