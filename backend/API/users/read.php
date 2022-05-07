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

  // Instantiate user object
  $user = new user($db);

  // Get raw posted data
  // $data = json_decode(file_get_contents("php://input"));
  // // echo $data->reff;
  // $user->gender = $data->gender;

  // user read query
  $result = $user->read();
  
  
  // Get row count
  $num = $result->rowCount();

  // Check if any user
  if($num > 0) {
        // Cat array
        $user_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $user_item = array(
            'id' => $id,
            'fullname' => $fullname,
            'email' => $email,
            'password' => $password,
            

            // 'name' => $name
          );

          // Push to "data"
          array_push($user_arr, $user_item);
        }

        // Turn to JSON & output
        echo json_encode($user_arr);

  } else {
        // No user
        echo json_encode(
          array('message' => 'No user Found')
        );
  }
