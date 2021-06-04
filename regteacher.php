<?
require "option.php";//файл с параметрами подключения к БД

$step=$_REQUEST["step"];

if ($step==2)
{

$login =  $_POST["login"];
$teacher =  $_POST["teacher"];
$degree =  $_POST["degree"];
$phone =  $_POST["phone"];
$idchair =  $_POST["idchair"];
$seniority =  $_POST["seniority"];
$mail =  $_POST["mail"];

$newparol =  $_POST["newparol"];
$repparol =  $_POST["repparol"];

if ( ($login=="") or ($teacher=="") or ($phone=="")or ($degree=="") or ($newparol=="") or ($repparol=="") ) 
{
?>

	 <script language="javascript">
	 alert ('Введите обязательные для ввода даннные!');
 	 history.back();
	 </script>
<?
}

	
$SET_teacher=mysql_query("select * from teacher where login='$login'");
$COUNT_teacher=mysql_num_rows($SET_teacher);

if ($COUNT_teacher!=0)
{
?>
<script language="javascript">
alert("Преподаватель с таким логином уже существует!");
history.back();
</script>
<?
} 



if ($newparol!=$repparol) 
{
?>

	 <script language="javascript">
	 alert ('Повторите ввод пароля корректно!');
 	 history.back();
	 </script>
<?
}





	  	 mysql_query("insert into teacher (idchair, login, parol, teacher, degree, phone, seniority, mail) values ($idchair,'$login', '$newparol', '$teacher', '$degree', '$phone', '$seniority', '$mail')");


?>

	 <script language="javascript">
	 alert ('Профиль сохранён.');
 	location.href='index.php';
	 </script>
<?



 
}



?>
<!DOCTYPE html>

<head>
<title>Регистрация преподавателя</title>
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
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
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

               <li class="current"><a href="#">Регистрация преподавателя</a></li>
   
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

        <h3>Регистрация</h3>   
         
      </div>
 
      <div  class="grid_12">

<form name="form2" method="post"  enctype="multipart/form-data" >
				  <table width="" border="0" align="">

	                           
                    <tr>
                      <td ><font color="#000000" >   ФИО*: </font> </td>
                      <td><input   name="teacher"   type="text"   size="40" ></td>
                    </tr>
<tr> 
 <td><font color="#000000" >   Кафедра*: </font></td>
        <td width=""><select name="idchair"  style="height:22; width:auto" >
  <?

$d=mysql_query( "select * from chair");
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idchair"];

	echo ">".$m["chair"];
	echo "</option>";	 		
  }
  
?>
					  
          </select></td>
                    </tr>                         	                                                                 
                    <tr>
                      <td><font color="#000000" > Степень*: </font> </td>
                      <td><input   name="degree"     type="text" ></td>
                    </tr>  			
                  	<tr>
                      <td><font color="#000000" > Телефон*: </font> </td>
                      <td><input   name="phone"    type="text" ></td>
                    </tr> 
                  	<tr>
                      <td><font color="#000000" > Почта: </font> </td>
                      <td><input   name="mail"    type="text" ></td>
                    </tr>                     
                    <tr>
                      <td ><font color="#000000" >   Стаж: </font> </td>
                      <td><input   name="seniority"   type="text"  size="40" ></td>
                    </tr>      
                    <tr>
                      <td ><font color="#000000" >   Логин*: </font> </td>
                      <td><input   name="login"   type="text"   size="40" ></td>
                    </tr>                                         	                    	  
			         <tr>
                      <td><font color="#000000" >  Пароль*: </font> </td>
                      <td><input   name="newparol"   type="password" size="40" ></td>
                    </tr>  	    
                     <tr>
                      <td ><font color="#000000" >  Повторите пароль*: </font> </td>
                      <td><input   name="repparol"    type="password"   size="40" ></td>
                    </tr>  	
                                                                
                  </table>


				<br>
				<input  type="button"  name="button"   onclick="this.form.action='regteacher.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$Arr[0]";?>'; this.form.submit();"   value="OK" width="500">
				<input  type="button"  name="button"  onClick="location.href='index.php';"  value="Отмена">

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

