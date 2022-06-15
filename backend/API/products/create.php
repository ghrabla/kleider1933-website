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
  include_once '../../models/product.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $product = new product($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  

  $product->name = $data->name;
  $product->price = $data->price;
  $product->title = $data->title;
  $product->gender = $data->gender;
  $product->type = $data->type;
  $product->image = $data->image;
  $product->quantity = $data->quantity;
  

  

  // Create product
  if($product->create()) {
    echo json_encode(
      array('message' => 'product Created','response'=>true)
    );
  } else {
    echo json_encode(
      array('message' => 'product Not Created' , 'response'=>false)
    );
  }
