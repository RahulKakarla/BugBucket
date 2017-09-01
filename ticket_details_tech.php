<?php
  include "config.php";
  session_start(); 
$var = $_GET['var'];
$us_id=$_SESSION['login'];
 
  $res = $myconn->query("SELECT T.id,T.subject,E.first_name,TM.name,S.status,T.description,S.id FROM `ticket` T 
                          LEFT JOIN `employee` E ON E.ID=T.assigned_to
                          JOIN `ticket_status` S ON T.status=S.id 
                          JOIN `team` TM ON TM.id=T.team_id
                          WHERE T.id='$var'");
  $row = $res->fetch_row();

  $_SESSION['tick']=$var;
 
 ?>
<html>
<head>
 <title>Ticket Details </title>
 <meta charset='utf=8'>
<style>
body{
background-color:lightgrey;
}
table{
margin:auto;
background-color:#e6e8ed;
box-shadow: 2px 2px 2px #888888;
}
 table.ticket{
    margin-top:30px;
    margin:auto;
    border:1px solid black;
 }
table.comments{
border:1px solid black;
width:750px;
height:35px;
margin:10px;
}
textarea{
margin-left:10px;
}
input[type="text"]{
width:70px;
box-shadow: 2px 2px 2px #888888;
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
<form method='post' action='comment_tech.php'>
<table>
<tr>
<td>
Status:
<td><select name="status" align="left" style="border:1px solid">
			<option value="1" <?php if($row[6]==1) echo 'selected="selected"'; ?> >Open</option>
			<option value="2" <?php if($row[6]==2) echo 'selected="selected"'; ?> >Work In Progress</option>
			<option value="4" <?php if($row[6]==4) echo 'selected="selected"'; ?> >Clarification</option>
			<option value="5" <?php if($row[6]==5) echo 'selected="selected"'; ?> >Review</option>
                        <option value="6" <?php if($row[6]==6) echo 'selected="selected"'; ?> >Closed</option>
	       </select>
<?php
echo "<tr><td>Ticket ID:</td><td>$row[0]</td></tr>";
echo "<tr><td>Subject:</td><td>$row[1]</td></tr>";
echo "<tr><td>Assigned To:</td><td>$row[2]</td></tr>";
echo "<tr><td>Assigned Team:</td><td>$row[3]</td></tr>";
echo "<tr><td>Status:</td><td>$row[4]</td></tr>";
echo "<tr><td>Description:</td><td>$row[5]</td></tr>";
?>
</table>
<?php

  $res1 = $myconn->query("SELECT C.message,E.first_name FROM `comment` C JOIN `employee` E on C.sender_id=E.id 
                          WHERE C.ticket_id='$var' ORDER BY C.created_time");
$rc=$res1->num_rows;
echo "<h1>Comments</h1>";


while ($row1 = $res1->fetch_assoc()) {
echo "<table class='comments'>";
echo "<tr>";
echo "<td>$row1[first_name]:</td>";
echo "<tr>";
echo "<td>$row1[message]</td>";
echo "</tr>";
echo "</table>";
}
echo "<tr><td></td><td><textarea cols='100' rows='10' required name='comment' placeholder='comment here'></textarea></td></tr>";echo "<tr><td></td><td><input type='submit' value='Update'></td></tr>";
echo "</form>";
  ?>

</body>
</html>
 

  
  
