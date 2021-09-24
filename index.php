<!DOCTYPE html>
<html lang="en">

  <?php

  session_start();
  if(isset($_SESSION["username"])) {
    header("location: home.php");
  }

  ?>

  <head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title id="title">Making Donations Easy</title>
  </head>
  <link rel = "stylesheet" type = "text/css" href = "CSS/index.css">

  <body>
    <div>
      <h1 id="header1">Revolution.</h1>      
      <h1 id = "h_higher">At Your Fingertips</h1>

      <h3 id = "subtext">All your NGOs. In one integrated hub</h3>

      <button id="signup"><a href = "signup.php">Sign up</a></button>
      <button id = "only"><a href = "login.php">Login</a></button>

      <select id="langbox" onchange="changelang(this.value);">
        <option value="English" id="en">English</option>
        <option value="French" id="fr">French</option>
        <option value="Dutch" id="du">Dutch</option>
      </select>
    </div>
<!-- 
    <div class = "infobox">
      <h2></h2>
    </div>

    <div class = "infobox" id = "infobox_bottom">
      <h2></h2>
    </div> -->
  </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="index.js" type="text/javascript"></script>

</html>