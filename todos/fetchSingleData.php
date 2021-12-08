<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');




$data =json_decode(file_get_contents("php://input"), true);

$id=$data['L_id'];

include 'database.php';

$sql="SELECT * FROM todos WHERE id={$L_id}";
$result=mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result)>0){
	$output=mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output);

}
else{
	$ErrorMessage=array("message" => "No Record Found.", "status"=>false);

	echo json_encode($ErrorMessage);


}


?>