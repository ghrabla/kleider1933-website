<?php

// Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: applecation/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

include_once '../../config/Database.php';
include_once '../../models/admin.php';

// instansiation database

$database = new Database();
$db = $database->connect();

// instansiation de login
$login = new admin($db);

$data = json_decode(file_get_contents("php://input"));
$login->email = $data->email;
$login->password = $data->password;
$login->fullname = $data->fullname;

$result = $login->login();

$num = $result->rowCount();

if ($num>0) {

    $login_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

    $login_item = array(
        // "response" => true,
        'id' => $id,
        'email' => $email,
        'password' => $password,
        'fullname' => $fullname,
      );
      
      array_push($login_arr, $login_item);
    }
    
      // Make JSON
      echo json_encode($login_arr);
    //   echo json_encode(
    //     array("response" => true)
    // );
} else {
    echo json_encode(
        array("id" => false)
    );
}