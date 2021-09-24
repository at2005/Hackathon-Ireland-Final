<?php
    session_start();
    include "connectdb.php";

    $conn = connectdb();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_REQUEST["email"]);
        $pword = htmlspecialchars($_REQUEST["password"]);

        $sql_qry = "SELECT * FROM accounts WHERE email = '$email' AND pword = '$pword'";
        $result = mysqli_query($conn, $sql_qry);
        
        if($result->num_rows === 0) {
            $_SESSION["login_check"] = "hi";
            header("location: login.php");
        }
        
        else {
        $_SESSION["username"] = $email;
        header("Location: home.php");
        }
        
        
    }

    mysqli_close($conn);





?>