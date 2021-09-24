<?php 
		
                     $url="https://www.mindcypress.com/mindcypress_api/course.php";
                    $ch = curl_init();
                    
                    curl_setopt($ch, CURLOPT_URL, $url);
                    
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                     
                    $body = curl_exec($ch);
                    
                    if($body==FALSE){
                        echo "curl error".curl_error($ch);
                    }
                    
                    curl_close($ch);
                    
                    $result= json_decode($body,true);
    
    			     foreach($result['data'] as $cat_data) {
			    ?>
			    <option value="<?php echo $cat_data['detail_id'];?>"><?php echo $cat_data['title'];?></option>
			    <?php } ?>