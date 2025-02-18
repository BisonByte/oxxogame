<?php
include 'session.php';
include 'db.php';
include 'v.php';?>

<?php

$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);



  $sql = "SELECT * FROM settings";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
 } else {
   header("Location: /");
 }
 
   $sql_L = "SELECT * FROM license";
   $result_L = mysqli_query($link, $sql_L);
   if (mysqli_num_rows($result_L) > 0) {
   $row_L = mysqli_fetch_assoc($result_L);
   
   }


 ?>

<?php include 'inc/head.php';?>
<style>
.bulder_tab_wrapper ul li .nav-link{
    padding-top: 10px;
    padding-bottom: 10px;
}

.white_card .white_card_header{
    padding: 7px 4px;
}

.white_card .white_card_body{
        padding: 5px 15px 25px;
}
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 20px;
      right: -10px;
  padding: 12px 25px!important;
  top: 5px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  top: 2px;
  left: 2px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

#container {
  height: 100%;
  width: 100%;
  display: flex;
}

#container1 {
  height: 100%;
  width: 100%;
  display: flex;
  text-align: right;
}

.slider.round:before {
  border-radius: 50%;
}

.switch::after{
    display:none;
}

.sclayout{
    
display: flex;
    background: #faebd76e;
    padding: 12px 6px;
    align-items: center;
    justify-content: space-between;
    border-radius: 10px;
    padding-left: 18px;

}
</style>
<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<section class="main_content dashboard_part large_header_bg">

<?php include 'inc/profile.php';?>

<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Settings & Configuration</h3>
</div>
</div>
</div>
</div>

<div class="row ">
<div class="col-12">
<div class="white_card mb_30 ">
<div class="white_card_header">
<div class="bulder_tab_wrapper">
<ul class="nav" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="Themes-tab" data-toggle="tab" href="#Themes" role="tab" aria-controls="Themes" aria-selected="true">User Reward Setting</a>
</li>
<!--<li class="nav-item">-->
<!--<a class="nav-link" id="page-tab" data-toggle="tab" href="#page" role="tab" aria-controls="profile" aria-selected="false">Offerwalls</a>-->
<!--</li>-->

<li class="nav-item">
<a class="nav-link" id="Header-tab" data-toggle="tab" href="#sc" role="tab" aria-controls="Header" aria-selected="false">App Security</a>
</li>

<li class="nav-item">
<a class="nav-link" id="Themes-tab" data-toggle="tab" href="#ads" role="tab" aria-controls="Themes" aria-selected="false">Ads Settings</a>
</li>

</ul>
</div>
</div>
<div class="white_card_body">
<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="Themes" role="tabpanel" aria-labelledby="Themes-tab">
<div class="builder_select">

<form action="admin_api.php" method="post">

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
          <br>
        <label class="form-control-label" for="input-email">Daily Bonus Coins</label>
        <input style="background: #f5f6ff;" type="number" name="d_b" class="form-control" placeholder="Enter Coins" value="<?php echo $row['daily_b_points']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Daily Spin Limit</label>
        <input style="background: #f5f6ff;" type="number" name="spin" class="form-control" placeholder="Spin Limit" value="<?php echo $row['daily_spins']; ?>">
      </div>
    </div>
  </div>
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Scratch points e.g (10-20) :-</label>
        <input style="background: #f5f6ff;" type="text" name="scratch_count_beetween" class="form-control" placeholder="Scratch points" value="<?php echo $row['scratch_count_beetween']; ?>">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Daily Scratch Limit</label>
        <input style="background: #f5f6ff;" type="number" name="scratch_limit" class="form-control" placeholder="Scratch Limit" value="<?php echo $row['scratch_limit']; ?>">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Daily Video watch Limit</label>
        <input style="background: #f5f6ff;" type="number" name="daily_video_limit" class="form-control" placeholder="Spin Limit" value="<?php echo $row['daily_video_limit']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Invited User Bonus</label>
        <input style="background: #f5f6ff;" type="number" name="Invited" class="form-control" placeholder="Invited User Bonus" value="<?php echo $row['invited_user_bonus']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Referral Bonus</label>
        <input style="background: #f5f6ff;" type="number" name="Referral" class="form-control" placeholder="Referral Bonus" value="<?php echo $row['referral_bonus']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Referral Shere Message</label>
        <textarea style="background: #f5f6ff; border: none; color: #8890b5; font-weight: 700; font-size: 14px;" class="form-control"  type="text" name="Shere" rows="4" cols="50"><?php echo $row['refer_msg']; ?></textarea>
          <input type="hidden" name="settings_user">
      </div>
    </div>
  </div>
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">OneSignal App ID</label>
        <input style="background: #f5f6ff;" type="text" name="os_app_id" class="form-control" placeholder="OneSignal App ID" value="<?php echo $row['os_app_id']; ?>">
      </div>
    </div>
  </div>
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">OneSignal Rest API</label>
        <input style="background: #f5f6ff;" type="text" name="os_rest_api" class="form-control" placeholder="OneSignal Rest API" value="<?php echo $row['os_rest_api']; ?>">
      </div>
    </div>
  </div>
  
  
  <div class="sclayout">
            
        <div class="one">
        <div>Install App Offers</div>
        <div style="font-size: 11px;">ON for Show & OFF for Not Show.</div>
        </div>
            
            <div class="one">

            <label class="switch" for="is_apps_enabled">
              <input type="checkbox" name="is_apps_enabled" id="is_apps_enabled" onclick="appFunction()" value="<?php echo $row['is_apps_enabled']; ?>">
             
              <span class="slider round"></span>
            </label>
            
            <input type="hidden" name="app_check">
            
            </div>
             
            </div>

<br>


 <button type="submit" class="btn btn-primary">Save</button>
</form>


<script>
    
    
var checkBox = document.getElementById("is_apps_enabled");
if(checkBox.value=="true")
  {
      checkBox.checked = true;
  }else
  {
      checkBox.checked = false;
  }
  
function appFunction() {
  var checkBox = document.getElementById("is_apps_enabled");
  var text = document.getElementById("text");
  
  if (checkBox.checked == true){
    document.getElementById("is_apps_enabled").value = "true";
  } else {
     document.getElementById("is_apps_enabled").value = "false";
  }
}
    
</script>


</div>
</div>

<div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
<div class="builder_select">

  <form action="admin_api.php" method="post">
      
      <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
            <br>
          <label class="form-control-label" for="input-email">OfferToro Publisher ID</label>
          <input style="background: #f5f6ff;" type="text" name="ot_pub" class="form-control" placeholder="OfferToro App ID" value="<?php echo $row['OT_PUB']; ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-email">OfferToro App ID</label>
          <input style="background: #f5f6ff;" type="text" name="ot_app" class="form-control" placeholder="OfferToro App ID" value="<?php echo $row['OT_APP_ID']; ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">OfferToro Key</label>
          <input style="background: #f5f6ff;" type="text" name="ot_k" class="form-control" placeholder="OfferToro Key" value="<?php echo $row['OT_KEY']; ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">OfferToro Postback url</label>
          <input style="background: #f5f6ff;" type="text" name="ot_k" class="form-control" placeholder="OfferToro Key" value="<?php echo $base_url ?>postback/ot.php" disabled>
        </div>
      </div>
    </div>


    <hr>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">AdGetMedia Wall Code</label>
          <input style="background: #f5f6ff;" type="text" name="adg" class="form-control" placeholder="AdGetMedia Wall Code" value="<?php echo $row['AG_WALLCODE']; ?>">
            <input type="hidden" name="settings_wall">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">AdGetMedia Postback url</label>
          <input style="background: #f5f6ff;" type="text" name="ot_k" class="form-control" placeholder="OfferToro Key" value="<?php echo $base_url; ?>postback/adg.php?conversion_id={conversion_id}&user_id={s1}&point_value={points}&usd_value={payout}&offer_title={vc_title}" disabled>
        </div>
      </div>
    </div>


    <hr>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">AyetStudio Postback url</label>
          <input style="background: #f5f6ff;" type="text" name="adg" class="form-control" placeholder="AdGetMedia Wall Code" value="<?php echo $base_url; ?>postback/ayet.php?network=ayetstudios&amount={currency_amount}&uid={uid}&device={advertising_id}&payout_usd={payout_usd}" disabled>
            <input type="hidden" name="settings_wall">
        </div>
      </div>
    </div>

  



   <button type="submit" class="btn btn-primary">Save</button>
  </form>

</div>
</div>

<!--lic-->
<div class="tab-pane fade" id="lic" role="tabpanel" aria-labelledby="Header-tab">
<div class="builder_select">
<br>
    <b><h4>License information:</h4></b>
<br>
    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label">Package Name: <b><?php echo $row_L['package_name'];?></b></label>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-email">License Key:</label>
          <input style="background: #f5f6ff;" type="text" name="afbads" class="form-control" value="<?php echo $row_L['license'];?>" disabled>
          <br>
          <label class="form-control-label" for="input-email" style="color:black;">Status:-</label>&nbsp;<label class="form-control-label" for="input-email" style="color:green;">Activated</label>
        </div>
      </div>
    </div>


</div>
</div>


<!--security-->
<div class="tab-pane fade" id="sc" role="tabpanel" aria-labelledby="Header-tab">
<div class="builder_select">
<br>
    <b><h4>Fraud Prevention:</h4></b>
<br>
    <div class="row">
  
  <div class="col-lg-12">
  
<form action="admin_api.php" method="post">   
        <div class="sclayout">
            
        <div class="one">
        <div>Block VPN access</div>
        <div style="font-size: 11px;">Don't let the user open offers by using VPN.</div>
        </div>
            
            <div class="one">

            <label class="switch" for="myCheck">
              <input type="checkbox" name="vpn" id="myCheck" onclick="myFunction()" value="<?php echo $row['vpn']; ?>">
             
              <span class="slider round"></span>
            </label>
            
            <input type="hidden" name="vpn_check">
            
            </div>
             
            </div>
            <br>
            <div class="sclayout">
            <div class="one">
        <div>One Device one Account: ( ON for Allow & OFF for Not Allow )</div>
        <div style="font-size: 11px;">Allow user to create multiple account in single device.</div>
        </div>
            
            <div class="one">

            <label class="switch" for="myMultiple">
              <input type="checkbox" name="use_multiple_account" id="myMultiple" onclick="myFunction1()" value="<?php echo $row['use_multiple_account']; ?>">
             
              <span class="slider round"></span>
            </label>
            
            <input type="hidden" name="multiple_check">
            
            </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
    
<script>

var checkBox = document.getElementById("myCheck");
if(checkBox.value=="1")
  {
      checkBox.checked = true;
  }else
  {
      checkBox.checked = false;
  }
  
  var checkBox1 = document.getElementById("myMultiple");
if(checkBox1.value=="1")
  {
      checkBox1.checked = true;
  }else
  {
      checkBox1.checked = false;
  }

function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  
  if (checkBox.checked == true){
    document.getElementById("myCheck").value = "1";
  } else {
     document.getElementById("myCheck").value = "0";
  }
}

function myFunction1() {
  var checkBox1 = document.getElementById("myMultiple");
  var text = document.getElementById("text");
  
  if (checkBox1.checked == true){
    document.getElementById("myMultiple").value = "1";
  } else {
     document.getElementById("myMultiple").value = "0";
  }
}
</script>
    </div>
</div>
</div>

<div class="tab-pane fade" id="ads" role="tabpanel" aria-labelledby="Themes-tab">
<div class="builder_select">

<form action="admin_api.php" method="post">
    <div id="container1">
        <div class="col-lg-5">
<br>
    <h4 class="form-control-label" for="input-first-name"><b>App ID & Key</b></h4>
    </div>
    </div>
    <br>
         <div id="container1" style="display: none">
                    <div class="col-lg-4">
                        <h5 class="form-control-label" for="input-first-name">Consoliads App Signature:- </h5>
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                        <input style="background: #f5f6ff;" type="text" name="consoliads_app_signature" class="form-control" placeholder="Enter consoliads app signature" value="<?php echo $row['consoliads_app_signature']; ?>">
                        </div>
                    </div>
         </div>
         
         <div id="container1">
                    <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">ironSource App Key:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                    <input style="background: #f5f6ff;" type="text" name="iron_source_app_key" class="form-control" placeholder="Enter ironSource app key" value="<?php echo $row['iron_source_app_key']; ?>">
                    </div>
                    </div>
         </div>
         
         
          <div id="container1">
                    <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Chartboost App ID:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                    <input style="background: #f5f6ff;" type="text" name="chartboost_app_id" class="form-control" placeholder="Enter chartboost app id" value="<?php echo $row['chartboost_app_id']; ?>">
                    </div>
                    </div>
         </div>
         
          <div id="container1">
                    <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Chartboost App Signature:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                    <input style="background: #f5f6ff;" type="text" name="chartboost_app_signature" class="form-control" placeholder="Enter chartboost app signature" value="<?php echo $row['chartboost_app_signature']; ?>">
                    </div>
                    </div>
         </div>
         
         
           <div id="container1">
                    <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Vungle App ID:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                    <input style="background: #f5f6ff;" type="text" name="vungle_app_id" class="form-control" placeholder="Enter vungle app id" value="<?php echo $row['vungle_app_id']; ?>">
                    </div>
                    </div>
         </div>
         
         
          <div id="container1">
                    <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Adcolony App ID:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                   <input style="background: #f5f6ff;" type="text" name="adcolony_app_id" class="form-control" placeholder="Enter adcolony app id" value="<?php echo $row['adcolony_app_id']; ?>">
                    </div>
                    </div>
         </div>
         
          <div id="container1">
                    <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Start.io App ID:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                  <input style="background: #f5f6ff;" type="text" name="start_io_app_id" class="form-control" placeholder="Enter start.io app id" value="<?php echo $row['start_io_app_id']; ?>">
                    </div>
                    </div>
         </div>
         
         
          <div id="container1">
                    <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Unity Game ID:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                  <input style="background: #f5f6ff;" type="text" name="unity_game_id" class="form-control" placeholder="Enter unity game id" value="<?php echo $row['unity_game_id']; ?>">
                    </div>
                    </div>
         </div>
         
         
         <div id="container1">
             
              <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Click between interstitial ad for Spin:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                 <input style="background: #f5f6ff;" type="number" name="spin_count" class="form-control" placeholder="Enter count" value="<?php echo $row['spin_count']; ?>">
                    </div>
                    </div>
         </div>
         
         
          <div id="container1">
             
              <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Click between interstitial ad for Scratch:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                 <input style="background: #f5f6ff;" type="number" name="scratch_count" class="form-control" placeholder="Enter count" value="<?php echo $row['scratch_count']; ?>">
                    </div>
                    </div>
         </div>
         
         
          <div id="container1">
             
              <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Select rewarded ad for extra spin chance:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                  <select class="form-control" name="rewarded_ad_type">
                  <?php if ($row['rewarded_ad_type']=="applovin") {
                    echo '<option value="applovin">Applovin Max</option>
                          <option value="unity">Unity</option>
                          <option value="start_io">Start.io</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['rewarded_ad_type'] == 'unity'){
                    echo '<option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="start_io">Start.io</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['rewarded_ad_type'] == 'start_io'){
                    echo '<option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['rewarded_ad_type'] == 'adcolony'){
                    echo '<option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['rewarded_ad_type'] == 'iron_source'){
                    echo '<option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['rewarded_ad_type'] == 'vungle'){
                    echo '<option value="vungle">Vungle</option>
                          <option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['rewarded_ad_type'] == 'chartboost'){
                    echo '<option value="chartboost">Chartboost</option>
                          <option value="vungle">Vungle</option>
                          <option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>';
                  } 
                  ?>


              </select>
                    </div>
                    </div>
         </div>
         
          <div id="container1">
             
              <div class="col-lg-4">
                      <div class="common_input mb_15">
                        <h5 class="form-control-label" for="input-first-name">Set extra spin count per day:- </h5>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common_input mb_15">
                 <input style="background: #f5f6ff;" type="number" name="spin_count_per_day" class="form-control" placeholder="Enter count" value="<?php echo $row['spin_count_per_day']; ?>">
                    </div>
                    </div>
         </div>
  </div>
  <hr>
  <br>
    
    <div class="col-lg-12" id="container">
     <div class="col-lg-4">
              <div class="common_input mb_15">
                <h4 class="form-control-label" for="input-first-name"><b>Banner Ads</b></h4>
                <select class="form-control" name="banner_ad_type">
                  <?php if ($row['banner_ad_type']=="applovin") {
                    echo '<option value="applovin">Applovin Max</option>
                          <option value="unity">Unity</option>
                          <option value="start_io">Start.io</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['banner_ad_type'] == 'unity'){
                    echo '<option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="start_io">Start.io</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['banner_ad_type'] == 'start_io'){
                    echo '<option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['banner_ad_type'] == 'adcolony'){
                    echo '<option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['banner_ad_type'] == 'iron_source'){
                    echo '<option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['banner_ad_type'] == 'vungle'){
                    echo '<option value="vungle">Vungle</option>
                          <option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['banner_ad_type'] == 'chartboost'){
                    echo '<option value="chartboost">Chartboost</option>
                          <option value="vungle">Vungle</option>
                          <option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>';
                  }
                  ?>


              </select>
              </div>
              
              <div class="row">
                    <div class="col-lg-12">
                      <div class="common_input mb_15">
                        <label class="form-control-label" for="input-email">Applovin banner ad unit id</label>
                        <input style="background: #f5f6ff;" type="text" name="applovin_banner_id" class="form-control" placeholder="Enter applovin banner id" value="<?php echo $row['applovin_banner_id']; ?>">
                      </div>
                    </div>
                  </div>
                  
                    <div class="row">
                <div class="col-lg-12">
                  <div class="common_input mb_15">
                    <label class="form-control-label" for="input-email">Unity banner ad unit id</label>
                    <input style="background: #f5f6ff;" type="text" name="unity_banner_id" class="form-control" placeholder="Enter unity banner id" value="<?php echo $row['unity_banner_id']; ?>">
                  </div>
                </div>
              </div>
             
  
  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Adcolony banner zone id</label>
        <input style="background: #f5f6ff;" type="text" name="adcolony_banner_id" class="form-control" placeholder="Enter adcolony banner id" value="<?php echo $row['adcolony_banner_id']; ?>">
      </div>
    </div>
  </div>
  
         <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Vungle banner placement id</label>   
        <input style="background: #f5f6ff;" type="text" name="vungle_banner_id" class="form-control" placeholder="Enter vungle banner id" value="<?php echo $row['vungle_banner_id']; ?>">
      </div>
    </div>
  </div>
                  
            </div>
            
                      
            
            
             <div class="col-lg-4">
              <div class="common_input mb_15">
                <h4 class="form-control-label" for="input-first-name"><b>Interstital Ads</b></h4>
                <select class="form-control" name="interstital_ad_type">
                  <?php if ($row['interstital_ad_type']=="applovin") {
                    echo '<option value="applovin">Applovin Max</option>
                          <option value="unity">Unity</option>
                          <option value="start_io">Start.io</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['interstital_ad_type'] == 'unity'){
                    echo '<option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="start_io">Start.io</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['interstital_ad_type'] == 'start_io'){
                    echo '<option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['interstital_ad_type'] == 'adcolony'){
                    echo '<option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="iron_source">ironSource</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['interstital_ad_type'] == 'iron_source'){
                    echo '<option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="vungle">Vungle</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['interstital_ad_type'] == 'vungle'){
                    echo '<option value="vungle">Vungle</option>
                          <option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>
                          <option value="chartboost">Chartboost</option>';
                  } else if($row['interstital_ad_type'] == 'chartboost'){
                    echo '<option value="chartboost">Chartboost</option>
                          <option value="vungle">Vungle</option>
                          <option value="iron_source">ironSource</option>
                          <option value="adcolony">Adcolony</option>
                          <option value="start_io">Start.io</option>
                          <option value="unity">Unity</option>
                          <option value="applovin">Applovin Max</option>';
                  } 
                  ?>


              </select>
              </div>
              
                           <div class="row">
                <div class="col-lg-12">
                  <div class="common_input mb_15">
                    <label class="form-control-label" for="input-email">Applovin interstital ad unit id</label>
                    <input style="background: #f5f6ff;" type="text" name="applovin_interstital_id" class="form-control" placeholder="Enter applovin interstital id" value="<?php echo $row['applovin_interstital_id']; ?>">
                  </div>
                </div>
              </div>
              
                               <div class="row">
                    <div class="col-lg-12">
                      <div class="common_input mb_15">
                        <label class="form-control-label" for="input-email">Unity interstital ad unit id</label>
                        <input style="background: #f5f6ff;" type="text" name="unity_interstital_id" class="form-control" placeholder="Enter unity interstital id" value="<?php echo $row['unity_interstital_id']; ?>">
                      </div>
                    </div>
                  </div>
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Adcolony interstital zone id</label>
        <input style="background: #f5f6ff;" type="text" name="adcolony_interstital_id" class="form-control" placeholder="Enter adcolony interstital id" value="<?php echo $row['adcolony_interstital_id']; ?>">
      </div>
    </div>
  </div>
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Vungle interstital placement id</label>   
        <input style="background: #f5f6ff;" type="text" name="vungle_interstital_id" class="form-control" placeholder="Enter vungle interstital id" value="<?php echo $row['vungle_interstital_id']; ?>">
      </div>
    </div>
  </div>
  
  
   
  
              
            </div>
            
             <div class="col-lg-4">
              <div class="common_input mb_15">
                <h4 class="form-control-label" for="input-first-name"><b>Rewarded Ads</b></h4>
              </div>
              
              
                            <div class="row">
                <div class="col-lg-12">
                  <div class="common_input mb_15">
                    <label class="form-control-label" for="input-email">Applovin rewarded ad unit id</label>   
                    <input style="background: #f5f6ff;" type="text" name="applovin_rewarded_id" class="form-control" placeholder="Enter applovin rewarded id" value="<?php echo $row['applovin_rewarded_id']; ?>">
                  </div>
                </div>
              </div>
              
              
                <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Unity rewarded ad unit id</label>
        <input style="background: #f5f6ff;" type="text" name="unity_rewarded_id" class="form-control" placeholder="Enter unity rewarded id" value="<?php echo $row['unity_rewarded_id']; ?>">
      </div>
    </div>
  </div>
 
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Adcolony rewarded zone id</label>
        <input style="background: #f5f6ff;" type="text" name="adcolony_rewarded_id" class="form-control" placeholder="Enter adcolony rewarded id" value="<?php echo $row['adcolony_rewarded_id']; ?>">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Vungle rewarded placement id</label>   
        <input style="background: #f5f6ff;" type="text" name="vungle_rewarded_id" class="form-control" placeholder="Enter vungle rewarded id" value="<?php echo $row['vungle_rewarded_id']; ?>">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Admob rewarded ad unit id</label>   
        <input style="background: #f5f6ff;" type="text" name="admob_rewarded_id" class="form-control" placeholder="Enter admob rewarded id" value="<?php echo $row['admob_rewarded_id']; ?>">
      </div>
    </div>
  </div>
              
            </div>
</div>

    <br>
    <div>
        <p>
            <hr>
        <h3><b></b>Information:-</b><h3>
        
        <h5><label class="form-control-label" for="input-email"><b>AppLovin MAX</b> as a Bidding Mediation Partner for Facebook Audience Network and Unity :</label></h5> 
        <label class="form-control-label" for="input-email">* See AppLovin MAX guidance on how to set up for <a href="https://dash.applovin.com/documentation/mediation/android/mediation-setup/facebook"  target="_blank"><b>Facebook Audience Network</b></a></label>&nbsp;<label class="form-control-label" for="input-email"> & <a href="https://dash.applovin.com/documentation/mediation/android/mediation-setup/unityads"  target="_blank"><b>Unity Ads.</b></a></label>
        <hr>
        <br>
        <br>
    </div>

 <button type="submit" class="btn btn-primary">Save</button>
</form>

</div>
</div>

<div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
<div class="builder_select">
<!--add content-->
</div>
</div>

</div>
<br>
</div>
</div>
</div>
</div>
</div>
</div>

</section>

<?php include 'inc/foot.php';?>