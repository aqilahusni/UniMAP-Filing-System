<?php
session_start();
require_once"config.php";
?>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Edit Data</title>
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
	input[type=text]:focus {
	  border: 3px solid blue;
	}
	input[type=text], select {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	input[type=submit] {
	  width: 10%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	input[type=submit]:hover {
	  background-color: #45a049;
	}

	.form {
	  border-radius: 5px;
	  background-color: #f2f2f2;
	  padding: 20px;
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
$attachmentname="";
if (isset($_SESSION['user'])) {
// ------------------import labels --------------------
$lbl='SELECT * FROM table1';

$labelz=mysql_query("$lbl");

$rowlbl = mysql_fetch_array($labelz);

// ----------------------------------------------
if (isset($_GET['id'])) { $wch=$_GET['id']; } else { Exit();}
$sql='SELECT * FROM table2 where id='.$wch;

$result=mysql_query("$sql");
if (!$result) {echo "No results found.".mysql_error(); exit();} 

echo "<center><h3>Update</h3></center>";
echo "<div class='form'><form  method=post name=tncedit action='edithis.php' >";
while($row = mysql_fetch_array($result))
  {

echo "<input type=hidden value=$wch name=id >";

if (!empty($row[1])) { echo "<label for='field1'><b>".$rowlbl['field1']."</label>
							 <input type=text id='field1' value='$row[1]' name='field1'>";} 
if (!empty($row[2])) { echo "<label for='field2'><b>".$rowlbl['field2']."</label>
							 <input type=text id='field2' value='$row[2]' name='field2' readonly";}
if (!empty($row[3])) { echo "<label for='field3'><b>".$rowlbl['field3']."</label>
							 <input type=text id='field3' value='$row[3]' name='field3' readonly";}
if (!empty($row[4])) { echo "<label for='field4'><b>".$rowlbl['field4']."</label>
							 <input type=text id='field4' value='$row[4]' name='field4'>";} 
if (!empty($row[5])) { echo "<label for='field5'><b>".$rowlbl['field5']."</label>
							 <input type=text id='field5' value='$row[5]' name=field5 readonly>";}
if (!empty($row[6])) { echo "<label for='field6'><b>".$rowlbl['field6']."</label>
							 <input type=text id='field6' value='$row[6]' name='field6'>";} 
if (!empty($row[7])) { echo "<label for='field7'><b>".$rowlbl['field7']."</label>
							 <input type=text id='field7' value='$row[7]' name='field7'>";} 
if (!empty($row[8])) { echo "<label for='field8'>".$rowlbl['field8']."</label>
							 <select id='field8' name='field8'>
							 <option>$row[8]</option>
							 <option>Selesai</option>
							 <option>Dikembalikan kepada</option>
							 <option>KIV</option>
							 <option>Dipanjangkan kepada</option>
							 <option>Dalam Proses</option>
							 <option>Untuk Makluman</option>
							 <option>Lain-Lain</option></select>" ;} 
if (!empty($row[9])) { echo "<label for='field9'><b>".$rowlbl['field9']."</label>
							 <input type=text id='field9' value='$row[9]' name='field9'>";} 
echo "<input type=submit value='Update'>";
echo "&nbsp;&nbsp;&nbsp;<a href='show.php'>Cancel</a></form>";
echo "</td></tr></div>";
}

mysql_close($con);

}
else {echo "Back";}
?> 
