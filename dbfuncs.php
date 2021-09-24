
<?php

include "connectdb.php";

function get_cause_total($name) {
    $conn = connectdb();
    $qry_str = "SELECT organization_total FROM organization WHERE organization_name='$name'";
    $res = mysqli_query($conn, $qry_str);
    return $res->fetch_row()[0];
}

function get_cause_expm($name) {
    $conn = connectdb();
    $qry_str = "SELECT expm FROM organization WHERE organization_name='$name'";
    $res = mysqli_query($conn, $qry_str);
    return $res->fetch_row()[0];
}


function get_cause_totalm($name) {
    $conn = connectdb();
    $qry_str = "SELECT totalm FROM organization WHERE organization_name='$name'";
    $res = mysqli_query($conn, $qry_str);
    return $res->fetch_row()[0];
}

function get_cause_info($name) {
    $conn = connectdb();
    $qry_str = "SELECT organization_info FROM organization WHERE organization_name='$name'";
    $res = mysqli_query($conn, $qry_str);
    return $res->fetch_row()[0];
}


?>