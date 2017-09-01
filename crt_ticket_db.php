<?php
include "config.php";
include "variable.php";
 session_start();

if(isset($_POST['create'])){
 $heading=$_POST['heading'];
 $dept=$_POST['dept'];
 $description=$_POST['description'];
 $severity=$_POST['severity'];
 $user=$_SESSION['login'];
 echo $heading,$dept,$severity,$user;
 $res=$myconn->query("SELECT (substring(max(id),3,8)+1) as id from ticket");
  $row=$res->fetch_row();
  $y=sprintf ("%05s",$row[0]);
  $id='T_'.$y;
  $res1=$myconn->query("SELECT E.id,E.email FROM team T LEFT JOIN employee E ON T.id=E.team WHERE T.id=$dept");
  $rw=$res1->fetch_row();
  $res=$myconn->query("INSERT INTO ticket(id,user_id,assigned_to,subject,team_id,description,severity) VALUES('$id','$user','$rw[0]','$heading',$dept,'$description','$severity')");
  
    if($res){
    $from = "noreply@bugbucket.com";
    $to = "$rw[1]";    
    $first_name = $name;
    $empID = $user;
    $subject = "New ticket";
    $message = $first_name . " with employee id " . $empID . " raised a new ticket:";
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,"From:".$from);
    header("location:user.php");
    $_SESSION['msg']='New ticket created';
}
}



?>