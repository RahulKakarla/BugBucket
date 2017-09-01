<?php
include "config.php";
$name=$_POST['user'];
session_start();
$_SESSION['user']=$msg;
if($name[0]=='u'){
$res=$myconn->query("SELECT * FROM login WHERE id='$name'");
if($res==1){
$res1=$myconn->query("UPDATE login SET is_active='N' WHERE id='$name'");
header("location:delete.php");
$_SESSION['msg']='User has been deactivated';
}

}elseif($name[0]!='u'){
$res=$myconn->query("SELECT * FROM login WHERE id='$name'");
if($res==1){
$res1=$myconn->query("UPDATE login SET is_active='N' WHERE id='$name'");
header("location:delete.php");
$_SESSION['msg']='Employee has been deactivated';
}
}
?>