<?php
include "config.php";
$date="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// ----------------security-----------------


function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// ----------prepare for new contract name with year or without---------

$a1= clean($_POST["field1"]);

// ---------------------------------

If(!file_exists("upload")){mkdir("upload"); } 
If(!file_exists("upload/$a1")){mkdir("upload/$a1"); } 

// ------------------------------------
$a2= clean($_POST["field2"]);
$a3= clean($_POST["field3"]);
$a4= $_POST["field4"];
$a5= $_POST["field5"];
$a6= $_POST["field6"];
$a7= $_POST["field7"];
$a8= $_POST["field8"];
$a9= $_POST["field9"];
If(!file_exists("upload/$a1/$a9")){mkdir("upload/$a1/$a9"); } 

// /////////////////////////////////////////////////////////////
//Сheck that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {

 //Check if the file is rar folder 
  $filename = basename($_FILES['uploaded_file']['name']);


    //Determine the path to which we want to save this file
      $newname = dirname(__FILE__).'upload/$a1/$a9'."/".$filename;
 //Check if the file with the same name is already exists on the server
      if (!file_exists($newname)) {
$a10=$filename;
//--------------------------
$filename = basename($_FILES['uploaded_file']['name']);
 $newname = dirname(__FILE__).'/upload/'.$a1.'/'.$a9.'/'.$filename;
         
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);
$aa=mysql_query("INSERT INTO table2 (field1,field2,field3,field4,field5,field6,field7,field8,field9,field10) VALUES ('$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10')"); 
if (!$aa) {echo "Error occured !".mysql_error(); exit;}

echo "<script language='javascript'>
	alert('A new document is added successfully');
	window.location = 'show.php';
	</script>";
 } else {
         echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
      }


} else {
 echo "Error: No file uploaded";
}


mysql_close($con);

}

?> 
</body> 
</html> 
