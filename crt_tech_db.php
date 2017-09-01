<?php


include "config.php";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$bday=$_POST['bday'];
$tech=$_POST['tech'];
$phn=$_POST['tele'];
$email=$_POST['email'];
$team=$_POST['team'];
session_start();

$rs=$myconn->query("SELECT * FROM employee WHERE email='$email'");
$row_cnt=$rs->num_rows;

if($row_cnt==0){
  
  echo $phn;
 $res1=$myconn->query("SELECT rep,name FROM team WHERE id=$team");
 $rw=$res1->fetch_row();
 $res2=$myconn->query("SELECT count(1) from employee where team=$team");
 $rwc=$res2->fetch_row();
 if($rwc[0]>=1){
 
 $res=$myconn->query("SELECT (substring(max(id),4,8)+1) as id from employee where team=$team");
  $row=$res->fetch_row();
  $vl=$row[0];}
  else{
   $vl=1;
 }
  $y=sprintf ("%04s",$vl);
  $id=$rw[0].'_'.$y;
   
  $myconn->query("INSERT INTO `employee` (id,first_name,last_name,role,team,email,dob,mobile_num,technology) 
              VALUES ('$id','$fname','$lname','$rw[1]',$team,'$email','$bday','$phn','$tech')");
  $myconn->query("INSERT INTO `login` (id,password,team) 
              VALUES ('$id','password',$team)");
  $_SESSION['us_id']=$id;
  
   
  $from = "noreply@bugbucket.com";
    $to = "$email";    
   
    $empID = $id;
    $subject = "New User";
    $message = "Your id is".$id." Password is password";
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,"From:".$from);
    header("location:user.php");
    $_SESSION['crt_msg']="User has been cretaed with UserId:$id and email has been sent to user";
   header("location:admin.php");

}
else{
$_SESSION['crt_msg']="User already exists";
if($team==2){

header("location:crt_user.php");
}
else{


header("location:crt_tech.php");
}
}


?>