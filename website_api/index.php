<?php 
include'connection.php';

 //$url=$_GET['url'];

$url="classroom";
  $prod_id='38';

$data=array(
  'type'=>$url,
  'prod_id'=>$prod_id,
  's_location'=>'Kuwait');
 
if($url=='classroom')
{
    $api_url="https://www.mindcypress.com/mindcypress_api/classroom"; 
}
elseif($url=='lvc')
{
    $api_url="https://www.mindcypress.com/mindcypress_api/lvc"; 
}
else
{
     $api_url="https://www.mindcypress.com/mindcypress_api/lvc"; 
}

//api

  
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
curl_setopt($ch,CURLOPT_POST,1);

curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
 
$body = curl_exec($ch);

if($body==FALSE){
    echo "curl error".curl_error($ch);
}

curl_close($ch);

$result= json_decode($body,true);

// echo '<pre>';

// print_r($result);

// die();

 
?>
<style>
    .bg-image {
        background-image: url(<?= SITE_PATH;?>assets/images/icons/Untitled-1.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        padding: 25px 0px;
    }


    input {
        margin: 25px;
        width: 100%;
        display: block;
        border: none;
        padding: 14px 0 10px 0;
        border-bottom: solid 1px #184266;
        -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
        transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
        background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #184266 4%);
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #184266 4%);
        background-position: -100% 0;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        color: #000;
    }

    input:focus,
    input:valid {
        box-shadow: none;
        outline: none;
        background-position: 0 0;
    }

    input::-webkit-input-placeholder {
        font-family: 'roboto', sans-serif;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    input:focus::-webkit-input-placeholder,
    input:valid::-webkit-input-placeholder {
        color: #184266;
        font-size: 11px;
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
        visibility: visible !important;
    }

    .empty_space{height:10px;}

</style>
<!-- Being Page Title -->
  <?php 
if($result['status'])
{


        if($result['status']==true)
        {
            
            foreach($result['data'] as $list) {
                
                if(!empty($list['s_date']))  { $sdate=explode(",",$list['s_date']); }
               
                if(!empty($list['next_date']))  { $ndate=explode(",",$list['next_date']); }
            }
            
            ?> 
<div class="page-banner-section section section-padding bg-image">
    <div class="overlay">
        
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-12">

                    <div class="page-title clearfix" style="background: transparent;margin: 0px;padding: 0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h6><a href="<?= SITE_PATH;?>">Home</a></h6>
                                <h6><span class="page-active"><?= $url;?></span></h6>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h1 class="certh1"> <?php echo $list['title']; ?></h1>

                        <div class="certp">

                            <div class="row">
                                
                                <?php foreach($result['data'] as $list) { ?>

                                <div class="col-sm-6 col-xs-12">

                                    <div class="row">
                                        <div class="col-sm-1  col-xs-1">
                                            <li></li>

                                        </div>
                                        <div class="col-sm-10  col-xs-10" style="padding-left: 0;">
                                            <p style="margin-bottom: 5px;"> <?= $list['pointer'];?></p>
                                        </div>
                                    </div>



                                </div>
                                
                                <?php } ?>

                            </div>

                        </div>

                    </div>

                    <div class="empty_space"></div>
                    <div class="row">
                        <div class="col-md-6 col-xs-7">


                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="reviews" style="color: black;">695 <span data-toggle="modal" data-target="#Review987">Reviews <i class="fa fa-edit"></i></span></span>
                        </div>
                        <div class="col-md-6 col-xs-5">

                            <i class="fa fa-users user_learner" style="font-size: 20px;color: black;"></i> <span classs="usern" style="color: black;"> &nbsp;1258 Learners</span>

                        </div>
                    </div>
                    <div class="empty_space"></div>


                </div>

                <div class="col-sm-4 col-xs-12">
                    <div class="about-me-video-wrapper">
                        <!-- About Me Video Start -->

                        <div class="video" style="/*border: 5px solid black;*/margin-bottom: 15px;text-align:center;">

                            <iframe width="290px" height="215" src="<?= $list['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="section section-padding1">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-xs-2 calendar-img"><img class="img-responsive" src="<?= SITE_PATH;?>assets/images/calendar.png"></div>
            <div class="col-lg-5 col-md-7 col-xs-5 timer">
                <p style="font-weight: 500;">Month: <span>
                    <?php 
                        if(!empty($list['next_month'])){ echo $list['s_month'] , $list['next_month']; } else { echo $list['s_month']; } ?>
                    </span><?php //echo $event['days'];?> </p>
                <p style="font-size: 15px;font-style: normal;">Time: <span><?= $list['c_time'];?></span></p>
                <p style="font-style: initial;font-family: revert;font-size: 16px;">No. Of Days:  <?php 
                        if(!empty($list['next_days'])){ echo $list['s_days']+$list['next_days']; } else { echo $list['s_days']; } ?>
                </p>
                <p style="font-style: initial;font-family: revert;font-size: 16px;">Amount: $ 
                <?php 
                        if(!empty($url=='Classroom')){ echo $list['p_price']-200; } elseif(!empty($url=='lvc')){ echo $list['p_price']-150; } else { echo $list['p_price']-100; } ?>
               </p>
            </div>



            <div class="col-lg-6 col-md-4 col-xs-5">

                <div class="row">
                    <div class="col-md-4 div_hide" style="display: block;"></div>
                    
                    <?php 
                        $i='0';
                        foreach($sdate as $d=>$v)
                        {
                            ?>
                               <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                    <div class="countdate">
                                        <span><?= $sdate[$i];?> </span>
                                    </div>
                                   
                                </div> 
                            <?php
                             
                         $i++;   
                        }
                    ?>
                    
                    
                    <?php 
                    
                    if(!empty($ndate))
                    {
                        $ik='0';
                        foreach($ndate as $nd=>$nv)
                        {
                            
                            ?>
                               <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                    <div class="countdate">
                                        <span><?= $ndate[$ik];?> </span>
                                    </div>
                                </div> 
                            <?php
                             
                         $ik++;   
                        }
                    }    
                    ?>
                      
                    
                </div>
                <div class="row" style="margin-top: 13px;">
                            <div class="col-md-4 div_hide"></div>
                            <div class="col-sm-8">
                                <p style="color:white;">Place: <span><?= $list['s_address'].' '.$list['s_location'];?> </span></p>
                            </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php
        }

        else

        {
            echo $result['data'];
        }


}
else
{
    echo "API Not Found!";
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Registration Form</h2>
        </div>
        <form method="post" action="<?= SITE_PATH;?>resgister" autocomplete="off">
            <div class="row">
                <input name="type" type="hidden" value="<?= $url;?>">
                <div class="col-md-3 col-xs-12">
        
                    <input placeholder="First Name*" name="fname" type="text" required>
                </div>
                <div class="col-md-3 col-xs-12">

                    <input placeholder="Last Name*" name="lname" type="text" required>
                </div>
                <div class="col-md-3 col-xs-12">
                    <input placeholder="Email ID*" name="email" type="email" required>
                </div>
                <div class="col-md-3 col-xs-12">

                    <input placeholder="Mobile No*" type="text" required>
                </div>
                <div class="col-md-4 col-xs-12">
                    <input placeholder="Company Name" value="" name="cname" type="text">
                </div>
                <div class="col-md-4 col-xs-12">
                    <input placeholder="City*" type="text" required>
                </div>
                <div class="col-md-4 col-xs-12">
                    <input placeholder="Country*" type="text" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 text-center">
                    <button class="btn primary-button" style="margin-bottom: 27px;">Enroll Now</button>
                </div>
            </div>
        </form>
    </div>
</div>


