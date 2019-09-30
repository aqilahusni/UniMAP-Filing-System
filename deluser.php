<?php
include "config.php";

 if (isset($_POST['user2del']) && ($_POST['user2del'] !="admin")) {
$killthis=$_POST['user2del'];


$query = "SELECT username FROM members WHERE username = '$killthis' ";
$result = mysql_query($query) or die(mysql_error());
		  
  if(mysql_num_rows($result)==1) { 

$aa=mysql_query("DELETE FROM members WHERE username='$killthis'");
if (!$aa) {echo "Error occured.".mysql_error(); exit;}else {

echo "<script language='javascript'>
	alert('was Deleted');
	window.location = 'show.php';
	</script>";

} } 

mysql_close($con);} else {
echo "<script language='javascript'>
	alert('Admin cannot be removed');
	window.location = 'reg.php';
	</script>";
}

?> 
</body> 
</html> 


   