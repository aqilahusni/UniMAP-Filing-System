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
	tr:hover {background:#bfbfbf;}

	table, td, th {  
	  border: 1px solid #ddd;
	  text-align: center;
	}

	table {
	  border-collapse: collapse;
	  width: auto;
	  background: white;
	}

	th, td {
	  padding: 10px;
	}
	body{
	background-image: url('img/bga.jpg');
	}
	thead {background:yellow;}
	.button span {
	  cursor: pointer;
	  display: inline-block;
	  position: relative;
	  transition: 0.5s;
	}

	.button span:after {
	  content: '\00bb';
	  position: absolute;
	  opacity: 0;
	  top: 0;
	  right: -20px;
	  transition: 0.5s;
	}

	.button:hover span {
	  padding-right: 25px;
	}

	.button:hover span:after {
	  opacity: 1;
	  right: 0;
	}
	</style>
</head>

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

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<?php

if (!isset($_SESSION['user'])) {header("location:show.php");} else {
echo "<center><h2>Hasil Carian</h2>";
$sql='SELECT * FROM '.$table;

if (isset($_POST['condition'])) { $sql=$sql.' WHERE '.$_POST['condition'].' ';

if (!empty($_POST['criteriaa'])) { $sql=$sql.$_POST['criteriaa'].' ';} 
else { echo "Please set a criteria"; exit();}

if (!empty($_POST['value4comparison'])) { 
$_POST['value4comparison']=trim($_POST['value4comparison']);
if ($_POST['criteriaa']==">" or $_POST['criteriaa']=="<") {
$sql=$sql.$_POST['value4comparison']; }
else {$sql=$sql."'%".$_POST['value4comparison']."%'";}

}

else { echo "Please set a value for search"; exit();} }


$result=mysql_query("$sql");
if (!$result) {echo "No results found  ".mysql_error(); exit();} 
// ------------------import labels --------------------
$lbl='SELECT * FROM table1';

$labelz=mysql_query("$lbl");

$rowlbl = mysql_fetch_array($labelz);

// ----------------------------------------------
echo "<center><table >";
echo "<thead><tr><td><b>".$rowlbl['field1']."</td><td><b>Papar Surat</td><td><b>".$rowlbl['field2']."</td><td><b>".$rowlbl['field3']."</td><td><b>".$rowlbl['field4']."</td><td><b>".$rowlbl['field5']."</td><td><b>".$rowlbl['field6']."</td><td><b>".$rowlbl['field7']."</td><td><b>".$rowlbl['field8']."</td><td><b>".$rowlbl['field9']."</td><td><b>Edit</td><td><b>Delete</td></tr></thead>";
while($row = mysql_fetch_array($result))
  {
echo "<tr>";

if (!empty($row[10])) { echo "<td><b>$row[1]</b></td>";} 
$fileasm='upload/'.$row[1].'/'.$row[9].'/'.$row[10];
 $ext = substr($fileasm, strrpos($fileasm, '.') + 1);
 echo "<td><a href='upload/$row[1]/$row[9]/$row[10]' target=new>
<img src='img/".$ext .".png'></a></td>";
if (!empty($row[2])) { echo "</td><td>$row[2]</td>";} else { echo "<td>..</td>";}
if (!empty($row[3])) { echo "<td>$row[3]</td>";} else { echo "<td></td>";}
if (!empty($row[4])) { echo "<td>$row[4]</td>";} else { echo "<td></td>";}
if (!empty($row[5])) { echo "<td>$row[5]</td>";} else { echo "<td></td>";}
if (!empty($row[6])) { echo "<td>$row[6]</td>";} else { echo "<td></td>";}
if (!empty($row[7])) { echo "<td>$row[7]</td>";} else { echo "<td></td>";}
if (!empty($row[8])) { echo "<td> $row[8]</td>";} else { echo "<td></td>";}
if (!empty($row[9])) { echo "<td> $row[9]</td>";} else { echo "<td></td>";}


//if ($_SESSION['user']=="admin"){

echo "<td><a href='edit.php?id=$row[id]'><img src='img/edittt.png'></a></td>";

echo "<td><a href='dell.php?id=$row[id]&which=".$fileasm."'><img src='img/deleteee.png'></a></td></tr>";
//}

}

echo "</table>";
mysql_close($con);

}
?> 
