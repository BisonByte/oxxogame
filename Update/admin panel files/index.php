<?php
include 'session.php';
include 'db.php';
include 'v.php';?>
 <?php
 include 'inc/head.php';?>


 <?php
 $sql = "SELECT COUNT(*) AS total_users FROM users";
 $result = mysqli_query($link, $sql);
 if ($result) {
   $row = mysqli_fetch_assoc($result);
   $total_users = $row['total_users'];
   if ($total_users>1000) {
     //$total_users = $total_users/1000;
     $total_users = round($total_users,1)."K";
   }
   $total_coins = 0;
   $n = 0;
  while($row = mysqli_fetch_assoc($result)) {
  $total_coins = $row['points']+$total_coins;
  $n = $row['points']+$n;
  }

  if ($n < 10000) {
      // Anything less than a million
        $n_format = number_format($n);
  }
else  if ($n < 1000000) {
    // Anything less than a million
      $n_format = number_format($n / 1000, 0) . 'K';
} else if ($n < 1000000000) {
    // Anything less than a billion
    $n_format = number_format($n / 1000000, 1) . 'M';
} else {
    // At least a billion
    $n_format = number_format($n / 1000000000, 1) . 'B';
}


} else {
  $total_users = 0;
}

//$n_u = $total_users;

if ($total_users < 10000) {
    // Anything less than a million
      $n_u = number_format($total_users);
}
else  if ($total_users < 1000000) {
  // Anything less than a million
    $n_u = number_format($total_users / 1000, 0) . 'K';
} else if ($total_users < 1000000000) {
  // Anything less than a billion
  $n_u = number_format($total_users / 1000000, 1) . 'M';
} else {
  // At least a billion
  $n_u = number_format($total_users / 1000000000, 1) . 'B';
}

$reward_sql = "SELECT * FROM reward_list WHERE status='0'";
$re_result = mysqli_query($link, $reward_sql);

if (mysqli_num_rows($re_result) > 0) {
  $total_payments = mysqli_num_rows($re_result);
}
?>




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
<h3 class="f_s_25 f_w_700 dark_text">Dashboard</h3>
<ol class="breadcrumb page_bradcam mb-0">

</ol>
</div>

</div>
</div>
</div>
<div class="row ">

<div class="col-xl-4 ">
<div class="white_card card_height_100 mb_30 sales_card_wrapper" style="background-color: #6f42c1;">
<div class="white_card_header d-flex justify-content-end">

</div>

<?php
$d = date('Y-m-d');
$sql = "SELECT DISTINCT `username` FROM tracker WHERE `date` = '$d'";
$result = mysqli_query($link, $sql);
$user_today = mysqli_num_rows($result);
 ?>

 <?php
 $d = date('Y-m-d');
 $sql = "SELECT * FROM tracker WHERE `date` = '$d'";
 $result = mysqli_query($link, $sql);
 $activity_today = mysqli_num_rows($result);
$today_e = 0;
 while($r=mysqli_fetch_assoc($result)){
     $today_e=$r['points']+$today_e;
}

if ($today_e < 10000) {
    // Anything less than a million
      $t_er = number_format($today_e);
}
else  if ($today_e < 1000000) {
  // Anything less than a million
    $t_er = number_format($today_e / 1000, 0) . 'K';
} else if ($today_e < 1000000000) {
  // Anything less than a billion
  $t_er = number_format($today_e / 1000000, 1) . 'M';
} else {
  // At least a billion
  $t_er = number_format($today_e / 1000000000, 1) . 'B';
}
    /*$check_device = "SELECT * FROM license";
	$send_dev = mysqli_query($link,$check_device);
	$get = mysqli_fetch_assoc($send_dev);
	if($send_dev && !$get['package_name']==0 &&!$get['license']==0)
	{
	   $data =$a->v(false,$get['c'],$get['u']);  
	   if(!$data['status'])
	   {$refer_point = "UPDATE `license` SET `i`= '0'";header('Location: key.php');}else{$refer_point = "UPDATE `license` SET `i`= '1'";}
	    $db = mysqli_query($link,$refer_point);
	}else{//header('Location: key.php');
	}*/




       if ($activity_today < 10000) {
           // Anything less than a million
             $a_t = number_format($activity_today);
       }
       else  if ($activity_today < 1000000) {
         // Anything less than a million
           $a_t = number_format($activity_today / 1000, 0) . 'K';
       } else if ($activity_today < 1000000000) {
         // Anything less than a billion
         $a_t = number_format($activity_today / 1000000, 1) . 'M';
       } else {
         // At least a billion
         $a_t = number_format($activity_today / 1000000000, 1) . 'B';
       }
       
       $reward_sql = "SELECT * FROM reward_list WHERE status='0'";
       $re_result = mysqli_query($link, $reward_sql);
       
       if (mysqli_num_rows($re_result) > 0) {
         $total_payments = mysqli_num_rows($re_result);
       }

       $reward_sql = "SELECT * FROM `reward_list` WHERE `date`='$d'";
       $re_result = mysqli_query($link, $reward_sql);
       $coins = 0;
       while($r=mysqli_fetch_assoc($re_result)){
     	    $coins = $pre=$r['coins_used']+$coins;
}

if ($coins < 10000) {
    // Anything less than a million
      $c_f = number_format($coins);
}
else  if ($coins < 1000000) {
  // Anything less than a million
    $c_f = number_format($coins / 1000, 0) . 'K';
} else if ($coins < 1000000000) {
  // Anything less than a billion
  $c_f = number_format($coins / 1000000, 1) . 'M';
} else {
  // At least a billion
  $c_f = number_format($coins / 1000000000, 1) . 'B';
}




  ?>

<div class="sales_card_body">
<div class="single_sales">
<span>Today Users</span>
<h3><?php echo $user_today; ?></h3>
</div>
<div class="single_sales">
<span>Today Activity</span>
<h3><?php echo $a_t; ?></h3>
</div>
<div class="single_sales" >
<span>Today Earn</span>
<h3 style="display: flex;align-items: center;gap: 5px;"><?php echo $t_er; ?> <i style="font-size: 16px;" class="fa-solid fa-copyright"></i></h3>
</div>
<div class="single_sales">
<span>Today Redeem</span>
<h3 style="display: flex;align-items: center;gap: 5px;"><?php echo $c_f; ?> <i style="font-size: 16px;" class="fa-solid fa-copyright"></i></h3>
</div>
</div>
</div>
</div>
<div class="col-xl-4 ">
<div class="white_card card_height_100 mb_30 social_media_card">
<div class="white_card_header">
<div class="main-title">
<h3 class="m-0">Statistics</h3>
<span>Checkout your app analytics</span>
</div>
</div>
<div class="media_thumb ml_25">
<img src="img/media.svg" alt="">
</div>
<div class="media_card_body">
<div class="media_card_list">
<div class="single_media_card">
<span>Total User</span>
<h3><?php echo $n_u; ?></h3>
</div>
<div class="single_media_card">
<span>Total Available Coins</span>
<h3><?php echo $n_format; ?></h3>
</div>
<div class="single_media_card">
<span>Pending Payment</span>
<h3><?php echo $total_payments; ?></h3>
</div>
<div class="single_media_card">
<span>Total Earn</span>
<h3>0 K</h3>
</div>
</div>
</div>
</div>
</div>

<style>

#ff::-webkit-scrollbar {
  width: 4px;

}

#ff::-webkit-scrollbar-track {

}

#ff::-webkit-scrollbar-thumb {
  background-color: lightgrey;
}

</style>

<div class="col-xl-4">
<div class="white_card card_height_100 mb_30" style="overflow:scroll; height:545px;" id="ff">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Most Earned Users</h3>
<span>Top 10 most earned users</span>
</div>
<div class="float-lg-right float-none common_tab_btn justify-content-end">

</div>
</div>
</div>
<div class="white_card_body">
<div class="monthly_plan_wraper">

  <?php 

  $reward_sql = "SELECT * FROM `users` ORDER BY `points` DESC LIMIT 10";
  $re_result = mysqli_query($link, $reward_sql);
  while($r=mysqli_fetch_assoc($re_result)){
     


?>
<div class="single_plan d-flex align-items-center justify-content-between">
<div class="plan_left d-flex align-items-center">
<div class="thumb">
<img style="border-radius: 80px; height: 100%;" src="<?php echo $r['image']; ?>" alt="">
</div>
<div>
<h5 style="font-size: 12px;"><?php echo $r['username']; ?></h5>
<span><i class="fa-solid fa-coins"></i> <?php echo $r['points']; ?></span>
</div>
</div>
<a href="tracker.php?i=<?php echo $r['username']; ?>" class="brouser_btn">Track <i class="fa-solid fa-circle-arrow-right"></i></a>
</div>
<?php
}
   ?>





</div>
</div>
</div>
</div>


<!--start offerwalls-->

<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 ">
<div class="row">
<div class="col-xl-12">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">OfferWalls</h3>
<span>Edit offerwall setting</span>
</div>
</div>
</div>
<div class="white_card_body QA_section">
<div class="QA_table ">

<table class="table lms_table_active2 p-0">
<thead>
<tr>
<th scope="col">Image</th>
<th scope="col">Offerwall Name</th>
<th scope="col">Status</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>


<?php
$sql = "SELECT * FROM offers WHERE type = '0' AND is_offer = 0";
$offer = mysqli_query($link, $sql);
 while($offer_row = mysqli_fetch_assoc($offer)) {
   $status = $offer_row['status'];
?>
<tr>
<td>
<div class="customer d-flex align-items-center">
<div class="">
<img src="<?php echo $offer_row['image'];?>" alt="" style="width: 80px; border-radius: 80px;">
</div>

</div>
</td>
 <td>
<div>
<h3 class="f_s_18 f_w_800 mb-0"><?php echo $offer_row['title'];?></h3>
<span class="f_s_12 f_w_500 color_text_3"><?php echo $offer_row['sub'];?></span>
</div>
</td>
<td class="f_s_14 f_w_400 color_text_3">
<a href="#" class="<?php if ($status=="0") {echo "badge_active";}else {echo "badge_active3";} ?>"><?php if ($status=="0") {echo "Active";}else {echo "Deactivated";} ?></a>
</td>
<td>
<div class="action_btns d-flex">
<a href="edit-offer.php?i=<?php echo $offer_row['id'];?>" class="action_btn mr_10"> <i class="far fa-edit"></i></a>
</div>
</td>
</tr>
<?php
}
?>

</tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</div>

<!--start video -->

<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 ">
<div class="row">
<div class="col-xl-12">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Watch Videos</h3>
<span>Edit Watch Video setting</span>
</div>
</div>
</div>
<div class="white_card_body QA_section">
<div class="QA_table ">

<table class="table lms_table_active2 p-0">
<thead>
<tr>
<th scope="col">Image</th>
<th scope="col">Watch Video Name</th>
<th scope="col">Status</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>


<?php
$sql = "SELECT * FROM offers WHERE type = '0' AND is_offer = '1'";
$offer = mysqli_query($link, $sql);
 while($offer_row = mysqli_fetch_assoc($offer)) {
   $status = $offer_row['status'];
  
?>
<tr>
<td>
<div class="customer d-flex align-items-center">
<div class="">
<img src="<?php echo $offer_row['image'];?>" alt="" style="width: 80px; border-radius: 80px;">
</div>

</div>
</td>
 <td>
<div>
<h3 class="f_s_18 f_w_800 mb-0"><?php echo $offer_row['title'];?></h3>
<span class="f_s_12 f_w_500 color_text_3"><?php echo $offer_row['sub'];?></span>
</div>
</td>
<td class="f_s_14 f_w_400 color_text_3">
<a href="#" class="<?php if ($status=="0") {echo "badge_active";}else {echo "badge_active3";} ?>"><?php if ($status=="0") {echo "Active";}else {echo "Deactivated";} ?></a>
</td>
<td>
<div class="action_btns d-flex">
<a href="edit-offer.php?i=<?php echo $offer_row['id'];?>" class="action_btn mr_10"> <i class="far fa-edit"></i></a>
</div>
</td>
</tr>
<?php
}
?>

</tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</div>

<!--start slider offer add-->

<div class="col-xl-12">
<div class="white_card card_height_100 mb_30 ">
<div class="row">
<div class="col-xl-12">
<div class="white_card_header">
<div class="box_header m-0">
<div class="main-title">
<h3 class="m-0">Home Slidebar Banner</h3>
<span>Edit home slidebar banner</span>
</div>
<div class="main-title">
<a href="add-custom-offer.php" class="btn mb-3 btn-primary">Add</a>
</div>
</div>
</div>
<div class="white_card_body QA_section">
<div class="QA_table ">

<table class="table lms_table_active2 p-0">
<thead>
<tr>
<th scope="col">Image</th>
<th scope="col">Title & Subtitle</th>
<th scope="col">Status</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM offers WHERE type = '1'";
$offer = mysqli_query($link, $sql);
 while($offer_row = mysqli_fetch_assoc($offer)) {
   $status = $offer_row['status'];
?>
<tr>
<td>
<div class="customer d-flex align-items-center">
<div class="">
<img src="<?php echo $offer_row['image'];?>" alt="" style="width: 80px; border-radius: 80px;">
</div>

</div>
</td>
 <td>
<div>
<h3 class="f_s_18 f_w_800 mb-0"><?php echo $offer_row['title'];?></h3>
<span class="f_s_12 f_w_500 color_text_3"><?php echo $offer_row['sub'];?></span>
</div>
</td>
<td class="f_s_14 f_w_400 color_text_3">
<a href="#" class="<?php if ($status=="0") {echo "badge_active";}else {echo "badge_active3";} ?>"><?php if ($status=="0") {echo "Active";}else {echo "Deactivated";} ?></a>
</td>
<td>
<div class="action_btns d-flex">
<a href="edit-offer.php?i=<?php echo $offer_row['id'];?>" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
<form action="admin_api.php" method="post">
  <input type="hidden" name="clm_name" value="offers">
  <input type="hidden" name="r_id" value="<?php echo $offer_row['id']; ?>">
  <input type="hidden" name="url" value="/">
  <input type="hidden" name="delt">
<button type="submit" class="action_btn" style="border: none;"> <i class="fas fa-trash"></i> </button>
</form>
</div>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</div>

<!--end offerwalls add-->


</div>
</div>
</div>

</section>

<?php include 'inc/foot.php';?>