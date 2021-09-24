<?php
if(isset($_POST['submit'])){
    $mobile=$_POST['mobile'];
    $url="http://apilayer.net/api/validate?access_key=0f15ea3513714201543b6bb90356219d&number=$mobile";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
    //print_r($result);
    if($result['valid']==1){
        echo "Country Name: ".$result['country_name'].'<br/>';
        echo "Location: ".$result['location'].'<br/>';
        echo "Carrier: ".$result['carrier'].'<br/>';
    }else{
        echo "No data found";
    }
}
?>
<form method="post">
    <input type="text" name="mobile" placeholder="Enter mobile number with country code" required style="width:300;"/>
    <input type="submit" name="submit">
</form>