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
  include_once '../../models/admin.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $admin = new admin($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  

  $admin->fullname = $data->fullname;
  $admin->email = $data->email;
  $admin->password = $data->password;
 
  

  // Create admin
  if($admin->create()) {
    echo json_encode(
      array('message' => 'admin Created','response'=>true)
    );
  } else {
    echo json_encode(
      array('message' => 'admin Not Created' , 'response'=>false)
    );
  }
