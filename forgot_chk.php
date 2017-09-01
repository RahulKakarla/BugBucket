<?php
session_start();
include "config.php";
$user=$_POST['us_id'];
$email=$_POST['email'];
$phn=$_POST['tele'];


 $res=$myconn->query("SELECT L.password FROM employee E JOIN login L on E.id=L.id  
                        WHERE E.id='$user' AND E.email='$email' AND E.mobile_num='(864) 556-6454'");
 $rc=$res->num_rows;
 $rw=$res->fetch_row();
 if($rc==1){
   $msg="Your Password is ".$rw[0];
   
   
  $from = "noreply@bugbucket.com";
    $to = "$email";    
   
    $empID = $user;
    $subject = "Password";
    $message = "Your Password is ".$rw[0];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,"From:".$from);
    header("location:user.php");
    $_SESSION['fr_msg']="email has been sent to you please check";
   header("location:forgot_pwd.php?var=hi");

  }

  else{
   $msg="Your user ID or email or mobile Does not match Please enter again";
   $_SESSION['fr_msg']=$msg;
   header("location:forgot_pwd.php");
  }
  
?>