<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
$_SESSION["org"] = $_POST["org_name"];
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../CSS/cell.css">
    </head>

    <body>
        <?php
        echo "<div class='form123'>
            <form method='POST' action=\"create_cell.php\" class=\"form\">
            <h1 id=\"header\">Join " . $_SESSION["org"] . "</h1>

                <input type=\"text\" name=\"p2\" placeholder=\"Add a second person?\"></input>

                <br>

                <input type=\"text\" name=\"p3\" placeholder=\"Add a third person?\"></input>
                <br>
                <button type=\"submit\" id=\"button\">Invite</button>
                <br>
                <a href='create_cell.php' style='margin-left:80%;'><button>Skip</button></a>


                </form>
        </div>";
        ?>
    </body>


</html>
