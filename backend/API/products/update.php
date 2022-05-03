<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/product.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $product = new product($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $product->id = $data->id;
  $product->name = $data->name;
  $product->price = $data->price;
  $product->title = $data->title;
  $product->gender = $data->gender;
  $product->type = $data->type;
  $product->image = $data->image;

  // Update post
  if($product->update()) {
    echo json_encode(
      array('message' => 'product Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'product not updated')
    );
  }
