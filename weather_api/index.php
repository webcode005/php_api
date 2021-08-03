<?php 


	 $api_key="06e33a8789d7eef1b0bef12c3bb7a9d0";

	 	 $city=$_GET['city'];

	 $api_url="http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$api_key;

	 $response= file_get_contents($api_url);

	 $response=json_decode($response,true);

	 // echo"<pre>";
	 // print_r($response);

	 $temperature= $response['main']['temp'];

	  $temp_in_c=round($temperature - 273.15);

	 $current_weather=$response['weather'][0]['main'];

	 $current_weather_description=$response['weather'][0]['description'];

	 $current_weather_icon=$response['weather'][0]['icon'];




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Location Api</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style type="text/css">
		.result .row{border: 2px solid black;}
		h3,p { margin: 15px 0;}
		.error{color: red;font-weight: bold;}
	</style>
</head>
<body>


<div class="container-fluid">
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
      
      <h2 class="text-center"><img src="img/weather.png" width="150px"></h2>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <p></p>  
<form action="index.php" method="get" role="search" name="searchForm">
<div class="input-group lrcInputs">
	
	<input class="form-control" id="lookFor" name="city"  type="text" placeholder="Enter City" required="" value="<?php 

if(isset($_GET['city'])){ echo $city;}?>"> 
	<div class="input-group-btn">
		<button name="submit" class="btn btn-success lrcSearchButton" type="submit"><i class="glyphicon glyphicon-search" ></i></button>
	</div>
</div>
</form>
<p></p>
<?php if(isset($response)): if($response['main']['temp']) {?>

	   <h2 class="text-center"><img src="http://openweathermap.org/img/wn/<?= $current_weather_icon;?>@2x.png" width="150px"></h2>
	      <h2 class="text-center">Current Temprature In <?= $city;?> Is <?= $temp_in_c;?></h2>
<div class="col-md-12 result">
     

<div class="row">
		<div class="col-md-4"><h3>Country</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response['sys']['country'];?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>City</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response['name'];?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Weather Description</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response['weather'][0]['description'];?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Lattitude</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response['coord']['lat'];?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Longitude</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response['coord']['lon'];?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Sunrise</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?=  gmdate("H:i:s a", $response['sys']['sunrise']);?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Sunset</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?=  gmdate("H:i:s a", $response['sys']['sunset']);?></p></div>
</div>


</div>

<?php } else {echo "<p class='text-center error'> Please Enter Correct City</p>";} endif;?>

</div>
  </div>
 
</div>
</div>

</body>
</html>