<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("connection.php");
include("checkses.php");

$bottom1='<a class="flink" href=""><b>Pending Requests('.$countvc.')</b></a>';

unset($_SESSION["jskd"]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
 <link rel="shortcut icon" href="imon.png">
</head>
<?php
include("resolu.php");


?>
<style>
/* Division */




</style>
<body>
   
<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr>

<br>
<div class="colo">
<br>
<center>
<a href="index.php">GO TO HOMEPAGE</a>
</center>
<br> </div>
<br>

<div class="bc">
<p><b><u><?php echo "Pending Requests($count) "; ?></u></b></p>

<div class="cb">

<?php $goc=mysqli_query($connection,"select * from lib.requests where approval_status='pending'");

if(mysqli_num_rows($goc)>0){
?>
<table class="ab"><tr>
    <th>RequestID</th>
    <th>UserID</th>
    <th>Title</th>
    <th>Number Requested</th>
    <th>Number Available</th>
    <th>Date of request</th>
    <th>Time of request</th>

    </tr>
<?php
while($go=mysqli_fetch_array($goc)){


?>

<tr>
<td><?php echo $go['requestid'] ?> </td>
<td><?php echo $go['requesterid'] ?> </td>
<td><?php
$l=$go['bookid'];
$ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
$lll=mysqli_fetch_array($ll);
$book=$lll["title"];
echo $book ?> 
</td>
<td><?php echo $go['no_of_copies'] ?> </td>
<td><?php
$l=$go['bookid'];
$ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
$lll=mysqli_fetch_array($ll);
$bookav=$lll["copies"];
echo $bookav ?> 


</td>
<td><?php echo $go['date_of_req'] ?> </td>
<td><?php echo $go['reqtime'] ?> </td>
<td><a href="approve.php?rqid=<?php  echo  $go['requestid']  ?>" class="apr">Approve</a></td>
<td><a href="deny.php?rqid=<?php  echo  $go['requestid']  ?>" class="deny">Deny</a></td>

</tr>


<?php

}
?>

</table>

<?php
}
?>





</div>



</div>

<hr>
<?php

$gofffff=mysqli_query($connection,"select * from lib.reqdown where access!='granted'");
$erree=mysqli_num_rows($gofffff);

?>

<div class="bc">
<p><b><u><?php echo "Download Requests($erree) "; ?></u></b></p>

<div class="cb">

<?php 

if($erree>0){
?>
<table class="ab"><tr>
   
    <th>UserID</th>
    <th>Content ID</th>
 <th>Title</th>
    <th>Date of request</th>
    <th></th>

    </tr>
<?php
while($ggfo=mysqli_fetch_array($gofffff)){


?>

<tr>
<td><?php echo $ggfo['userid'] ?> </td>
<td><?php echo $ggfo['contentid'] ?> </td>
<td><?php
$lgr=$ggfo['contentid'];
$llgr=mysqli_query($connection,"select * from lib.content where contentid='$lgr'");
$lllgr=mysqli_fetch_array($llgr);
echo $lllgr["title"];
  ?> 


</td>
<td><?php echo $ggfo['date'] ?> </td>

<td><a href="grant.php?reid=<?php  echo  $ggfo['reid']  ?>" class="apr">Grant access</a></td>


</tr>


<?php

}
?>

</table>

<?php
}
?>





</div>



</div>

<hr>






<?php

$gocc=mysqli_query($connection,"select * from lib.requests where approval_status='approved'");
$countc=mysqli_num_rows($gocc)


?>
<div class="bc">
<p><b><u><?php echo "Approved Requests($countc) "; ?></u></b></p>

<div class="cb">

<?php 

if(mysqli_num_rows($gocc)>0){
?>
<table class="ab"><tr>
    <th>RequestID</th>
    <th>UserID</th>
    <th>Title</th>
    <th>Number Requested</th>
    <th>Number Approved</th>
    <th>Date of Approval</th>
    <th>Approved by</th>

    </tr>
<?php
while($gco=mysqli_fetch_array($gocc)){


?>

<tr>
<td><?php echo $gco['requestid'] ?> </td>
<td><?php echo $gco['requesterid'] ?> </td>
<td><?php
$c=$gco['bookid'];
$cll=mysqli_query($connection,"select * from lib.content where contentid='$c'");
$clll=mysqli_fetch_array($cll);
$bookc=$clll["title"];
echo $bookc ?> 
</td>
<td><?php echo $gco['no_of_copies'] ?> </td>
<td><?php
echo $gco["issued_copies"] ?> 


</td>
<td><?php echo $gco['date_approved'] ?> </td>
<td>adminID<?php echo $gco['approved_by'] ?> </td>
<td><a href="issue.php?rqid=<?php  echo  $gco['requestid']  ?>" class="apr">Issue</a></td>
<td><a href="revert.php?rqid=<?php  echo  $gco['requestid']  ?>" class="deny">Revert</a></td>

</tr>


<?php

}
?>

</table>

<?php
}
?>





</div>



</div>
<hr>

<div style="min-height:80vh ;"></div>







</body>
</html>