<?php

session_start();

include("connection.php");

include("exfix.php");


if(isset($_SESSION['user'])){

   
    header("Location:req.php");


}
include("auth.php");
include("logwork.php");
include("checkses.php");
if(isset($_SESSION['admin'])){

   
    header("Location:req.php");


}
if(isset($_SESSION['user'])){
    header("Location:req.php");
}






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
 <link rel="shortcut icon" href="imon.png">
</head>
<style>/* Body */
body{
 background-image:url("166.jpg");
 background-size:cover;
}
/* Bbbc */
#bbbc{
 border-style:solid;
 border-top-left-radius:13px;
 border-bottom-right-radius:13px;
 border-bottom-left-radius:13px;
 border-top-right-radius:13px;
 border-width:1px;
}



</style>
<?php
include("resolu.php");


?>

<body>
    <table width="100%" class="tabbb">
        <?php

include("header.php");




        ?>
    </table>
   <a href="index.php"><button class="homep">Go to homepage</button></a>
    <hr>

    <p class="mmm" id="mmm" style="text-align: center"><?php echo $signerr ?? "";?></p>
    <p style="text-align: center"><?php echo $mssg ?? "";?></p>

    <h1 align="center">Sign up</h1>

    <br><center>
<?php echo $gob ?? ""; ?>
</center>
   
    <br>

    <div id="aaaa">

    <div id="bbbc">
  
       
<form method="POST" >
<div class="table" >
<div class="tr">
    <div class="td">
<label for="fname">First Name:<br></label><input type="text" name="fname" id="fname" placeholder="Enter your Firstname" value="<?php echo $re1 ?? ""; ?>" required >
    </div><div class="td">
<label for="sname">Surname:<br></label><input type="text" name="surname" id="sname" placeholder="Enter your Surname" value="<?php echo $re2 ?? ""; ?>" required >
  </div>



</div>
    <br>
    

  
<div class="tr">
    <div class="td">
<label for="phone">Phone Number:<br></label><input type="text" name="phone" id="phone" placeholder="e.g 07012345678" value="<?php echo $re3 ?? ""; ?>" required >
    </div> <div class="td">
<label for="email">E-mail:<br></label><input type="email" name="email" id="email" placeholder="Enter your email address" value="<?php echo $re4 ?? ""; ?>" required >
</div>



</div>
<br>  
<div class="tr">
    <div class="td">

    <label for="pin">Choose a Password:<br></label><input type="password" name="pin" id="pin"  placeholder="Choose a password" required >
    </div><div class="td"> <label for="pinn">Confirm Password:<br></label><input type="password" name="pinn" id="pinn"  placeholder="Re-enter password" required >
</div>
    
</div>
    <br>
    <br><div class="tr">
    <div class="td">

    <input type="submit" name="sign" class="sign" value="Sign up"></div></div>
    <br>
    <br>
</div>
</form>

    </div>














    </div>
    <div style="min-height: 40vh ;"></div>
</body>
</html>