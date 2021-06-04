<?php
$mode=$_COOKIE["mode"];  

$idstudent=$_COOKIE["idstudent"];  
$idteacher=$_COOKIE["idteacher"];  
$fio=$_COOKIE["fio"];  



$file=$_COOKIE["file"];  
$idtheme=$_COOKIE["idtheme"];  

date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d"); 

$dblocation = "localhost";
$dbname = "workarchive";
$dbuser = "root";
$dbpasswd = "";
$dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);


if (!$dbcnx) 
{  
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?
  echo "Ошибка подключения к серверу";
  exit();
}
if (!@mysql_select_db($dbname, $dbcnx)) 
{
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?	
  echo "Ошибка открытия БД";
  exit();
}

mysql_set_charset("utf-8", $dbcnx);

?>
