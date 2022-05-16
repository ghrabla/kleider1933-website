<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  }
  if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") return true;

  include_once '../../config/Database.php';
  include_once '../../models/shopcart.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $shopcart = new shopcart($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  

  $shopcart->name = $data->name;
  $shopcart->price = $data->price;
  $shopcart->title = $data->title;
  $shopcart->gender = $data->gender;
  $shopcart->type = $data->type;
  $shopcart->image = $data->image;
  $shopcart->userId = $data->userId;
  

  

  // Create shopcart
  if($shopcart->create()) {
    echo json_encode(
      array('message' => 'shopcart Created','response'=>true)
    );
  } else {
    echo json_encode(
      array('message' => 'shopcart Not Created' , 'response'=>false)
    );
  }
