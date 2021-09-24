<?php
    session_start();
 
    include "connectdb.php";

    $conn = connectdb();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = stripslashes(htmlspecialchars($_REQUEST["firstName"]));
        $lname = stripslashes(htmlspecialchars($_REQUEST["lastName"]));
        $email = stripslashes(htmlspecialchars($_REQUEST["Email"]));
        $pword = stripslashes(htmlspecialchars($_REQUEST["newPassword"]));
        $bday = stripeslashes(htmlspecialchars($_REQUEST["birthdate"]));

        $sql_qry = "INSERT INTO accounts VALUES ('$fname', '$lname', '$email', '$pword', '$bday')";
        
        if(mysqli_query($conn, $sql_qry)) {
            $_SESSION["username"] = $email;
            header("location: home.php");
        }

        else {
            echo mysqli_error($conn);
        }

    }
    
    mysqli_close($conn);


?>
