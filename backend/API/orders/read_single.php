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
  // Instantiate blog order object
  $order = new order($db);

  // Get ID
  $order->id = isset($_GET['id']) ? $_GET['id'] : die();

  

  // Get post
  $order->read_single();

  // Create array
  $order_arr = array(
    'id' => $order->id,
    'name' => $order->name,
    'price' => $order->price,
    'title' => $order->title,
    'gender' => $order->gender,
    'type' => $order->type,
    'image' => $order->image,
    'fullname' => $order->fullname,
    'phone' => $order->phone,
    'email' => $order->email,
    'city' => $order->city,
    'adresse' => $order->adresse,
    'postale' => $order->postale
  );


  
  // Make JSON
  print_r(json_encode($order_arr));
