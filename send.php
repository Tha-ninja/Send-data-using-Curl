<?php

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

    //SELECT DATA
    $sql = "SELECT * FROM tablename";
        $query = $db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
                    
//SEND THAT DATA
$url = 'http://example.com/api/';
 
//Initiate cURL.
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
$result = curl_exec($ch);




?>
