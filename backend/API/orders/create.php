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
  include_once '../../models/order.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $order = new order($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  

  $order->name = $data->name;
  $order->price = $data->price;
  $order->title = $data->title;
  $order->gender = $data->gender;
  $order->type = $data->type;
  $order->image = $data->image;
  $order->fullname = $data->fullname;
  $order->phone = $data->phone;
  $order->email = $data->email;
  $order->city = $data->city;
  $order->adresse = $data->adresse;
  $order->postale = $data->postale;
  

  // Create order
  if($order->create()) {
    echo json_encode(
      array('message' => 'order Created','response'=>true)
    );
  } else {
    echo json_encode(
      array('message' => 'order Not Created' , 'response'=>false)
    );
  }
