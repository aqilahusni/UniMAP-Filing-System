﻿<?php
session_regenerate_id(TRUE);
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: '.mysql_error());
  }
mysql_select_db('tncpni',$con);

$table='table2';

//-----------user level in members table not in use---------
$admin="admin";
//-------------------------------------------------

?>