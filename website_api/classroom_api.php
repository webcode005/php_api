<?php 
include 'connection.php';

$type=$_POST['type'];
$prod_id=$_POST['prod_id'];
 $location=$_POST['s_location'];

// $sql="SELECT * FROM `tl_price` WHERE `type`='$type' AND `prod_id`='$prod_id'  ORDER BY `id` DESC";

 //$sql="SELECT * FROM `tl_price` WHERE `type`='$type' AND `prod_id`='$prod_id' AND `s_location`='$location' ORDER BY `id` DESC";

$sql="select tl_price.*,tl_product.title,tl_product.video,short_description.product_id,short_description.pointer from tl_price,tl_product,short_description where tl_product.detail_id=tl_price.prod_id  AND short_description.product_id=tl_price.prod_id AND tl_price.prod_id='$prod_id' AND tl_price.s_location='$location' AND tl_price.type='$type'
";

$res= mysqli_query($conn,$sql);

$count=mysqli_num_rows($res);

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');


if($count > 0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $arr[]=$row;
        
    }
    
    echo json_encode(['status'=>true,'data'=>$arr,'found'=>'found']);
}
else
{
    // echo "No Data Found";
     echo json_encode(['status'=>false,'data'=>'No Data Found','found'=>'not found']);
}



?>