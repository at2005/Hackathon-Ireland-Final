
<?php
require "vendor/autoload.php";
session_start();
header("Content-Type: application/json");
\Stripe\Stripe::setApiKey("sk_test_51IvoIoK5LGSIM6cwidHBabi7NasxGIgpX7N5F3SsVDaAkAPChvEsY1VhjskEe90LdQgSUprAX0DdouxHYczr55wK00SLtpzhQy");
$int_val = "00000";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $int_val = $_POST["amount"];
} 



$stripe_checkout_session = \Stripe\Checkout\Session::create([
    "payment_method_types" => ["card"],
     "mode" => "payment",
    "success_url" => "http://localhost/hackathon/home.php",
    "cancel_url" =>  "http://localhost/hackathon/home.php",
    "customer_email" => $_SESSION["username"],
    "submit_type" => "donate",
  


    "line_items" => [
            [
                "price_data" => [
                 "currency" => "eur", "unit_amount" => ($int_val*100), "product_data" => 
                    ["name" => "Climate Change"]
                ],
        
                "quantity" => 1,
            ]

    ]
    
    
]


);

echo json_encode(["id" => $stripe_checkout_session->id, "val" => $_SESSION["username"]]);


?>

