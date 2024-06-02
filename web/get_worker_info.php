<?php
/*******

** CPanel ******
***/

/* Following code will match admin login credentials */

//user temp array
$response = array();

// include db connect class
// require_once _DIR_ . './db_connect.php';
require_once __DIR__ . '/db_connect.php';

// connecting to db


// $data = json_decode(file_get_contents("php://input"));

// $get_email = ($data->email);

// $result = mysqli_query($conn,"SELECT * FROM login where email='$get_email' ");
$data = json_decode(file_get_contents("php://input"));

if (isset($data->email)) {
    $get_email = $data->email;

    // Proceed with your query
    $result = mysqli_query($conn, "SELECT * FROM login WHERE email='$get_email' ");
	if(mysqli_num_rows($result))
{
	$response["details"] = array();	

	while($Alldetails = mysqli_fetch_array($result))
	{
		// temp user array
		$details = array();
		$details = $Alldetails;
		array_push($response["details"],$details);
	}	
	$response["success"] = 1;
	echo json_encode($response);

}
else
{
	$response["success"] = 0;	
	echo json_encode($response);
}

    // Rest of your code...
} else {
    // Handle the case where 'email' property is not present in the JSON
    // For example, return an error response
    echo json_encode(array("success" => 0, "message" => "Email not provided"));
}



	

?>