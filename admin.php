<?php
session_start();

if(!$_SESSION['isLogged']) {
  header("location:index.php"); 
  die(); 
}

include "variable.php";
echo "Welcome ". $name;
echo "\n";
$msg=$_SESSION['crt_msg'];
	
if($_SESSION['crt_msg']!=""){
echo '<a class="fragment">';
    echo '<div>';
        echo '<span id="close" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">'."x".'</span>';
 echo '<p class="text">'.$msg.'</p>';
echo '</div>';
echo '</a>';
unset($GLOBALS[_SESSION]['crt_msg']);
}

 ?>

<html>
<head>
 <title>Admin page </title>
 <meta charset='utf=8'>
<style>


.fragment {
    font-size: 12px;
    font-family: tahoma;
    height: 30px;
    border: red;
    background-color:#e6e8ed;
    display: block;
    box-sizing: border-box;
    text-decoration: none;
}

.fragment:hover {
    box-shadow: 2px 2px 5px rgba(0,0,0,.2);

}

#close {
    float:right;
    display:inline-block;
    padding:2px 5px;
    background:#ccc;
}


body  {
background-repeat:no-repeat;
background-size:cover;
}
table.respon{
margin:auto;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
</head>
<body background="images/fb.jpg">
<a href="logout.php"><button type="button">Logout</button></a>
<table class="respon" cellpadding="42">
<tbody>
<tr>
<td>
<div class="tooltip "><a href="crt_user.php"><img border="0" alt="Add User" src="images/user_add.png" width="200" height="200"></a>
  <span class="tooltiptext ">Add User</span>
</div>
<td>
<div class="tooltip "><a href="crt_tech.php"><img border="0" alt="Add User" src="images/tech.jpg" width="200" height="200"></a>
  <span class="tooltiptext ">Add Technician</span>
</div>
<td>
<div class="tooltip "><a href="delete.php"><img border="0" alt="Delete User" src="images/user_delete.png" width="200" height="200"></a>
  <span class="tooltiptext ">Delete User</span>
</div>
<tr>
<td colsapan="1.5">
<div class="tooltip "><a href="myinfo.php"><img border="0" alt="My Info" src="images/info_button.png" width="200" height="200"></a>
  <span class="tooltiptext ">My Info</span>
</div>
<td>
	//
<div class="tooltip "><a href="change_pswd.php"><img border="0" alt="Change password" src="images/3.jpg" width="200" height="200"></a>
  <span class="tooltiptext ">Change Passworrd</span>
</div>
</tbody>
</table>
</body>
</html>
