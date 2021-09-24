
<?php
function connectdb() {
    $servername = "localhost";
    $username = "root";
    $password = "Qubit9010";
    $db_name = "hackathon_db";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if($conn->connect_error) {
        die("Connection Failed");
    }

    return $conn;
}




?>




