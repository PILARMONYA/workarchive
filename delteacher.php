	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM teacher  WHERE idteacher=$id");



?>
 <script language="javascript">
 location.href='teacher.php';
 </script>
