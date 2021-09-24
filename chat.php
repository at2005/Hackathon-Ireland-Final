<?php
header("Content-Type: application/json");
ini_set("session.cookie_samesite","None");
ini_set("session.cookie_samesite", "On");
session_start();
include "connectdb.php";

ini_set("display_errors",1);
error_reporting(E_ALL);
$uname = $_SESSION["username"];
$conn = connectdb();
$filename = "chat/chatfile.txt";
$query = "SELECT * FROM accounts WHERE email = '$uname'";
$result = mysqli_query($conn, $query);
$result_array = $result->fetch_assoc();
$filename = $result_array["chatfilename"];
$filename = "chatfile.txt";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["chatmsg"])) {

        $text = $_POST["chatmsg"];
        $chatfile = fopen($filename, "a");
        $text .= "<br>\n";
        $text = $uname. ": ". $text;
        fwrite($chatfile, $text);
        fclose($chatfile);
  }
}

else {
  if(isset($_GET["getfile"])) {
    echo json_encode(["out" => file_get_contents($filename)]);
  }

  else {
    $chatfile = fopen($filename, "w");
    fclose($chatfile);
    $data = file_get_contents($filename);
    echo json_encode(["out" => $data]);
  }
}

mysqli_close($conn);

?>
