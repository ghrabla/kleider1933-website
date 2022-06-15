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

  // Instantiate product object
  $product = new product($db);

  // Get raw posted data
  // $data = json_decode(file_get_contents("php://input"));
  // // echo $data->reff;
  // $product->gender = $data->gender;

  // product read query
  $result = $product->read_kid();
  
  
  // Get row count
  $num = $result->rowCount();

  // Check if any product
  if($num > 0) {
        // Cat array
        $product_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $product_item = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'title' => $title,
            'gender' => $gender,
            'type' => $type,
            'image' => $image,
            'quantity' => $quantity

            // 'name' => $name
          );

          // Push to "data"
          array_push($product_arr, $product_item);
        }

        // Turn to JSON & output
        echo json_encode($product_arr);

  } else {
        // No product
        echo json_encode(
          array('message' => 'No product Found')
        );
  }
