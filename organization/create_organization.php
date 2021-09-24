<?php
include "../connectdb.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = connectdb();
    $org_name = $_POST["organization_name"];
    $org_cap = $_POST["max_capital"];
    $org_total = 0;
    $org_info = $_POST["organization_info"];
    $create_organization_query = "INSERT INTO organization (
        organization_name, organization_cap, organization_total, organization_info
        ) 
        VALUES (
            '$org_name', '$org_cap', '$org_total', '$org_info'
    )";

    $cell_table_name = str_replace(' ', '', $org_name) . "cell";        
    $create_cell_table_query = "CREATE TABLE $cell_table_name (
        CellNo varchar(255), 
        PersonOne varchar(255),
        PersonTwo varchar(255),
        PersonThree varchar(255)
    )";

    $result = mysqli_query($connection, $create_organization_query) or die(mysqli_error($connection));
    $result2 = mysqli_query($connection, $create_cell_table_query) or die(mysqli_error($connection));

    $_SESSION["org"] = $org_name;
    mysqli_close($connection);
    header("Location: cell.php");
}

?>
                   