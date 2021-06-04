<?
require "option.php";//файл с параметрами подключения к БД


$step=$_REQUEST["step"];


if ($step==2)
{
$upd=$_REQUEST["upd"];
$id=$_REQUEST["id"];


$login =  $_POST["login"];
$parol =  $_POST["parol"];
$teacher =  $_POST["teacher"];
$degree =  $_POST["degree"];
$phone =  $_POST["phone"];
$idchair =  $_POST["idchair"];
$seniority =  $_POST["seniority"];
$mail =  $_POST["mail"];

$idchair =  $_POST["idchair"];

if ( ($teacher=="") or ($phone=="")or ($phone=="")or ($login=="")or ($parol=="") ) 
{
?>
<meta http-equiv="content-type" content="text/html; charset=utf8" />
	 <script language="javascript">
	 alert ('Введите обязательные для ввода даннные!');
 	 history.back();
	 </script>
<?
exit();
}



  	 

  if ($upd==1)
	{
	 mysql_query("UPDATE teacher SET  idchair =  $idchair, degree='$degree', login='$login', parol='$parol', teacher='$teacher', degree='$degree', phone='$phone', seniority='$seniority', mail='$mail' where idteacher=$id");		

	}
else
  {//формирование SQL-запроса на добавление данных
	  	 mysql_query("insert into teacher (idchair, login, parol, teacher, degree, phone, seniority, mail) values ($idchair,'$login', '$parol', '$teacher', '$degree', '$phone', '$seniority', '$mail')");

	 }
	 

?>
 <script language="javascript">
 location.href='teacher.php';
 </script>
<?


 
}

?>
<!DOCTYPE html>

<head>
<title>Пользователи</title>
<meta http-equiv="content-type" content="text/html; charset=utf8" />
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
               <li><a href="about.php">О сайте</a></li>
               <li><a href="contacts.php">Контакты</a></li>
               <li class="current"><a href="teacher.php">Пользователи</a></li>
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


<?
$step=$_REQUEST["step"];
$upd=$_REQUEST["upd"];
date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d");
if ($upd==1)
{
$Arr=$_REQUEST["Arr"];
$r=mysql_query("SELECT * FROM teacher where idteacher="."$Arr[0]");
$f=mysql_fetch_array($r);//считывание текующей записи
}
  ?>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
<?      if ($upd==1)
{
?>
        <h3>Редактирование пользователя (режим администратора)</h3>   
<?
}
else
{
?>
        <h3>Добавление пользователя (режим администратора)</h3>   
<?
}
?>          
      </div>
 
      <div  class="grid_12">

<form name="form2" method="post"  enctype="multipart/form-data" >
				  <table  border="0" align="">
                                   
                    <tr>
                      <td ><font color="#000000" >   ФИО: </font> </td>
                      <td><input   name="teacher"   type="text"  value="<? if ($upd==1) echo "$f[teacher]"; else echo(""); ?>" size="40" ></td>
                    </tr>           
                      	                                                                 
                    
                      
<tr> 
 <td><font color="#000000" >   Кафедра: </font></td>
        <td ><select name="idchair"  style="height:22; width:auto" >
  <?

$d=mysql_query( "select * from chair");
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idchair"];
	if ($m["idchair"]==$f["idchair"])
	 echo " selected=selected";
	echo ">".$m["chair"];
	echo "</option>";	 		
  }
  
?>
					  
          </select></td>
                    </tr>                    



                  	<tr>
                      <td><font color="#000000" > Степень: </font> </td>
                      <td><input   name="degree"  value="<? if ($upd==1) echo "$f[degree]"; else echo(""); ?>"   type="text" size="40"></td>
                    </tr>  			
                  	<tr>
                      <td><font color="#000000" > Телефон: </font> </td>
                      <td><input   name="phone"  value="<? if ($upd==1) echo "$f[phone]"; else echo(""); ?>"   type="text" size="40"></td>
                    </tr> 
                  	<tr>
                      <td><font color="#000000" > Почта: </font> </td>
                      <td><input   name="mail"  value="<? if ($upd==1) echo "$f[mail]"; else echo(""); ?>"   type="text" size="40"></td>
                    </tr>                     
                    <tr>
                      <td ><font color="#000000" >   Стаж: </font> </td>
                      <td><input   name="seniority"  value="<? if ($upd==1) echo "$f[mail]"; else echo(""); ?>"   type="text" size="40"></td>                      
                    </tr>  
                               
                    <tr>
                      <td ><font color="#000000" >   Логин: </font> </td>
                      <td><input   name="login"   type="text"  value="<? if ($upd==1) echo "$f[login]"; else echo(""); ?>" size="40" ></td>
                    </tr>                       	                    	  
			         <tr>
                      <td><font color="#000000" >  Пароль: </font> </td>
                      <td><input   name="parol"    value="<? if ($upd==1) echo "$f[parol]"; else echo(""); ?>" size="40" ></td>
                    </tr>   
                      
                 
                  </table>
				<br>
				<input  type="button"  name="button"   onclick="this.form.action='updteacher.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$Arr[0]";?>'; this.form.submit();"   value="OK" width="500">
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
  <div class="container">
    <div class="row">
      <div class="grid_12"> 
        <div class="copyright"> <a href="#">Все права защищены</a>
        </div>
      </div>
    </div>
  </div>  
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>


