<?php

include "config.php";
session_start();
echo "hi";
$tick_id=$_SESSION['tick'];
$user=$_SESSION['login'];
$message=$_POST['comment'];
$var1=$_SESSION['tick'];

$res=$myconn->query("INSERT INTO `comment`(ticket_id,message,sender_id) 
                 VALUES('$tick_id','$message','$user')");

if($res){
header("location:ticket_details.php?var=$var1");
$_SESSION['msg1']="Succesfully Added Comment";
}
else{
echo "error";
}
?>