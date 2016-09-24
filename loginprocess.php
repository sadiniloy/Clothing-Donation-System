<?php

session_start();
$email=$_POST["email"];
$pass=$_POST["pass"];

mysql_connect("localhost","root","");
mysql_select_db("cds");

$result=mysql_query("select * from users where email='$email' and pass='$pass'")
		or die("failed to query ".mysql_error());
	
$row= mysql_fetch_array($result);
if($row['email']==$email && $row['pass']==$pass )
{ 	$sid=$row['id'];
	$_SESSION['varname'] = $sid;
	if($row['role']=='moderator')
	{
		include("dashboard_for_mod.php");
		exit();
	}
	else if($row['role']=='admin')
	{
		include("dashboard.php");
		exit();
	}

	else
	{
		include("dashboard_for_donor.php");
			exit();
	}



		 
}

else
echo '<script type="text/javascript">alert("wrong password")</script>';
        include "login.php";
?>