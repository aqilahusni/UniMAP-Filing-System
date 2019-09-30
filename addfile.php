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
	  width: 100%;
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
<script language='JavaScript'>
    function ValidateForm() {
        var Check = 0;
		if (document.tnc.uploaded_file.value == '') { Check = 1; }
		if (document.tnc.field1.value == '') { Check = 1; }
		if (document.tnc.field2.value == '') { Check = 1; }
		if (document.tnc.field3.value == '') { Check = 1; }
		if (document.tnc.field4.value == '') { Check = 1; }
		if (document.tnc.field5.value == '') { Check = 1; }
		if (document.tnc.field6.value == '') { Check = 1; }
		if (document.tnc.field7.value == '') { Check = 1; }
		if (document.tnc.field8.value == '') { Check = 1; }
		if (document.tnc.field9.value == '') { Check = 1; }

        if (Check == 1) {
            alert(" All fields are required ");
            return false;
        } else {
            document.tnc.submit.disabled = true;
            return true;
        }
    }
   
      function dont(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	  function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.marginLeft = "250px";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	}
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


<?php

if (isset($_SESSION['user'])) {
// ------------------import labels --------------------
$lbl='SELECT * FROM table1';

$labelz=mysql_query("$lbl");

$rowlbl = mysql_fetch_array($labelz);

// ----------------------------------------------
echo "<div class='form'>";
echo "<form  method=post name=tnc action='insert.php' enctype='multipart/form-data'
 onSubmit='return ValidateForm()'<h3>Data Entry:<br><br>";
// --------------------------------------
$sqlcont='SELECT DISTINCT field1 FROM table2';

$result=mysql_query("$sqlcont");
if (!$result) {echo "No results found ".mysql_error(); exit();} 

echo "<label for='field1'><b>".$rowlbl['field1']."</label>
      <input type=text id='field1' name='field1'><br><br>";
echo "<label for='field2'><b>".$rowlbl['field2']."</label>
      <input type=date id='field2' name='field2' value='".date('d-m-Y')."'>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='field3'><b>".$rowlbl['field3']."</label>
      <input type=date id='field3' name='field3' value='".date('d-m-Y')."'>";
echo "<br><br><label for='field4'><b>".$rowlbl['field4']."</label>
      <input type=text id='field4' name='field4'><br><br>";
echo "<label for='field5'>".$rowlbl['field5']."</label>
      <select id='field5' name='field5'>
	  <option>NAIB CANSELOR</option>
	  <option>TNC(AKADEMIK & ANTARABANGSA)</option>
	  <option>TNC(HEPA)</option>
	  <option>PNC(KEUSAHAWANAN & KELESTARIAN KEWANGAN)</option>
	  <option>PERPUSTAKAAN</option>
      <option>PENDAFTAR</option>
	  <option>PEMBANGUNAN</option>
	  <option>BENDAHARI</option>
	  <option>KESELAMATAN</option>
	  <option>PUSAT TEKNOLOGI MAKLUMAT & KOMUNIKASI</option>
	  <option>PUSAT HAL EHWAL ANTARABANGSA</option>
	  <option>PUSAT ISLAM</option>
	  <option>PUSAT KESIHATAN</option>
	  <option>CIGC</option>
	  <option>LAIN-LAIN</option></select>"; 
echo "<label for='field6'><b>".$rowlbl['field6']."</label>
      <input type=text id='field6' name='field6'>";
echo "<label for='field7'><b>".$rowlbl['field7']."</label>
      <input type=text id='field7' name='field7'>";	  
echo "<label for='field8'>".$rowlbl['field8']."</label>
      <select id='field8' name='field8'>
	  <option>Selesai </option>
	  <option>Dikembalikan kepada</option>
	  <option>KIV</option>
	  <option>Dipanjangkan kepada</option>
	  <option>Dalam Proses</option>
	  <option>Untuk Makluman</option>
	  <option>Lain-Lain</option></select>";
echo "<label for='field9'><b>".$rowlbl['field9']."</label>
      <input type=text id='field9' name='field9'>";	
echo "<br>Muat Naik Fail<br><input type='file' name='uploaded_file'><br><br>";
echo "<center><input type='submit' value='Submit'></form>"; }
echo"</div><br>";

?>