<?php

// Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: applecation/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

include_once '../../config/Database.php';
include_once '../../models/shopcart.php';

// instansiation database

$database = new Database();
$db = $database->connect();

// instansiation de check
$check = new shopcart($db);

$data = json_decode(file_get_contents("php://input"));
$check->productId = $data->productId;
$check->userId = $data->userId;

$result = $check->check();

$num = $result->rowCount();

if ($num>0) {

    $check_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

    $check_item = array(
        "answer" => true,
        // 'id' => $id,
        // 'email' => $email,
        // 'password' => $password,
      );
      
      array_push($check_arr, $check_item);
    }
    
      // Make JSON
      echo json_encode($check_arr);
    //   echo json_encode(
    //     array("response" => true)
    // );
} else {
    echo json_encode(
        array("answer" => false)
    );
}