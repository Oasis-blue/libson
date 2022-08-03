<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
include("connection.php");
include("exfix.php");
include("checkses.php");

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
<?php
include("resolu.php");


?>
<style>
/* Division */
.erer .ht{
 display:flex;
 justify-content:space-around;
 align-items:center;
 
}





</style>



<body>
    

<table width="100%">
<?php

include("header.php");

?>

</table>  
 <a href="index.php"><button class="homep">Go to homepage</button></a>
    <hr>


<?php



$checkexr=mysqli_query($connection, "select * from lib.requests where approval_status='issued'");
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


$checknot=mysqli_query($connection, "select * from lib.notreqs");
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
User <?php echo $cc["userid"] ?> requested to be notified when <?php echo $ere['title'] ?> is Available.<br>
There are now (<?php echo $ere['copies'] ?>) copies Available 

</div>
<div>Phone: <?php
$iid=$cc["userid"];

$us=mysqli_query($connection, "select * from lib.users where userid='$iid'");
$isd=mysqli_fetch_assoc($us);
echo $isd['phonenumber']
?>
<br>
Email:<?php

echo $isd['email']
?>

</div>


<div><?php $dddi=$cc["notid"];  echo '<a href="marknot.php?id='."$dddi".'">Mark as notified</a>'; ?></div></div>
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

$requ=$eree["requesterid"];

$rewu='<a href="userdetails.php?id='.$requ.'" title="view user">User '.$requ."</a>";
?>

<li>
<div class="ht">

<div>


<?php

if(($dyr-$timestamp)>0){




    $diff=date_diff($date1,$date2);
    echo "<span style='color:red'>Notice!:</span> ".$rewu." has exceeded the return date   of <u>".$ered['title']."</u> by ";
    echo $diff->format("%R%a day(s)");

}elseif(($dy-$timestamp)>=-86400){
    if(($dy-$timestamp)==0){
  echo "<span style='color:orange'>Notice!:</span> Exceeded";
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a day(s).");
echo "<br> Today is expected return date for ";
echo "<u>".$ered['title']."</u> ";
echo "<br> By $rewu.";


}else{

echo "<span style='color:green'>".$rewu." has ";


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