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
  // Instantiate blog product object
  $product = new product($db);

  // Get ID
  $product->id = isset($_GET['id']) ? $_GET['id'] : die();

  

  // Get post
  $product->read_single();

  // Create array
  $product_arr = array(
    'id' => $product->id,
    'name' => $product->name,
    'price' => $product->price,
    'title' => $product->title,
    'gender' => $product->gender,
    'type' => $product->type,
    'image' => $product->image
  );

  // Make JSON
  print_r(json_encode($product_arr));
