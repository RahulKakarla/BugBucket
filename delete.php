<?php 
session_start();
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

?>
<!DOCtype html>
<html>
<head>
<meta charset='utf-8'>
<title>Delete User</title>
<style>
.fragment {
    font-size: 12px;
    font-family: tahoma;
    height: 30px;
    border: red;
    background-color:red;
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
body{
background-color:lightgrey;
}
table{
margin:auto;
background-color:#e6e8ed;
box-shadow: 2px 2px 2px #888888;
}
input[type="text"]{
width:70px;
box-shadow: 2px 2px 2px #888888;
}
h1{
margin-left:36%;
}
</style>
</head>
<body>
<a href="admin.php"><img border="0" alt="Add User" src="images/button.png" width="150" height="50"></a>  
<h1>Deactiavte user or employee</h1>
<form method="post" action="deletedb.php" name="empdlt">
<table>
<tbody>
<tr>
<td>Enter User_ID<input type="text" required name="user" pattern="[u]+[s]+_[0-9]{4}" title="Should start with us_ and should have atleast 4 numbers" placeholder="us_xxxx" >
<td><input type="submit" value="submit" name="delete">
</tbody>
</table>
</form>
<form method="post" action="deletedb.php" name="empdlt">
<table>
<tbody>
<tr>
<td>Enter Emp_ID<input type="text" required name="user" pattern="[a-z]{2}_[0-9]{4}" title="Should start with em_ and should have atleast 4 numbers" placeholder="em_xxxx" >
<td><input type="submit" value="submit" name="delete">
</tbody>
</table>
</form>
</body>
</html>
