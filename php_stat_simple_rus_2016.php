<html>
<head>
<meta http-equiv="Content-Type"content="text/html;charset=utf-8">
</head>
<BODY>
<B><font color=red>ОТЧЁТ</FONT></B>
<hr color=red>
<?
//=========================beeline==========================================
$arproviders=array("http://beeline-info.ru/domashnij-internet/");
echo "Сайт"." ". $arproviders[0]."<BR>";
$content=file_get_contents($arproviders[0]);
if($content==NULL){echo "<BR>web-страница ".$arproviders[0]." не найдена! <BR>Локальная загрузка beeline.html!";
$content=file_get_contents("beeline.html");
}
//ZABOR DANNYH
for($i=0;$i<4;$i++){
$len=mb_strlen($content);
$posmarker=mb_strpos($content,'bigcostn pointer">',0,"UTF8")+18;
$content=mb_substr($content,$posmarker,$len,"UTF8");
$posmarker=mb_strpos($content,"</p>",0,"UTF8");

$speed[0][$i]=mb_substr($content,0,$posmarker,"UTF8");
$posmarker=mb_strpos($content,'bigcostn pointer">',0,"UTF8")+18;
$content=mb_substr($content,$posmarker,$len,"UTF8");
$posmarker=mb_strpos($content,"</p>",0,"UTF8");
$price[0][$i]=mb_substr($content,0,$posmarker,"UTF8");
}
//Zatir tv
$speed[0][$i]=mb_substr($content,0,$posmarker,"UTF8");
$posmarker=mb_strpos($content,'bigcostn pointer">',0,"UTF8")+18;
$content=mb_substr($content,$posmarker,$len,"UTF8");
$posmarker=mb_strpos($content,"</p>",0,"UTF8");
$price[0][$i]=mb_substr($content,0,$posmarker,"UTF8");

for ($i=0; $i<4;$i++)
{
$srcena[$i]=$price[0][$i]/$speed[0][$i];
echo "<BR>Скорость/стоимость/цена за 1Мб - ".$speed[0][$i]."/".$price[0][$i]."/".$srcena[$i];
}
//----------
$fp = fopen("statistic.txt", "a"); // Открываем файл в режиме записи 
$today = date("d.m.y");
$test = fwrite($fp, "\r\n".$today." ".$arproviders[0]);
for ($i=0; $i<4;$i++)
{
$srcena[$i]=$price[0][$i]/$speed[0][$i];
$test = fwrite($fp, "\r\nСкорость/стоимость/цена за 1Мб - ".$speed[0][$i]."/".$price[0][$i]."/".$srcena[$i]);
}
if (!$test) echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла
//----------
if (file_exists("statistic.csv")) $flag=1; else $flag=0;
$fp = fopen("statistic.csv", "a"); // Открываем файл в режиме записи 
$today = date("d.m.y");
if (!$flag) $test = fwrite($fp, "Дата;Провайдер;Скорость;Стоимость;Цена за Мб;");
for ($i=0; $i<4;$i++)
{
$srcena[$i]=$price[0][$i]/$speed[0][$i];
$srcena[$i] = str_replace(".", ",", $srcena[$i]);
fwrite($fp, "\r\n".$today.";Билайн (СПб);".$speed[0][$i].";".$price[0][$i].";".$srcena[$i].";");
}
if (!$test) echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла

//=============================sumtel=======================================
$arproviders=array("http://spb.sumtel.ru/#/abonement");
echo "<BR>"."<BR>"."Сайт ".$arproviders[0]."<BR>";
$content=file_get_contents($arproviders[0]);
if($content==NULL){echo "<BR>web-страница ".$arproviders[0]." не найдена! <BR>Локальная загрузка!";
$content=file_get_contents("sumtel.html");
}

//ZABOR DANNYH 
for($i=0;$i<6;$i++){
$len=mb_strlen($content);
$posmarker=mb_strpos($content,'class="body"',0,"UTF8")+235;
$content=mb_substr($content,$posmarker,$len,"UTF8");
$posmarker=mb_strpos($content,"</span>",0,"UTF8");

$price[1][$i]=mb_substr($content,0,$posmarker,"UTF8");
$posmarker=mb_strpos($content,'class="c1"><span>',0,"UTF8")+17;
$content=mb_substr($content,$posmarker,$len,"UTF8");
$posmarker=mb_strpos($content,"</span>",0,"UTF8");
$speed[1][$i]=mb_substr($content,0,$posmarker,"UTF8");
}
for ($i=0; $i<6;$i++)
{
$srcena[$i]=$price[1][$i]/$speed[1][$i];
echo "<BR>Скорость/стоимость/цена за 1Мб - ".$speed[1][$i]."/".$price[1][$i]."/".$srcena[$i];
}

//----------
$fp = fopen("statistic.txt", "a"); // Открываем файл в режиме записи 
$today = date("d.m.y");
$test = fwrite($fp, "\r\n".$today." ".$arproviders[0]);
for ($i=0; $i<6;$i++)
{
$srcena[$i]=$price[1][$i]/$speed[1][$i];
$test = fwrite($fp, "\r\nСкорость/стоимость/цена за 1Мб - ".$speed[1][$i]."/".$price[1][$i]."/".$srcena[$i]);
}
if (!$test) echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла
$fp = fopen("statistic.csv", "a"); // Открываем файл в режиме записи 
$today = date("d.m.y");
for ($i=0; $i<6;$i++)
{
$srcena[$i]=$price[1][$i]/$speed[1][$i];
$srcena[$i] = str_replace(".", ",", $srcena[$i]);
fwrite($fp, "\r\n".$today.";Самтел(СПб);".$speed[1][$i].";".$price[1][$i].";".$srcena[$i].";");
}
if (!$test) echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла


//=================================interzet==================================
$arproviders=array("http://interzet.ru/home/internet.html");
echo "<BR>"."<BR>"."Сайт ".$arproviders[0]."<BR>";
$content=file_get_contents($arproviders[0]);
if($content==NULL){echo "<BR>web-страница ".$arproviders[0]." не найдена! <BR>Локальная загрузка!";
$content=file_get_contents("interzet.html");
}

//ZABOR DANNYH 
$len=mb_strlen($content);
$posmarker=0;
for($i=0;$i<4;$i++)$posmarker=mb_strpos($content,'tarif-box-middle',$i,"UTF8");
$content=mb_substr($content,$posmarker,$len,"UTF8");
for($i=0;$i<3;$i++){
$len=mb_strlen($content);
$posmarker=mb_strpos($content,'popup-select-option-value',0,"UTF8")+0;
$content=mb_substr($content,$posmarker,$len,"UTF8");
$posmarker=mb_strpos($content,'property="content:encoded"><span>',0,"UTF8")+34;
$content=mb_substr($content,$posmarker,$len,"UTF8");
$posmarker=mb_strpos($content,"</span>",0,"UTF8");

$speed[2][$i]=mb_substr($content,0,$posmarker,"UTF8");
$posmarker=mb_strpos($content,'0price',0,"UTF8")+8;
//echo "<BR>".$posmarker;
$content=mb_substr($content,$posmarker,$len,"UTF8");
//echo "<textarea cols=40 rows=40>".$content."</textarea>";
$posmarker=mb_strpos($content,"<span>",0,"UTF8");
$price[2][$i]=mb_substr($content,0,$posmarker,"UTF8");
}
for ($i=0; $i<3;$i++)
{
if(mb_substr($speed[2][$i],0,1)=='*') $speed[2][$i]=mb_substr($speed[2][$i],1);
$srcena[$i]=$price[2][$i]/$speed[2][$i];
echo "<BR>Скорость/стоимость/цена за 1Мб - ".$speed[2][$i]."/".$price[2][$i]."/".$srcena[$i];
}

//----------
$fp = fopen("statistic.txt", "a"); // Открываем файл в режиме записи 
$today = date("d.m.y");
$test = fwrite($fp, "\r\n".$today." ".$arproviders[0]);
for ($i=0; $i<3;$i++)
{
$srcena[$i]=$price[2][$i]/$speed[2][$i];
$test = fwrite($fp, "\r\nСкорость/стоимость/цена за 1Мб - ".$speed[2][$i]."/".$price[2][$i]."/".$srcena[$i]);
}
if (!$test) echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла
$fp = fopen("statistic.csv", "a"); // Открываем файл в режиме записи 
$today = date("d.m.y");
for ($i=0; $i<3;$i++)
{
$srcena[$i]=$price[2][$i]/$speed[2][$i];
$srcena[$i] = str_replace(".", ",", $srcena[$i]);
fwrite($fp, "\r\n".$today.";Интерзет (СПб);".$speed[2][$i].";".$price[2][$i].";".$srcena[$i].";");
}
if (!$test) echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла

echo '<BR><hr color=red><BR><a style="color:red;" href="statistic.csv">Загрузить отчёт в Excel</a><BR>';
?>
</BODY></HTML>
