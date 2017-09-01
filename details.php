<?php
include "config.php";
session_start();


if(!$_SESSION['isLogged']) {
  header("location:index.php"); 
  die(); 
}
$us_id=$_SESSION['us_id'];

$res=$myconn->query("SELECT id,first_name,last_name,email,dob,mobile_num FROM `employee` WHERE id='$us_id'");
$row=$res->fetch_row();
?>
<html>
 <head>
  <title>Details</title>
 </head>
 <body>
   <table> 
<?php
   echo "<tr><td>User Id:</td><td>$row[0]</td></tr>";
   echo "<tr><td>First Name:</td><td>$row[1]</td></tr>";
   echo "<tr><td>Last Name:</td><td>$row[2]</td></tr>";
   echo "<tr><td>Email:</td><td>$row[3]</td></tr>";
   echo "<tr><td>Date Of Birth:</td><td>$row[4]</td></tr>";
   echo "<tr><td>Mobile Number:</td><td>$row[2]</td></tr>";

?>
   </table>
 </body>


</html>

