<?php 
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "todo_list_api";
	
	
	$conn = mysqli_connect($host, $user, $password, $database);
	$response=array();
	if($conn) {

			$sql = "SELECT * FROM todo_list";
	        $query_result = mysqli_query($conn, $sql);
	        if($query_result){
	        	header("content-Type: JSON");
	        	$i=0;
	    	while($row=mysqli_fetch_assoc($query_result)){
	    		$response[$i]['Id']=$row['Id'];
	    		$response[$i]['3_Important_Things']=$row['3_Important_Things'];
	    		$response[$i]['2_Exercise']=$row['2_Exercise'];
	    		$response[$i]['	Foods_Dieting']=$row['Foods_Dieting'];
	    		$i++;

	    	}
	    	echo json_encode($response,JSON_PRETTY_PRINT);

	        }

	}
	else{
		echo"Connection Failed";
	}


?>
