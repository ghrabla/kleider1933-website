<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/shopcart.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $shopcart = new shopcart($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $shopcart->id = $_GET['id'];

  // Delete post
  if($shopcart->delete()) {
    echo json_encode(
      array('message' => 'shopcart deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'shopcart not deleted')
    );
  }
