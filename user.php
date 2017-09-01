<?php
include "variable.php";
session_start();

if(!$_SESSION['isLogged']) {
  header("location:index.php"); 
  die(); 
}
$msg=$_SESSION['msg'];	
if($_SESSION['msg']!=""){
echo '<a class="fragment">';
    echo '<div>';
        echo '<span id="close" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">'."x".'</span>';
 echo '<p class="text">'.$msg.'</p>';
echo '</div>';
echo '</a>';
unset($GLOBALS[_SESSION]['msg']);
}
$msg1=$_SESSION['msg2'];	
if($_SESSION['msg2']!=""){
echo '<a class="fragment">';
    echo '<div>';
        echo '<span id="close" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">'."x".'</span>';
 echo '<p class="text">'.$msg1.'</p>';
echo '</div>';
echo '</a>';
unset($GLOBALS[_SESSION]['msg2']);
}
echo "Welcome User ".$name;
?>
<DOCYPE html>
<html>
<head>
<title>user page</title>
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
table{
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
<table cellpadding="30">
<tbody>
<tr>
<td>
<div class="tooltip "><a href="newtickets.php"><img border="0" alt="Add User" src="images/newtic.png" width="200" height="200"></a>
  <span class="tooltiptext ">Create a new ticket</span></div>
<td>
<div class="tooltip "><a href="tickets.php"><img border="0" alt="Add User" src="images/mytickets.png" width="200" height="200"></a>
  <span class="tooltiptext ">My tickets</span></div>
<tr>
<td>
<div class="tooltip "><a href="change_pswd.php"><img border="0" alt="Add User" src="images/3.jpg" width="200" height="200"></a>
  <span class="tooltiptext ">change password</span></div>
<td>
<div class="tooltip "><a href="myinfo.php"><img border="0" alt="Add User" src="images/info_button.png" width="200" height="200"></a>
  <span class="tooltiptext ">My info</span></div>
</tbody>
<table>
</body>
</html>