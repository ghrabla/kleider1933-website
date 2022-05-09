<?php

//action.php

$connect = new PDO("mysql:host=localhost; dbname=kleider", "root", "");

$received_data = json_decode(file_get_contents("php://input"));

$data = array();

if($received_data->query != '')
{
	$query = "
	SELECT * FROM products 
	WHERE name LIKE '%".$received_data->query."%' 
	OR gender LIKE '%".$received_data->query."%' 
	OR type LIKE '%".$received_data->query."%' 
	ORDER BY id DESC
	";
}
else
{
	$query = "
	SELECT * FROM products 
	ORDER BY id DESC
	";
}

$statement = $connect->prepare($query);

$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$data[] = $row;
}

echo json_encode($data);

?>