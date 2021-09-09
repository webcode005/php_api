<?php 

if(isset($_GET['submit']))
{
	 $ip=$_GET['ipaddr'];

	 $response= file_get_contents('http://ip-api.com/json/'.$ip);

	 $response=json_decode($response);

	 //var_dump($response);
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>IP BASED Location Api</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style type="text/css">
		.result .row{
			border: 1.2px solid black;
      border-radius: 5px;
      background: white;
    }
		h3,p { margin: 15px 0;}
		.error{color: red;font-weight: bold;}
	</style>
</head>
<body>


<div class="container-fluid" style="background-image: url('https://beratung.com.au/wp-content/uploads/2020/02/android-11-to-clamp-down-on-background-location-access.jpg');">
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
      
      <h2 class="text-center"><img src="img/address.png" width="50px"></h2>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <p></p>  
<form action="index.php" method="get" role="search" name="searchForm">
<div class="input-group lrcInputs">
	
	<input class="form-control" id="lookFor" name="ipaddr"  type="text" placeholder="Enter IP Address" required="" value="<?php 

if(isset($_GET['ipaddr'])){ echo $ip;}?>"> 
	<div class="input-group-btn">
		<button name="submit" class="btn btn-success lrcSearchButton" type="submit"><i class="glyphicon glyphicon-search" ></i></button>
	</div>
</div>
</form>
<p></p>
<?php if(isset($response)): if($response->status=='success') {?>
<div class="col-md-12 result">
     

<div class="row">
		<div class="col-md-4"><h3>Country</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response->country;?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>City</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response->city;?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Zipcode</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response->zip;?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Lattitude</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response->lat;?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>Longitude</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response->lon;?></p></div>
</div>

<div class="row">
		<div class="col-md-4"><h3>ISP</h3></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p><?= $response->isp;?></p></div>
</div>

<div class="row">
	<div class="col-md-4"><h3>Know Your Location</h3></div>
	<div class="col-md-4"></div>
	<div class="col-md-4"><p><a href="https://www.latlong.net/c/?lat=<?= $response->lat;?>&long=<?= $response->lon;?>" target="blank">Location</a></p></div>
</div>


</div>

<?php } else {echo "<p class='text-center error'> Please Enter Correct IP Address</p>";} endif;?>

</div>
  </div>
 
</div>
</div>

</body>
</html>