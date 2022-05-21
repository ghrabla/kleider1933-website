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
  include_once '../../models/shopcart.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate shopcart object
  $shopcart = new shopcart($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  // echo $data->reff;
  $shopcart->userId = $_GET['userId'] ;

  // shopcart read query
  $result = $shopcart->read();
  
  
  // Get row count
  $num = $result->rowCount();

  // Check if any shopcart
  if($num > 0) {
        // Cat array
        $shopcart_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $shopcart_item = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'title' => $title,
            'gender' => $gender,
            'type' => $type,
            'image' => $image,
            'userId' => $userId

            // 'name' => $name
          );

          // Push to "data"
          array_push($shopcart_arr, $shopcart_item);
        }

        // Turn to JSON & output
        echo json_encode($shopcart_arr);

  } else {
        // No shopcart
        echo json_encode(
          array('message' => 'false')
        );
  }
