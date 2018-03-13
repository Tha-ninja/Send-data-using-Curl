<?php
//Host this Online
{
    //Database Connection String
    $host= "Hostname";
    $db= "Database";
    $user= "username";
    $pass= "password";
    
try{
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pass );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

}


//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$arr      = json_decode($content);

//If json_decode failed, the JSON is invalid.
if(!is_array($arr)){
    throw new Exception('Received content contained invalid JSON!');
}
if(is_array($arr)){
	

//Process the JSON.

		
		//print_r($arr);

		foreach($arr as $value){
//Insert Statement
			
		}
	}


?>