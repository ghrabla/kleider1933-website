<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/order.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $order = new order($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $order->id = $data->id;
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

  // Update post
  if($order->update()) {
    echo json_encode(
      array('message' => 'order Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'order not updated')
    );
  }
