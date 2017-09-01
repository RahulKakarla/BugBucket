<?php
include "config.php";
include "variable.php";
 

$user='us_0001';
$pass='password';

echo "hi\n";

$res=$myconn->query("SELECT * FROM login WHERE id='$user' and password='$pass'");
$row_cnt=$res->num_rows;
echo $row_cnt;
echo "\n";


$x=date("Y-m-d h:i:sa", strtotime("now")); 


if($row_cnt==1){
          $res1=$myconn->query("SELECT first_name,role FROM employee WHERE id='$user'");
          $myconn->query("UPDATE login SET last_login=NOW()  WHERE id='$user'");
          $email=$res1->fetch_row();
          $name=$email[0];
	  $login =$user;
	  $role=email[1];
	 	echo $email[0];
		
	
} else{
	echo "fuck\n";
}

?>