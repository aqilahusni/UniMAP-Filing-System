<?php
session_start();

require_once"config.php";

?>
<html>
	<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>TFS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/menu.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="css/stylemenu.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
	<script type="text/javascript" src="validate.js" ></script> 
	<style>

	table{
	text-align:left;
	padding:4;
	border:10px solid grey;
	border-radius:8px;
	background-image: url('img/ptn.jpg');
	}

	</style>
	</head>
<script language='JavaScript'>
    <!--
    function ValidateForm() {
        var Check = 0;
		if (document.tncreg.password.value != document.tncreg.password2.value) { Check = 1; }
		if (document.tncreg.username.value == '') { Check = 1; }
		if (document.tncreg.password.value == '') { Check = 1; }
		if (document.tncreg.password2.value == '') { Check = 1; }
        if (Check == 1) {
            alert(" Some field empty or passowrd do not match");
            return false;
        } else {
            document.tncreg.submit.disabled = true;
            return true;
        }
    }
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.marginLeft = "250px";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	}
    //-->
    </script>


<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="show"><i class="fa fa-fw fa-home"></i>&nbsp; Home</a>
  <a href="addfile"><i class="fa fa-fw fa-file"></i>&nbsp; Add New File</a>
  <?php
	if ($_SESSION['user']=="admin"){
	echo"<a href='reg'><i class='fa fa-fw fa-user'></i>&nbsp; Add New User</a>";}
  ?>
  <a href="out"><i class="fa fa-fw fa-sign-out"></i>&nbsp; Logout</a>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    <h2>UniMAP Filing System</h2>
</div>

<center><table bgcolor=grey cellpadding=7  >
<h2><center>ADD NEW USER</center></h2>
<tr><td><form method=post name=tncreg action="register.php" onSubmit='return ValidateForm()'>
Username:  <input type=text name=username size=40><br><br>
Password :  <input type=text name=password size=40><br><br>
Confirm Passowrd: <input type=text name=password2 size=31><br>
<p align=left><input type=submit value="Register"><br>
</p>
</form></td></tr><tr><td><hr>
<?php

if ($_SESSION['user']==$admin) {

echo "<form  method=post name=deluser action='deluser.php'>";
 

$sql='SELECT * FROM members';

$result=mysql_query("$sql");
if (!$result) {echo "No results found ".mysql_error(); exit();} 

echo "<select name=user2del>";
while($row = mysql_fetch_array($result))
  { echo "<option>".$row['username']."</option>";}
echo "</select > 
<input type=submit value='Delete user'>
</form></td></tr></table></h3>"; }

?>
<style> 
body{
background-image: url('img/bga.jpg');}
</style>
</center></body></html>