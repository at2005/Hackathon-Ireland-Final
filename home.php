
<?php
session_start();
include "connectdb.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // get session email
  $session_email = $_SESSION["username"];
  // set up a db connection
  $connection = connectdb();


  if(isset($_POST["mine"])) {
    

    // create a query to select all causes the person is in
    $select_cause_query = "SELECT * FROM person_cause WHERE email='$session_email'"; 
    // run query
    $result = mysqli_query($connection, $select_cause_query) or die(mysqli_error($connection));

    $str = "";
    // iterate over each result (cause)
    while($row = mysqli_fetch_row($result)) {
      $str .= "The cause name is $row[1]   ";
    
    }

    echo $str;
    exit();
    
  }


  else if(isset($_POST["all"])) {
      // create a query to select all causes the person is in
      $select_cause_query = "SELECT * FROM organization"; 
      // run query
      $result = mysqli_query($connection, $select_cause_query) or die(mysqli_error($connection));
  
      $str = "";
      // iterate over each result (cause)
      while($row = mysqli_fetch_row($result)) {
        $str .= "The cause name is $row[0] and information is: $row[3]  ";
      
      }
  
      echo $str;
      exit();
  }

}
?>



<html>
  <head>
    <link rel="stylesheet" href="CSS/home.css">
  </head>
  <body>
    <h1 id="heading" style="margin-top:2%; text-align:center;"></h1>
    <div class = "page">
    
      <button id="cause_btn_first" class="cause_button" onclick=location.href='organization/organization.html'>Create A Cause</button>
      <button class= "cause_button" onclick=location.href='organization/join.php'>Join Cause</button>

        <?php
  
        // get session email
        $session_email = $_SESSION["username"];
        // set up a db connection
        $connection = connectdb();

        // create a query to select all causes the person is in
        $select_cause_query = "SELECT * FROM person_cause WHERE email='$session_email'"; 
        // run query
        $result = mysqli_query($connection, $select_cause_query) or die(mysqli_error($connection));
        
          // if user has not registered for any causes then print "you have not registered for any causes"
          echo "<div id='ycauses' style='height: 500px;'><h1 class='header_text'>Your Causes</h1><br>";
          if(is_null($result)) {
            echo "<p style='text-align:center; font-size:120%;'>You have not registered for any causes</p><br>";
          }
        
        // iterate over each result (cause)
        while($row = mysqli_fetch_row($result)) {
        
            // output box containing a Donate button and an Inspect button
            echo "
            
            <div class = 'notifs'>
              <p class='cause_header'>$row[1]</p>
              <form style='margin-bottom:0px;' action='donate.html' method='POST'>
              <button class='ad'>Donate</button>
              </form>   

              <form method='POST' action='organization/dashboard.php'>
              <button class='ad' name='cause_name' type='submit' value=$row[1]>Inspect</button>
              </form>            
              </div>

            ";
        }



        echo "</div>";
        echo "<br>";
        echo "<div id='acauses'><h1 class='header_text'>All Causes</h1><br>";

        // select all causes now
        $select_cause_query = "SELECT * FROM organization";
        // run query
        $result = mysqli_query($connection, $select_cause_query) or die(mysqli_error($connection));
       // iterate over each result (cause)
       $str = "";
        while($row = mysqli_fetch_row($result)) {
         

        
            // return a container for the cause with a Donate button and a Join button
            echo "
            <div class = 'notifs'>
                  <p class='cause_header'>Cause: $row[0]</p>
                  <p id='info'>Info: $row[3]</p>
                  <form style='margin-bottom:0px;' action='donate.html' method='POST'>
                    <button class='ad'>Donate</button>
                  </form>
                  <form action='organization/cell.php' method='POST'>
                  <button name='org_name' class='ad' value='$row[0]' style='padding-left:22%; padding-right:21.3%;'>Join</button>
                  </form>
              </div>

            ";
         }
        

        
        echo "</div>";
        // close db connection
        mysqli_close($connection);

        ?>

       
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src = "JS/home.js"></script>
  </body>
</html>