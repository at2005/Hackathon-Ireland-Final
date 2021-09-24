<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include "../dbfuncs.php";
// we are returning JSON
header("Content-Type: application/json");
// start session
session_start();
// check if POST
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if valid
    if(isset($_POST["cause_name"])) {
        // extract cause name and store in SESSION variable
        $_SESSION["org"] = $_POST["cause_name"];
        // go to dashboard
        header("Location: cell_dashboard.html");
    }
}

// check if GET
elseif($_SERVER["REQUEST_METHOD"] == "GET") {
    // check if valid
    if(isset($_GET["type"])) {
        // if we are to return financial content
        if($_GET["type"] == "finance") {
            $total = get_cause_total($_SESSION["org"]);
            $totalm = get_cause_totalm($_SESSION["org"]);
            $expm =get_cause_expm($_SESSION["org"]);

            if($totalm == NULL) {
                $totalm = 0;
            }

            if($expm == NULL) {
                $expm = 0;
            }

            // string holding the HTML for finances that we wish to return
            $finstr = "
            <h1>Finances</h1>
            <h4>Total In Funds: €". $total ."</h4>
            <h4>Amount Donated This Month: €". $totalm ."</h4>
            <h4>Total Expenditure This Month: €" . $expm ."</h4>
            
            ";
            // send string over
            echo json_encode(["content" => $finstr]);
        }

        elseif($_GET["type"] == "events") {
            $file = fopen($_SESSION["org"] . "events.html", "r");
            fclose($file);
            $events = file_get_contents($_SESSION["org"] . "events.html");
            
            $evstr = "
            <h1>". $_SESSION['org']." Events</h1>
            <div>".
             $events   
            ."</div>
            ";

            echo json_encode(["content" => $evstr]);
        }

        elseif($_GET["type"] == "dashboard") {
            $info = get_cause_info($_SESSION["org"]);
            $homestr = "
            <h1>" . $_SESSION['org'] ."</h1>
                <p>" .
                 $info   

                ."</p>
            
            ";

            echo json_encode(["content" => $homestr]);
        }


        elseif($_GET["type"] == "branches") {
            $branch_content = file_get_contents($_SESSION["org"] . "branches.html");
            $branchstr = "
            <h1>Branches</h1>
            $branch_content
            
            ";

            echo json_encode(["content" => $branchstr]);
        }
    }


    else if(isset($_GET["speech"])) {
        if($_GET["speech"] == "finances") {
            $total = get_cause_total($_SESSION["org"]);
            $totalm = get_cause_totalm($_SESSION["org"]);
            $expm =get_cause_expm($_SESSION["org"]);

            if($totalm == NULL) {
                $totalm = 0;
            }

            if($expm == NULL) {
                $expm = 0;
            }

            // string holding the speech text for finances that we wish to return
            $finstr = "
            Here is Financial information:
            The total funds are ". $total ."euro.
            The amount donated this month is ". $totalm ."euro.
            The total amount of expenditure this month is " . $expm ."euro.
            
            ";
            // send string over
            echo json_encode(["content" => $finstr]);
        }

        elseif($_GET["speech"] == "events") {
            $events = file_get_contents($_SESSION["org"] . "events.html");
            
            $evstr = "
            <h1>". $_SESSION['org']." Events</h1>
            <div>".
             $events   
            ."</div>
            ";

            echo json_encode(["content" => $evstr]);
        }

        elseif($_GET["speech"] == "overview") {
            $info = get_cause_info($_SESSION["org"]);
            $homestr = "The information for ". $_SESSION["org"] . " is ". $info;
            echo json_encode(["content" => $homestr]);
        }


        elseif($_GET["type"] == "branches") {
            $branchstr = "
           There is
            ";

            echo json_encode(["content" => $branchstr]);
        }
    }
    

} 

?>