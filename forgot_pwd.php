<?php
include "config.php";
session_start();
$msg=$_SESSION['fr_msg'];
	
if($_SESSION['fr_msg']!=""){
echo '<a class="fragment">';
    echo '<div>';
        echo '<span id="close" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">'."x".'</span>';
 echo '<p class="text">'.$msg.'</p>';
echo '</div>';
echo '</a>';
unset($GLOBALS[_SESSION]['fr_msg']);
}

?>
<html>
<head>
 <title>Forgot Password </title>
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
<form method='post' action="forgot_chk.php">
<table>
<tr><td>
Enter User ID:
<td><input type='text' name='us_id' required>
<tr><td>
Enter your Email-ID:
<td><input type='email' name='email' placeholder="someone@host.com"  required><tr><td>
Enter your Mobile Number:
<td><input type="text" name="tele" pattern='\([0-9]{3}\) [0-9]{3}-[0-9]{4}' placeholder="(xxx) xxx-xxxx">

<tr><td>
<td><input type='submit' value='Submit'>
</table>

</body>
</html>