<?php
session_start();

if(!$_SESSION['isLogged']) {
  header("location:index.php"); 
  die(); 
}
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

<!DOCTYPE html>
<html>
 <head>
 <meta charset utf-8>
  <title>Create User</title>
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
td{
padding-left:20px;
}
h1{
 margin-left:45%;
}
</style>
    </head>
<body>
  <a href="admin.php"><img border="0" alt="Add User" src="images/button.png" width="150" height="50"></a>  
   <form action="crt_tech_db.php" method="post" >
   <h1>ADD USER</h1>	
   <table>
    <tbody>
      	  <tr>
		<td align="right">Frist Name:
		<td align="left"><input type="textarea" required placeholder="name" name="fname" >
	  <tr>
		<td align="right">Last Name:
		<td align="left"><input type="textarea" required placeholder="name" name="lname" >
	 
	  <tr>
		<td align="right">BirthDay:
		<td align="left"><input type="date" name="bday" required>
	  <tr>
		<td align="right">Technology:
		<td align="left"><select name="tech" align="left" style="border:1px solid">
			<option value="Java">Java Developer</option>
			<option value="Tester">Tester</option>
			<option value="SQL">SQL Developer</option>
			<option value=".net">.NET Developer</option>
	       </select>
	 <tr>
		<td align="right">Mobile:
		<td align="left"><input type="text" name="tele" pattern='\([0-9]{3}\) [0-9]{3}-[0-9]{4}' placeholder="(xxx) xxx-xxxx">
         <tr>
		<td align="right">E-Mail:
		<td align="left"><input type='email' name="email" size="75" placeholder="someone@host.com" required>
         <tr> <input type='hidden' name="team" value='2'>
         <tr>
		<td align="right">
		<td align="left"><input type="submit" value="submit" style="height:20px;width:75px">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="reset" style="height:20px;width:75px">
	
         
	</table>	
   </form>
 </body>
</html>


