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
  include_once '../../models/user.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $user = new user($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  

  $user->fullname = $data->fullname;
  $user->email = $data->email;
  $user->password = $data->password;
 
  

  // Create user
  if($user->create()) {
    echo json_encode(
      array('message' => 'user Created','response'=>true)
    );
  } else {
    echo json_encode(
      array('message' => 'user Not Created' , 'response'=>false)
    );
  }
