<?php
include "config.php"; 
session_start();
$user=$_SESSION['login'];
   
$msg=$_SESSION['msg1'];	
if($_SESSION['msg1']!=""){
echo '<a class="fragment">';
    echo '<div>';
        echo '<span id="close" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">'."x".'</span>';
 echo '<p class="text">'.$msg.'</p>';
echo '</div>';
echo '</a>';
unset($GLOBALS[_SESSION]['msg1']);
}

   
   $dirs = array("ASC", "DESC");
   $tab_nam=array("`people`","`contacts`","`depts`");
   $page = isset($_GET['page'])? (int)$_GET['page'] : 0;
   $page = isset($_GET['jump']) && $_GET['jump'] != ''? (int)$_GET['jump'] : $page;
   $order = isset($_GET['order'])? (int)$_GET['order'] : 0;
   $dir = isset($_GET['dir'])? (int)$_GET['dir'] : 0;
   $tab= isset($_GET['tab'])? (int)$_GET['tab']:0;
   $uri = "page=$page";
 
?>

<!DOCTYPE html>
<html>
<head>
 <title>Tickets</title>
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
   ul{
    list-style-type:none;
    margin: 0;
    margin-left: 25px;
    padding: 0;
    width:800px;
   }

   li{
    display:inline-block;
    padding:10px;
    border:1px solid black;
    margin-left:10px;
   
   }
 </style>
</head>
<body>
<a href="user.php"><img border="0" alt="Add User" src="images/button.png" width="150" height="50"></a>  
<table>
<tbody>
<?php

  $cols = array("T.id","T.Subject","S.first_name","TM.name", "S.Status");
  $headers = array("Ticket ID", "Subject","Assigned To","Assigned Team", "Status");

?>
 <tr>
 <th>
<?php
 $idx=0;
 foreach($headers as $heading) {
   $d = $idx == $order? !$dir : 0;
   $cr = $idx == $order? ($dir == 1? "&utrif;" : "&dtrif;") : "&dtrif;";
   echo "<th><a href='?order=$idx&page=$page&tab=$tab&dir=$d'> $heading </a> $cr";
   $idx++;
 }
  $res = $myconn->query("SELECT count(*) FROM ticket");
  $row = $res->fetch_row();
  $total = (int)$row[0];
  $res->free();

  $totpages = (int)(($total+9)/10)-1;
  $page = max(0, min($page, $totpages));
  $offset = $page * 10;

  $idx = $offset;
  //echo "SELECT * FROM $tab_nam[$tab] ORDER BY {$cols[$order]} {$dirs[$dir]} LIMIT $offset,30";
  $res = $myconn->query( "SELECT T.id,T.subject,E.first_name,TM.name,S.status FROM `ticket` T 
                          LEFT JOIN `employee` E ON E.ID=T.assigned_to
                          JOIN `ticket_status` S ON T.status=S.id 
                          JOIN `team` TM ON TM.id=T.team_id
                          WHERE user_id='$user' ORDER BY {$cols[$order]} {$dirs[$dir]} LIMIT $offset,10");
  while ($row = $res->fetch_assoc()) {
    echo "<tr><td> $idx </td>";
     $i=0;
    foreach($row as $k => $v) {
    if($i==0){
      $c=$v;
      echo "<td><a href='ticket_details.php?var=$v'> $v</a> </td>";
     }
     else{
      echo "<td> $v </td>";
       }
     $i++;
    }
    echo "</tr>\n";
    $idx++;
  }
?>
<tbody>
<tfoot>
<tr><td colspan=8>
 <form method='GET'>
<?php

  if (isset($_GET['order'])) echo "<input type=hidden name='order' value='$order'>";
  if (isset($_GET['dir'])) echo "<input type=hidden name='dir' value='$dir'>";
  if ($page) echo "<button style='float:left;' name='page' value='".($page-1)."'> Prev </button>";
  if ($page < $totpages) echo "<button style='float:right;' name='page' value='".($page+1)."'> Next </button>";
  echo "<span style='float: right;'> Displaying page $page of $totpages <input type='number' name='jump' size=5></span>";
?>
 </form>
</tfoot>
</table>
</body>
</html>
