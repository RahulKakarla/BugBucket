<?php
include "config.php";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$bday=$_POST['bday'];
$tech=$_POST['tech'];
$phn=$_POST['tele'];
$email=$_POST['email'];

$res=$myconn->query("SELECT * FROM employee WHERE email='$email'");
$row_cnt=$res->num_rows;

if($row_cnt==0){
  
  echo $phn;
 $res=$myconn->query("SELECT (substring(max(id),4,8)+1) as id from employee where team=2");
  $row=$res->fetch_row();
  $y=sprintf ("%04s",$row[0]);
  $id='us_'.$y;
   
  $myconn->query("INSERT INTO `employee` (id,first_name,last_name,role,team,email,dob,mobile_num) 
              VALUES ('$id','$fname','$lname','user',2,'$email','$bday','$phn')");
  $myconn->query("INSERT INTO `login` (id,password,team) 
              VALUES ('$id','password',2)");
  


}
else{
echo "user exists";
}


?>