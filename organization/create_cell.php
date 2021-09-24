<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include "../connectdb.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // connect to database
    $db_connection = connectdb();
    // fetch organization name
    $organization_name = $_SESSION["org"];
    // get email addresses
    $p2_name = $_POST["p2"];
    $p3_name = $_POST["p3"];
    // get our username
    $sess_email = $_SESSION["username"];

    if($p2_name == "" && $p3_name == "") {
      $table_link_query = "INSERT INTO person_cause VALUES ('$sess_email', '$organization_name', '0')";
      mysqli_query($db_connection, $table_link_query) or die(mysqli_error($db_connection));
    } 
    
    else {
      // set email headers
      $headers = "Content-type: text/html\r\nFrom: $sess_email\r\n";
      // email content for p2
      $msg_p2 = wordwrap("
      <h2>$sess_email wants you to join the organization cell along with $p3_name!</h2>    
      <a href='https://hackathon1234.ddns.net/hackathon/signup.php'>Confirm</a>
      ", 80);


      // email content for p3
      $msg_p3 = wordwrap("
      <h2>$sess_email wants you to join the organization cell along with $p2_name!</h2>    
      <button onclick=location.href='https://hackathon1234.ddns.net/hackathon/signup.php'>Confirm</button>
      ", 80);

      //  mail($p2_name, "confirmation", $msg_p2, $headers) or die("error");
        //header("Location: organization.html");
      // $_SESSION["email"] = "tambdeayush@gmail.com";
    

      // select all the total number of cells of organization
      $get_cell_num_query = "SELECT NumCells FROM `organization` WHERE organization_name='$organization_name'";
      // run query or die
      $cell_num_result = mysqli_query($db_connection, $get_cell_num_query) or die(mysqli_error($db_connection));
      // convert to int and increment by one
      $cell_num_result = (int)($cell_num_result->fetch_array()[0]);
      $cell_num_result++;
      // get the table name of the cell corresponding to the org
      $cell_table_name = $organization_name."cell";
      // insert values
      $fill_cell_table_query = "INSERT INTO $cell_table_name VALUES ('$cell_num_result', '$sess_email', '$p2_name', '$p3_name')";
      mysqli_query($db_connection, $fill_cell_table_query)  or die(mysqli_error($db_connection));
      // add cause to person-cause relational table
      $table_link_query = "INSERT INTO person_cause VALUES ('$sess_email', '$organization_name', '$cell_num_result')";
      mysqli_query($db_connection, $table_link_query) or die(mysqli_error($db_connection));
    
        
    } 

      // close connection
      mysqli_close($db_connection);
      // navigate to cell dashboard
    header("Location: cell_dashboard.html");
}

?>