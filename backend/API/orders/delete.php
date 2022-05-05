<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
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
  $order->id = $_GET['id'];
  // $order->id = $data->id;


  // Delete post
  if($order->delete()) {
    echo json_encode(
      array('message' => 'order deleted'
      )
    );
  } else {
    echo json_encode(
      array('message' => 'order not deleted')
    );
  }
