	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM squad  WHERE idsquad=$id");



?>
 <script language="javascript">
 location.href='squad.php';
 </script>
