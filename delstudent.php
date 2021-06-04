	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM student  WHERE idstudent=$id");



?>
 <script language="javascript">
 location.href='student.php';
 </script>
