<?
require "option.php";//файл с параметрами подключения к БД
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Работы</title>
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
               <li class="current"><a href="#" >Работы</a></li>     
             
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
        <h3>Работы (режим преподавателя)</h3>       
      </div>
 
      <div class="grid_12">
        

<form name="form2"  method="post"  >
 
   <?
		$filter=$_GET["filter"];//считывание параметра фильтра
		$sort=$_GET["sort"];//считывание параметра фильтра		


$s="SELECT theme.*, student, subject, teacher FROM theme, student, subject, teacher where student.idstudent=theme.idstudent  and teacher.idteacher=theme.idteacher  and  subject.idsubject=theme.idsubject" ;

if ($filter==1)/*есть ли фильтрация данных*/
{ 
$value1 = $_POST['FilterValue1'];//значение первого поля
$s=$s." and UPPER(theme)" ;
if ($value1!="Все")
$s=$s." LIKE UPPER('%$value1"."%')  ";
else
$s=$s."=UPPER(theme) ";


$value2 = $_POST['FilterValue2'];//значение первого поля
$s=$s." and UPPER(student)" ;
if ($value2!="Все")
$s=$s." LIKE UPPER('%$value2"."%')  ";
else
$s=$s."=UPPER(student) ";
}





if ($sort==1)/*есть ли сортировка данных*/
{
$fieldsort = $_POST['sortname'];//первое поле
$s=$s." order by $fieldsort";
}
else
$s=$s." order by theme";



$r=mysql_query($s);
	 ?>
         
     		<div align="right">	
Сортировка:
				<select name="sortname"  style="height:22; width:auto" onChange="this.form.action='themeteacher.php?sort=1&filter=<? echo $filter;?>'; this.form.submit();" >
    
								  <option value="theme"  <? if ($fieldsort=="theme") {?> selected="selected" <? }?>>Тема </option>
                                  <option value="teacher"  <? if ($fieldsort=="teacher") {?> selected="selected" <? }?> >Преподаватель </option>     	                	              	                                                            
 				 				  <option value="student"  <? if ($fieldsort=="student") {?> selected="selected" <? }?> >Студент </option>                                                      	                                            
				 				  <option value="datetheme"  <? if ($fieldsort=="datetheme") {?> selected="selected" <? }?> >Дата выдачи </option>        
				 				  <option value="datecheck"  <? if ($fieldsort=="datecheck") {?> selected="selected" <? }?> >Дата проверки </option>                        
			  </select>            	
Тема: 
                
				<input   name="FilterValue1"  onFocus="if (this.value=='Все') this.value=''"  value="<? if ($filter==1)/*есть ли фильтрация данных*/ echo "$value1"; else echo("Все"); ?>"  type="text">

Студент: 
                
				<input   name="FilterValue2"  onFocus="if (this.value=='Все') this.value=''"  value="<? if ($filter==1)/*есть ли фильтрация данных*/ echo "$value2"; else echo("Все"); ?>"   type="text">
				<br>
                
                
                

       
             
   


				<input  type="button"  name="button1"  onclick="this.form.action='themeteacher.php?filter=1&sort=<? echo $sort;?>'; this.form.submit();"   value="Фильтр">
				<input  type="button"  name="button2"  onclick="this.form.action='themeteacher.php?filter=0&sort=<? echo $sort;?>'; this.form.submit();"   value="Очистить">
           <br>      
      
          </div>   
 
<input  type="button"  name="button4"   onclick="this.form.action='updthemeteacher.php?upd=0&step=1'; this.form.submit();" value="Добавить">
<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="this.form.action='updthemeteacher.php?upd=1&step=1'; this.form.submit();" value="Редактировать">   
<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="qwest=window.confirm('Вы дествительно хотите удалить запись?');  if (qwest) {this.form.action='delthemeteacher.php'; this.form.submit();}" value="Удалить">



<table WIDTH=100% border="1" cellspacing=0 cellpadding=2  >
									<tr >
		<td ><font color=white>&nbsp;</font></td>                                     
		<td>Тема</td> 
		<td>Предмет</td> 		
		<td>Преподаватель</td> 
		<td>Студент</td>  
		<td>Дата выдачи</td>  
		<td>Дата проверки</td>  				
		<td>Результат</td>  		
 		<td>Файл</td>                             
 
                      
                            

		</tr>
        
        
      <?
		 


			for ($i=0;$i<mysql_num_rows($r);$i++)//вывод данных в цикле по количеству записей
			  {
				$f=mysql_fetch_array($r);//считывание текующей записи				
				echo "<tr>";

			
	if ( ($i==0) || ($f["idtheme"]==$idtheme) )
    echo "<td><input type=radio checked=checked name=ArrTheme[] value=".$f["idtheme"]."> </td>";
	else
    echo "<td><input type=radio name=ArrTheme[] value=".$f["idtheme"]."> </td>";				
				echo "
				<td> $f[theme]</td>								
				<td> $f[subject]</td>										
				<td> $f[teacher]</td>
				<td> $f[student]</td>
				<td> $f[datetheme]</td>		
				<td> $f[datecheck]</td>";	
				if ($f[result]==0)	
				echo "<td> Без оценки</td>	";
				else
				echo "<td> $f[result]</td>	";
				echo "<td> <a href='upload/".$f [file]."'> $f[file]</a> &nbsp; </td>";						
				echo "</tr>";
			  }		 
		?>
      
  </table> 


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