<?php
include "config.php";
include "variable.php" ;
$user=$_POST['username'];
$pass=$_POST['password'];

$res=$myconn->query("SELECT * FROM login WHERE id='$user' AND password='$pass' AND is_active='Y'");
$row_cnt=$res->num_rows;


if($row_cnt==1){
          $x=date("Y-m-d h:i:sa", strtotime("now")); 
          $res1=$myconn->query("SELECT first_name,role,team FROM employee WHERE id='$user'");
          $myconn->query("UPDATE login SET last_login=NOW()  WHERE id='$user'");
          $email=$res1->fetch_row();
	  $_SESSION['login']=$user;
          $_SESSION['name']=$email[0];
          $_SESSION['role']=$email[1];
          $_SESSION['team']=$email[2];
          $_SESSION['isLogged']=true;
	 	if($_POST['remember'])
		setcookie('user',$user,time()+60*60*7);
		setcookie('pass',$pass,time()+60*60*7);
		session_start();
		$_SESSION['email']=$email[0];
              if($email[2]==1){
               header("location:admin.php");
               $_SESSION['pg']="location:admin.php";
              }
              elseif($email[2]==2){
               header("location:user.php");
               $_SESSION['pg']="location:user.php";
              }
              else{
               header("location:tech.php");
               $_SESSION['pg']="location:tech.php";
              }
	
} else{
	header("location:login.php");
}

?>