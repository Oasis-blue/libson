<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
if($_GET["rqid"]==""){
    header("Location:index.php");

}
include("connection.php");
include("checkses.php");
$rqid=$_GET["rqid"];






$goc=mysqli_query($connection,"select * from lib.requests where requestid='$rqid'");
$gt=mysqli_fetch_assoc($goc);
if(isset($_POST["appro"])){


$admin=$_SESSION['admin'];
$date= date("d-m-Y") ;
$num=$_POST['num'];
//$tim=date("h:i:sa");
$exp=$_POST['exp'];


$approve=mysqli_query($connection,"update lib.requests set approval_status='issued',issued_copies='$num', date_issued='$date', issued_by='$admin', expected_return_date='$exp' where requestid='$rqid'");


if($approve==1){


$mesg="<span style='color:green'>Issued successfully.</span>";

}else{$mesg="<span style='color:red'>failed to register issue, please contact programmer</span>";}



}





$goc=mysqli_query($connection,"select * from lib.requests where requestid='$rqid'");
$gt=mysqli_fetch_assoc($goc);




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make issue</title>
 <link rel="shortcut icon" href="imon.png">
</head>
<?php
include("resolu.php");


?>

<style>


/* Link */
.erreerr center a{
 color:blue;
}


</style>
<body>
    

<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr>
<div class="ssaf">
<div class="alr">
<div class="erreerr">    <br>      <br>  
  <center>  <a href="<?php if(isset($_SESSION["jskd"])){if($_SESSION["jskd"]=="yo"){ echo "viewusers.php";}else{ echo "viewreq.php";}}else{ echo "viewreq.php";}?>">GO BACK</a></center>
<div class="alrt">
    <p><b><?php echo $mesg ?? "" ?></b></p><br>
<p>You are about to Issue 
<u><?php
$l=$gt['bookid'];
$ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
$lll=mysqli_fetch_array($ll);
$book=$lll["title"];
echo $book ?> </u>
<br>
<b>Type:</b><?php 
$lt=$lll["typeid"];
$thh=mysqli_query($connection,"select * from lib.restype where typeid='$lt'");
$thhh=mysqli_fetch_assoc($thh);
echo $thhh["type"] ?>
<br>
  
to user 
<?php echo $gt["requesterid"]; ?>. 


<br>
<br><b>Request ID:</b><?php echo $rqid ?> </p>

</div>
<div class="fm">
<form method="POST">
<p><b>Copies Requested:</b> <?php echo $gt['no_of_copies'] ?></p>
<p><b>Approved copies:</b> <?php 
echo  $gt["issued_copies"]; ?>


<p>
Issue <input name="num" class="num" type="number" min="1" max="<?php

echo $gt['issued_copies'] ?>" value="<?php



if($gt["issued_copies"]<1){
    echo 0;
}else{ echo 1;}


?>" required> copies</p>



<p><label for="exp"><b>Expected return date:</b></label>

<input type="date" name="exp" id="exp" class="date" required>
<br>
</p>

<input type="submit" name="appro" class="appro" value="<?php 
if($gt["approval_status"]!="approved"){
    echo "Already Issued or reverted";
}else{ echo
"Issue" ;}

?>" required

<?php  
if($gt["approval_status"]!="approved"){ echo "disabled"; }

if($gt["issued_copies"]<1){echo "disabled";}   ?>
>
</form>

<br>

</div>

    </div>




</div>
<br>
</div>
<div style="min-height: 80vh;background-image: url('<?php  echo $stories[$dis]  ?>');
    background-size: cover;"></div>


</body>
</html>