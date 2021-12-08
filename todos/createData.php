<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');



$data =json_decode(file_get_contents("php://input"), true);

$Title=$data['Title']; 

include 'database.php';

$sql="INSERT INTO todos(Title) VALUES ('{$Title}')";


if(mysqli_query($conn, $sql)){

	$SuccessMessage=array("message" => "Record Inserted.", "status"=>true);

	echo json_encode($SuccessMessage);

}
else{

	$ErrorMessage=array("message" => "Record Not Inserted.", "status"=>false);

	echo json_encode($ErrorMessage);


}


?>