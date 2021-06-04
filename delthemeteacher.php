	<?
require "option.php";

$Arr=$_POST['ArrTheme'];
$id=$Arr[0];
mysql_query("DELETE FROM theme  WHERE idtheme=$id");



?>
 <script language="javascript">
 location.href='themeteacher.php';
 </script>
