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

  // Instantiate order object
  $order = new order($db);

  // Get raw posted data
  // $data = json_decode(file_get_contents("php://input"));
  // // echo $data->reff;
  // $order->gender = $data->gender;

  // order read query
  $result = $order->read();
  
  
  // Get row count
  $num = $result->rowCount();

  // Check if any order
  if($num > 0) {
        // Cat array
        $order_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $order_item = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'title' => $title,
            'gender' => $gender,
            'type' => $type,
            'image' => $image,
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'city' => $city,
            'adresse' => $adresse,
            'postale' => $postale

            // 'name' => $name
          );

          // Push to "data"
          array_push($order_arr, $order_item);
        }

        // Turn to JSON & output
        echo json_encode($order_arr);

  } else {
        // No order
        echo json_encode(
          array('message' => 'No order Found')
        );
  }
