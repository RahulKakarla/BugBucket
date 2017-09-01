<?php
include "variable.php";
session_start();
if(!$_SESSION['isLogged']) {
  header("location:index.php"); 
  die(); 
}
?>

<DOCYPE html>
<html>
<head>
<title> New tickets page</title>
<style>
body{
background-color:lightgrey;
}
table{
margin:auto;
background-color:#e6e8ed;
box-shadow: 2px 2px 2px #888888;
}
input[type="text"]{
width:700px;
box-shadow: 2px 2px 2px #888888;
}
input{
box-shadow: 2px 2px 2px #888888;
}
thead{
align:center;
}
textarea{
box-shadow: 2px 2px 2px #888888;
}
select{
box-shadow: 2px 2px 2px #888888;
}
</style>
</head>
<body>
<a href="user.php"><img border="0" alt="Add User" src="images/button.png" width="150" height="50"></a>  
<form method="post" action="crt_ticket_db.php">
<table cellpadding="15">
<tr>
<th colspan="2"><h2>Create a new ticket.</h2>
</thead>
<tbody>
<tr>
<td>
Heading:<td>
<input type="text" name="heading" required>
<tr>
<td>
Description:
<td><textarea rows="10" cols="100" name="description" required></textarea>
<tr>
<td>
severity:
<td><select name="severity" align="left" style="border:1px solid">
			<option value="blocker">Blocker</option>
			<option value="Major">Major</option>
			<option value="Minor">Minor</option>
			<option value="trivial">Trivial</option>
	       </select>
<tr>
<td>
Department:
<td><select name="dept" align="left" style="border:1px solid">
			<option value="3">Email</option>
			<option value="4">Network</option>
			<option value="5">Deskktop</option>
	       </select>
<tr>
<td><td align="right">
<input type="submit" value="create" name="create">
</tbody>
</table>
</form>
</body>
</html>