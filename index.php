<!DOCtype html>
<html>
<head>
<style>
html, body, div,table {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
}
body{
	background-color: #3f639e;
}
table{
	margin: auto;
	border-collapse: collapse;
}
div {
    width:450px;
    height:300px;
    background-color: #457dd8;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: -1;
    border-radius: 15px;
    margin: auto;
}
input{
	border-radius: 5px;
}
a{
	margin-left: 20px;
	font-family:Arial, Helvetica, sans-serif;
	color: black;
	text-decoration: none;
}
h1{
font-family:Comic Sans MS;
}

input[type="submit"]{
background-color: #4CAF50;
    border: none;
    color: white;
    width: 185px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
}

</style>
<charset 'utf-8'>
<title>Login</title>
</head>
<body>
<div>
<form method="post" action="validate.php">
<table>
<tr>
<td><h1> Bug Bucket</h1>
<tr>
<td><input type="text" name="username" placeholder="username" id="user" required>
<tr>
<td><input type="password" name="password" placeholder="password" id="pass" required>
<tr>
<td><input type="submit" name="login" value="login">
<tr>
<tr>
<td><input type="checkbox" name="remember" id="check" value="false">Remember me
<tr>
<td><a href="forgot_pwd.php">Forgot password</a>
</table>
</div>
<?php
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
$user=$_COOKIE['user'];
$pass=$_COOKIE['pass'];
}
echo "<script>
document.getElementById('user').value='$user';
document.getElementById('pass').value='$pass';
document.getElementById('check').value='true';
</script>";
?>
</form>
</body>
</html>