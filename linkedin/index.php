<?php 

// request url
// $insertUrl = "https://www.zohoapis.in/crm/v2/Leads";
// $inputJSON = file_get_contents('php://input');

// $jsonArr = json_decode($inputJSON,true);


//api

$api_url="http://www.linkedin.com/countserv/count/share?url=http://stylehatch.co&format=json

";
  
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
// curl_setopt($ch,CURLOPT_POST,1);

// curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
 
$body = curl_exec($ch);

if($body==FALSE){
    echo "curl error".curl_error($ch);
}

curl_close($ch);

$result= json_decode($body,true);

echo '<pre>';

print_r($result);

die();

 
?>