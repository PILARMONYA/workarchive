<?
require "option.php";//файл с параметрами подключения к БД

if (isset ($_POST['ArrTheme']))
{
 $Arr=$_POST['ArrTheme'];
 $idtheme=$Arr[0];
 setcookie ( 'idtheme', $idtheme); 
}

$step=$_REQUEST["step"];
$upd=$_REQUEST["upd"];
$now=date("Y")."-".date("m")."-".date("d");   

if ($step==1)
setcookie ('file', '');


if ($step==3)
{
setcookie ( 'file', basename($_FILES["file"]["name"]));	

$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename($_FILES["file"]["name"]);
$uploadfile =iconv('utf-8', 'windows-1251', $uploadfile );			


if ( ($_FILES["file"]['size'] > 1993216) || ($_FILES["file"]['size'] <= 0) )
{
?>
	 <script language="javascript">
	 alert ('Слишком большой файл! <? echo $_FILES["file"]['size'];?>, <? echo basename($_FILES["file"]['name']);?>');
	 history.back();
	 </script>
<?
}
else
if (move_uploaded_file($_FILES["file"]['tmp_name'], $uploadfile)) 
{
?>
	 <script language="javascript">
	 alert ('Файл корректен и был успешно загружен');
	 history.back();
	 </script>
<?
}
 else 
{
?>
	 <script language="javascript">
	 alert ('Возможная атака с помощью файловой загрузки!');
	 history.back();
	 </script>
<?
} 

}

$file=$_COOKIE["file"];


if ($step==2)
{

//считываем данные из формы
$idstudent =  $_POST["idstudent"];
$idsubject =  $_POST["idsubject"];
$result =  $_POST["result"];
$datetheme =  $_POST["datetheme"];
$datecheck =  $_POST["datecheck"];
$theme =  $_POST["theme"];

if ($file==NULL)
$file="";


if ( $theme=="")
{
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	 <script language="javascript">
	 alert ('Введите тему задания!');
 	 history.back();
	 </script>
<?
	 exit();
}
	
  if ($upd==1)
	{
		if ($file=="")
			mysql_query("UPDATE theme SET  theme='$theme', idstudent='$idstudent',idsubject='$idsubject', result='$result', datetheme='$datetheme', datecheck='$datecheck' where idtheme=$idtheme");				
		else
	mysql_query("UPDATE theme SET  theme='$theme', idstudent='$idstudent', file='$file',  idsubject='$idsubject', result='$result', datetheme='$datetheme', datecheck='$datecheck' where idtheme=$idtheme");				
	}
else
  {//формирование SQL-запроса на добавление данных
	 mysql_query("INSERT INTO theme (theme, idteacher, idstudent,  idsubject, result, datetheme, datecheck) VALUES ('$theme', '$idteacher', '$idstudent', '$idsubject', '$result', '$datetheme', '$datecheck')");
	 setcookie ( 'idtheme', mysql_insert_id()); 
  }	
	?>
	 <script language="javascript">
	 location.href='themeteacher.php?filter=0';
	 </script>
	 <?
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Редактирование задания</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="format-detection" content="telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/TMForm.js"></script>
<script src="js/modal.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});  
 }); 
</script>
<!--[if lt IE 8]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outlogind browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<![endif]-->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<!--==============================
              header
=================================-->
<header>
  <div class="container">
    <div class="row">
      <div class="grid_12 rel">
        <h1>
          <a href="index.php">
            <img src="images/logo.png" alt="Logo alt">
          </a>
        </h1>
      </div>
    </div>
  </div>
  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container">
      <div class="row">
        <div class="grid_12 ">
          <div class="navigation ">
            <nav>
              <ul class="sf-menu">
               <li><a href="index.php">Главная</a></li>
               <li class="current"><a href="themeteacher.php" >Работы</a></li>     
             
<?
if ($mode!="")
{
?> 
               <li><a href="#"><? echo "$fio ($mode)";?> </a></li>
<?
}
?>
             
             </ul>
            </nav>
            <div class="clear"></div>
          </div>       
         <div class="clear"></div>  
        </div>
     </div> 
    </div> 
  </section>
</header>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
      <?
      if ($upd==1)
{
?>
        <h3>Редактирование задания (режим преподавателя)</h3>      
   <?
   }
   else
   {
   ?>
          <h3>Добавление задания (режим преподавателя)</h3>     

   <?
   }
   ?> 
      </div>
 


      <div class="grid_12">
        

<?
$upd=$_REQUEST["upd"];

if ($upd==1)
{
$s="SELECT theme.*, teacher FROM theme, teacher where teacher.idteacher=theme.idteacher and idtheme=$idtheme";
$r=mysql_query($s);
$f=mysql_fetch_array($r);//считывание текующей записи	
?>

<h1><? echo "Редактирование раздела: $f[theme]. Преподаватель: $f[teacher]" ?></h1>
<?
}
 
   



?>


<form name="form2"   method="post"  enctype="multipart/form-data">
				  <table width="622" border="0">

                    <tr>
                      <td><font   color="#000000" > Файл: </font></td>
                      <td> 

						 <input name="file" type="file" size="19" />  
                         <input type="button"  name="button"  value="Загрузить" 
                         onClick="this.form.action='updthemeteacher.php?step=3'; this.form.submit();">
                      </td>
                    </tr> 
                    
                         <tr>
                      <td><font color="#000000" > Тема работы: </font> </td>
                      <td><input     name="theme" size="30"   value="<? if ($upd==1) echo $f['theme']; else echo(""); ?>"    type="text" ></td>
                    </tr> 
     <tr> 
 <td><font color="#000000" >   Студент: </font></td>
        <td ><select name="idstudent"  style="height:22; width:auto" >
  <?

$d=mysql_query( "select * from student");
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idstudent"];
	if ($m["idstudent"]==$f["idstudent"])
	 echo " selected=selected";
	echo ">".$m["student"];
	echo "</option>";	 		
  }
  
?>
					  
          </select></td>
                    </tr>     
       <tr> 
 <td><font color="#000000" >   Предмет: </font></td>
        <td ><select name="idsubject"  style="height:22; width:auto" >
  <?

$d=mysql_query( "select * from subject");
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idsubject"];
	if ($m["idsubject"]==$f["idsubject"])
	 echo " selected=selected";
	echo ">".$m["subject"];
	echo "</option>";	 		
  }
  
?>
					  
          </select></td>
                    </tr>               
                                               
 	                   
                     <tr>
                      <td><font color="#000000" > Дата выдачи: </font> </td>
                      <td><input   type="date"  name="datetheme" size="30"   value="<? if ($upd==1) echo $f['datetheme']; else echo("$now"); ?>"    type="text" ></td>
                    </tr>  
                    <tr>
                      <td><font color="#000000" > Дата проверки: </font> </td>
                      <td><input   type="date"  name="datecheck" size="30"   value="<? if ($upd==1) echo $f['datecheck']; else echo("$now"); ?>"    type="text" ></td>
                    </tr>  
    <tr>
                      <td><font color="#000000" >   Оценка: </font></td>
                      <td>
                 <select  name="result"  style="height:22; width:auto"    >
                                     <option  <? if ($f["result"]==NULL)	 echo " selected=selected"; ?> value="NULL"    >Без оценки </option>	    
					<option <? if ($f["result"]==5)	 echo " selected=selected"; ?>  value="5"  >5 </option>	
					<option <? if ($f["result"]==4)	 echo " selected=selected"; ?>  value="4"     >4 </option>	            
                   			 <option  <? if ($f["result"]==3)	 echo " selected=selected"; ?> value="3"    >3 </option>	   
                   			 <option  <? if ($f["result"]==2)	 echo " selected=selected"; ?> value="2"    >2 </option>	   
                                             																				
				</select>                    
				      </td> 
                      </tr>                                                          
                  </table>
				<br>
				<input  type="button"  name="button"   onclick="this.form.action='updthemeteacher.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$Arr[0]";?>'; this.form.submit();"   value="OK" width="500">
				<input  type="button"  name="button"  onClick="javascript:history.back();"  value="Отмена">

		</form>	
      </div>
    </div>
  </div>
</section>
<!--==============================
              footer
=================================-->
<footer id="footer">
  <div class="container" align="center">
    <div class="row">
      <div class="grid_12"> 
        <div class="copyright"><a href="#">Все права защищены</a>
        </div>
    </div>
  </div>  
  </div>
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>