<?php
session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("checkses.php");
include("connection.php");








?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
 <link rel="shortcut icon" href="imon.png">
</head>
<style>

.erer .ht{
 display:flex;
 justify-content:space-around;
}


    </style>
<?php
include("resolu.php");


?>


<body>
 
<table width="100%">
<?php

include("header.php");

?>

</table>  
 <a href="index.php"><button class="homep">Go to homepage</button></a>
    <hr>




<?php


$checkexr=mysqli_query($connection, "select * from lib.requests where approval_status='issued' and requesterid='$user'");
if(mysqli_num_rows($checkexr)>0){
  
  while($ccrr=mysqli_fetch_assoc($checkexr)){

    $rgcar=date("Y-m-d");
    $dyr=(strtotime($rgcar));
    $strr = $ccrr["expected_return_date"];


$timestamp = strtotime($strr);



    if(($dyr-$timestamp)>0 or ($dyr-$timestamp)>=-86400){
     
      
$fc[]=$ccrr["requestid"];
}

  }$coundf=count($fc);}

  $coundf=$coundf ?? "";
$checknot=mysqli_query($connection, "select * from lib.notreqs where userid='$user'");
if((mysqli_num_rows($checknot)>0) or ($coundf>0)){
    
?>

<div class="erer"><ul>
<?php


  while($cc=mysqli_fetch_assoc($checknot)){

$ccc=$cc["bookid"];
$cccc=mysqli_query($connection,"select * from lib.content where contentid='$ccc' and copies>0");
$ere=mysqli_fetch_assoc($cccc);
if(mysqli_num_rows($cccc)>0){

?>

<li>
<div class="ht">

<div>
<?php echo $ere['title'] ?> now has (<?php echo $ere['copies'] ?>) copies Available 

</div>
<div><?php  echo '<a href="req.php?rssn='."$ccc".'">Request</a>'; ?></div>

<div><?php $dddi=$cc["notid"];  echo '<a href="marknotu.php?id='."$dddi".'">Mark as read</a>'; ?></div></div>
</li>

<hr>
<?php


}}

?>
</ul>
</div>




























<div class="erer"><ul>
<?php


  for($rose=0; $rose < $coundf; $rose++){

$ref=$fc[$rose];
$cccce=mysqli_query($connection,"select * from lib.requests where requestid='$ref'");
$eree=mysqli_fetch_assoc($cccce);
if(mysqli_num_rows($cccce)>0){

$gets=$eree['bookid'];
$ccccd=mysqli_query($connection,"select * from lib.content where contentid='$gets'");
$ered=mysqli_fetch_assoc($ccccd);
$date1=date_create($rgcar);
$date2=date_create($strr);
?>

<li>
<div class="ht">

<div>


<?php

if(($dyr-$timestamp)>0){


   
    $diff=date_diff($date1,$date2);
    echo "<span style='color:red'>Notice!:</span> You have exceeded the return date   of <u>".$ered['title']."</u> by ";
    echo $diff->format("%R%a day(s)");

echo "<br> Kindly note that there is a fine of (".$eree['fine_per_day']." naira) for each exceeded day.";
}elseif(($dy-$timestamp)>=-86400){
    if(($dy-$timestamp)==0){
  echo "<span style='color:orange'>Notice!:</span> Exceeded";
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a day(s).");
echo "<br> Today is expected return date for ";
echo "<u>".$ered['title']."</u> ";
echo "<br> Kindly note that there is a fine of (".$eree['fine_per_day']." naira) for each exceeded day.";


}else{

echo "<span style='color:green'>notice. you have ";


$diff=date_diff($date1,$date2);
echo $diff->format("%R%a day(s)");
echo " left to return ";
echo "<u>".$ered['title']."</u> ";

;

}}

?>


</div>




</div>
</li>

<hr>
<?php


}}

?>
</ul>
</div>













<?php

}else{


    ?>
<div class="cent">

<h1>You have no new notifications.</h1>
</div>
<?php

}

    ?>
</body>
</html>