<?php
include "config.php";
session_start();
$user=$_SESSION['login'];
$msg=$_SESSION['er_msg'];	
if($_SESSION['er_msg']!=""){
echo '<a class="fragment">';
    echo '<div>';
        echo '<span id="close" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">'."x".'</span>';
 echo '<p class="text">'.$msg.'</p>';
echo '</div>';
echo '</a>';
unset($GLOBALS[_SESSION]['er_msg']);
}
?>
<html>
<head>
 <title>Change Password </title>
 <meta charset='utf=8'>
<style>
h1{
margin-left:41.5%;
}
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
</style>
</head>
<body>
<?php
if($user[0]=='a'){
echo "<a href='admin.php'><img border='0'  src='images/button.png' width='150' height='50'></a>";
}else if($user[0]=='u'){
echo "<a href='user.php'><img border='0'  src='images/button.png' width='150' height='50'></a>";
}else{
echo "<a href='tech.php'><img border='0'  src='images/button.png' width='150' height='50'></a>";
}
?>
<h1>CHANGE PASSWORD</h1>
<form method="post" action="change_db.php">
<table>
<tr>
<td>Enter the Old Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td>Enter the New Password</td>
<td><input type="password" pattern=".{5,10}" requred name="pswd1"></td>
</tr>
<tr>
<td>Re-Enter the New Password</td>
<td><input type="password" pattern=".{5,10}" requred name="pswd2"></td>
</tr>
<tr>
<td></td>
<td><input type="Submit" value="Change"></td>
</tr>
</table>
</form>
</body>
</html>