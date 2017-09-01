<?php
include "config.php";
include "variable.php";
session_start();


if(!$_SESSION['isLogged']) {
  header("location:index.php"); 
  die(); 
}
$us_id=$login;

$res=$myconn->query("SELECT id,first_name,last_name,email,dob,mobile_num FROM `employee` WHERE id='$us_id'");
$row=$res->fetch_row();
?>
<html>
 <head>
 <title>My Info</title>
 <style>
table{
margin:auto;
background-color:#e6e8ed;
box-shadow: 2px 2px 2px #888888;
}
   body{
    font-family:Arial;
    font-size:12pt;
    background-color:lightgrey;
   }
td{
padding-left:20px;
}
td:first-child{
align:right;
}
 </style>
 </head>
 <body>
<?php
if($us_id[0]=='a'){
echo "<a href='admin.php'><img border='0'  src='images/button.png' width='150' height='50'></a>";
}else if($us_id[0]=='u'){
echo "<a href='user.php'><img border='0'  src='images/button.png' width='150' height='50'></a>";
}else{
echo "<a href='tech.php'><img border='0'  src='images/button.png' width='150' height='50'></a>";
}
?>
<form action="">
   <table> 
<?php
   echo "<tr><td>User Id:</td><td>$row[0]</td></tr>";
   echo "<tr><td>First Name:</td><td>$row[1]</td></tr>";
   echo "<tr><td>Last Name:</td><td>$row[2]</td></tr>";
   echo "<tr><td>Email:</td><td>$row[3]</td></tr>";
   echo "<tr><td>Date Of Birth:</td><td>$row[4]</td></tr>";
   echo "<tr><td>Mobile Number:</td><td>$row[5]</td></tr>";

?>
   </table>
 </body>


</html>

