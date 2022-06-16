<?php

header("Access-Control-Allow-Origin: http://localhost/Auth/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/order.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$order = new order($db);

$data = json_decode(file_get_contents("php://input"));



if($order->orderDetails($data)){

    // http_response_code(200);
    echo json_encode(array(
        "message" => "All rows of Order Details are inserted.",

    ));
}
else{

    // http_response_code(400);
    echo json_encode(array("message" => "Sorry! Error while inserting rows of order details"));
}
?>