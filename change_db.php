<?php
include "config.php";
session_start();
$user=$_SESSION['login'];
$pswd=$_POST['password'];
$pswd1=$_POST['pswd1'];
$pswd2=$_POST['pswd2'];
$pg=$_SESSION['pg'];
if($pswd1==$pswd2){
$res=$myconn->query("SELECT * FROM `login` where id='$user' AND password='$pswd'");
$rc=$res->num_rows;
if($rc==1){
  $res1=$myconn->query("UPDATE `login` SET password='$pswd1', modified_by='$user',modified=NOW() 
                   WHERE id='$user' ");
  
 if($res1){
   $msg2="Your Password is changed";
   header("$pg");
   
  }
}
else{
$er_msg="Your Password is not correct";
header("location:change_pswd.php");
}
}
else{
$er_msg="Your New Passwords Doesn't match";
header("location:change_pswd.php");
}
$_SESSION['er_msg']=$er_msg;
$_SESSION['msg2']=$msg2;
?>