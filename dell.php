<?php

include "config.php";
 if (isset($_GET['id'])) {
If(file_exists($_GET['which'])){
mysql_query("DELETE FROM table2 WHERE id = $_GET[id]");
if (! unlink ($_GET['which'])) {
    echo ("Couldn't delete file"); } else {

echo "<script language='javascript'>
	alert('Deleted');
	window.location = 'show.php';
	</script>";

}}
else {echo "<script language='javascript'>
	alert('Cannot be deleted as no such file in directory !');
	window.location = 'show.php';
	</script>";
}
mysql_close($con);}
?> 

</body> 
</html> 
