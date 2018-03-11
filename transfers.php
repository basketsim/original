<?php
$expandmenu1=917;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparep = mysql_query("SELECT club, lang, supporter FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)){
$chlab = mysql_result ($comparep,0,"club");
$lang = mysql_result ($comparep,0,"lang");
$suzp = mysql_result ($comparep,0,"supporter");
} else {die(include 'basketsim.php');}

setcookie("bstmk1", "$bstmk1", time()-36000);
$position = $_REQUEST['position'];
$deadline = $_REQUEST['deadline'];
$league=0;
$bornn = $_REQUEST['bornn'];
$bornn = trim($bornn);
$min_age = $_REQUEST['min_age'];
$max_age = $_REQUEST['max_age'];
$min_height = $_REQUEST['min_height'];
$max_height = $_REQUEST['max_height'];
$min_weight = $_REQUEST['min_weight'];
$max_weight = $_REQUEST['max_weight'];
$min_wage = $_REQUEST['min_wage'];
$min_wage = str_replace(".","",$min_wage);
$min_wage = str_replace(" ","",$min_wage);
$max_wage = $_REQUEST['max_wage'];
$max_wage = str_replace(".","",$max_wage);
$max_wage = str_replace(" ","",$max_wage);
$min_price = $_REQUEST['min_price'];
$min_price = str_replace(".","",$min_price);
$min_price = str_replace(" ","",$min_price);
$max_price = $_REQUEST['max_price'];
$max_price = str_replace(".","",$max_price);
$max_price = str_replace(" ","",$max_price);
$character = $_REQUEST['character'];
$skill1 = $_REQUEST['skill1'];
$skill1_min = $_REQUEST['skill1_min'];
$skill1_max = $_REQUEST['skill1_max'];
$skill2 = $_REQUEST['skill2'];
$skill2_min = $_REQUEST['skill2_min'];
$skill2_max = $_REQUEST['skill2_max'];
$skill3 = $_REQUEST['skill3'];
$skill3_min = $_REQUEST['skill3_min'];
$skill3_max = $_REQUEST['skill3_max'];
$skill4 = $_REQUEST['skill4'];
$skill4_min = $_REQUEST['skill4_min'];
$skill4_max = $_REQUEST['skill4_max'];
$skill5 = $_REQUEST['skill5'];
$skill5_min = $_REQUEST['skill5_min'];
$skill5_max = $_REQUEST['skill5_max'];
$bstmk1=$position."/-".$deadline."/-".$league."/-".$bornn."/-".$min_age."/-".$max_age."/-".$min_height."/-".$max_height."/-".$min_weight."/-".$max_weight."/-".$min_wage."/-".$max_wage."/-".$min_price."/-".$max_price."/-".$character."/-".$skill1."/-".$skill1_min."/-".$skill1_max."/-".$skill2."/-".$skill2_min."/-".$skill2_max."/-".$skill3."/-".$skill3_min."/-".$skill3_max."/-".$skill4."/-".$skill4_min."/-".$skill4_max."/-".$skill5."/-".$skill5_min."/-".$skill5_max;
setcookie("bstmk1", "$bstmk1", time()+36000);

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

if ($suzp>0) {
$rsLimited = mysql_query("SELECT b_link FROM bookmarks WHERE b_type=1 AND team=$chlab") or die(mysql_error());
while($row=mysql_fetch_assoc($rsLimited)) {$newarray[]=$row[b_link]; $cmor=4;}
}
?>

<div id="main">
<h2><?=strtoupper($langmark648)?></h2>

<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<h3><?=$langmark1070?></h3><br/>

<?php
if (!$skill1_min) {$skill1_min = 0;}
if (!$skill2_min) {$skill2_min = 0;}
if (!$skill3_min) {$skill3_min = 0;}
if (!$skill4_min) {$skill4_min = 0;}
if (!$skill5_min) {$skill5_min = 0;}
if (!$skill1_max) {$skill1_max = 400;}
if (!$skill2_max) {$skill2_max = 400;}
if (!$skill3_max) {$skill3_max = 400;}
if (!$skill4_max) {$skill4_max = 400;}
if (!$skill5_max) {$skill5_max = 400;}

if (!$skill1) {$skill1query = '';} else {$skill1query = "AND players.".$skill1." >= ".$skill1_min." AND players.".$skill1." < ".$skill1_max;}
if (!$skill2) {$skill2query = '';} else {$skill2query = "AND players.".$skill2." >= ".$skill2_min." AND players.".$skill2." < ".$skill2_max;}
if (!$skill3) {$skill3query = '';} else {$skill3query = "AND players.".$skill3." >= ".$skill3_min." AND players.".$skill3." < ".$skill3_max;}
if (!$skill4) {$skill4query = '';} else {$skill4query = "AND players.".$skill4." >= ".$skill4_min." AND players.".$skill4." < ".$skill4_max;}
if (!$skill5) {$skill5query = '';} else {$skill5query = "AND players.".$skill5." >= ".$skill5_min." AND players.".$skill5." < ".$skill5_max;}

$skillquery = $skill1query." ".$skill2query." ".$skill3query." ".$skill4query." ".$skill5query;

//pretvorba karakterjev v stevilcne vrednosti
if ($character==0) {$charquery = 'charac < 44';}
if ($character==1) {$charquery = 'charac > 10 AND charac < 14';}
if ($character==2) {$charquery = 'charac > 6 AND charac < 11';}
if ($character==3) {$charquery = 'charac > 13 AND charac < 17';}
if ($character==4) {$charquery = 'charac > 3 AND charac < 7';}
if ($character==5) {$charquery = 'charac > 16 AND charac < 20';}
if ($character==6) {$charquery = 'charac < 4';}
if ($character==7) {$charquery = 'charac > 19 AND charac < 23';}
if ($character==8) {$charquery = 'charac > 22 AND charac < 26';}
if ($character==9) {$charquery = 'charac > 25 AND charac < 30';}
if ($character==10) {$charquery = 'charac > 29 AND charac < 33';}
if ($character==11) {$charquery = 'charac > 32 AND charac < 35';}
if ($character==12) {$charquery = 'charac > 34 AND charac < 39';}
if ($character==13) {$charquery = 'charac > 38 AND charac < 41';}
if ($character==14) {$charquery = 'charac > 40';}

//validacija
if (!is_numeric($min_age)) {$min_age=13;}
if (!is_numeric($max_age)) {$max_age=98;}
if (!is_numeric($min_height)) {$min_height=141;}
if (!is_numeric($max_height)) {$max_height=245;}
if (!is_numeric($min_weight)) {$min_weight=40;}
if (!is_numeric($max_weight)) {$max_weight=250;}
if (!is_numeric($min_wage)) {$min_wage=0;}
if (!is_numeric($max_wage)) {$max_wage=9999999;}
if (!is_numeric($min_price)) {$min_price=0;}
if (!is_numeric($max_price)) {$max_price=999999999;}

//upostevanje deadlina
$now = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $now); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
SWITCH ($deadline) {
CASE 0: $queryhour = date("Y-m-d H:i:s", mktime($dbhour+120,$dbmin,$dbsec+1,$dbmonth,$dbday,$dbyear)); break;
CASE 1: $queryhour = date("Y-m-d H:i:s", mktime($dbhour+2,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear)); break;
CASE 2: $queryhour = date("Y-m-d H:i:s", mktime($dbhour+4,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear)); break;
CASE 3: $queryhour = date("Y-m-d H:i:s", mktime($dbhour+8,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear)); break;
CASE 4: $queryhour = date("Y-m-d H:i:s", mktime($dbhour+16,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear)); break;
CASE 5: $queryhour = date("Y-m-d H:i:s", mktime(23,59,59,$dbmonth,$dbday,$dbyear)); break;
CASE 6: $queryhour = date("Y-m-d H:i:s", mktime(23,59,59,$dbmonth,$dbday+1,$dbyear)); break;
CASE 7: $queryhour = date("Y-m-d H:i:s", mktime($dbhour+120,$dbmin,$dbsec+1,$dbmonth,$dbday,$dbyear)); $order = 'DESC'; break;
}

//---OSNOVNI QUERY---
if ($position==0 AND strlen($bornn) >2) {
$query = "SELECT * FROM players, transfers WHERE playerid=id AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND age >= $min_age AND players.country='$bornn' AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery AND timeofsale <= '$queryhour' AND trstatus=1 ORDER BY timeofsale $order";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
}
elseif ($position>0 AND strlen($bornn) >2) {
$query = "SELECT * FROM players, transfers WHERE playerid=id AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND players.country='$bornn' AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery AND timeofsale <= '$queryhour' AND transfers.position='$position' AND trstatus=1 ORDER BY timeofsale $order";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
}
if ($position==0 AND $bornn=='non') {
$query = "SELECT * FROM players, transfers WHERE playerid=id AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery AND timeofsale <= '$queryhour' AND trstatus=1 ORDER BY timeofsale $order";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
}
elseif ($position>0 AND $bornn=='non') {
$query = "SELECT * FROM players, transfers WHERE playerid=id AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery AND timeofsale <= '$queryhour' AND transfers.position='$position' AND trstatus=1 ORDER BY timeofsale $order";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
}

### New Code ###

   $page = 1;
   
   if(isset($_REQUEST['page']))
   {
      $page   = $_REQUEST['page'];      
   }	

   $per_page = 50;
         
   $total_pages = ceil($num/$per_page);
   
   $tot = $num;
   
   $start = ($page - 1) * $per_page;
   
   $end   = $per_page;
   
   $limitClause = "LIMIT $start, $end"; 	
      
   define('PAGING_LIMIT_1', 10);

   $getStr = "";

$arr = array();

foreach($_REQUEST as $ii=>$vv)
{
   if(($ii!='page') && ($ii!='geslo'))
   {
      //$getStr .="$i".'='.urlencode($vv).'&';	
      
      $arr[] = "$ii".'='.urlencode($vv);
   }
   $getStr = '&'.implode("&", $arr);
}

//osnovni query
if ($position==0 AND strlen($bornn) >3) {
$query = "SELECT * FROM transfers, players WHERE id=playerid AND trstatus =1 AND timeofsale <= '$queryhour' AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND players.country='$bornn' AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery ORDER BY timeofsale $order $limitClause";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
if ($num == 0) {echo "<p>",$langmark1071,"<br/>",$langmark1072,"</p>";}
}
if ($position>0 AND strlen($bornn)>3) {
$query = "SELECT * FROM transfers, players WHERE id=playerid AND trstatus =1 AND timeofsale <= '$queryhour' AND transfers.position=$position AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND players.country='$bornn' AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery ORDER BY timeofsale $order $limitClause";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
if ($num == 0) {echo "<p>",$langmark1071,"<br/>",$langmark1072,"</p>";}
}
if ($position==0 AND $bornn=='non') {
$query = "SELECT * FROM transfers, players WHERE id=playerid AND trstatus =1 AND timeofsale <= '$queryhour' AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery ORDER BY timeofsale $order $limitClause";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
if ($num == 0) {echo "<p>",$langmark1071,"<br/>",$langmark1072,"</p>";}
}
if ($position>0 AND $bornn=='non') {
$query = "SELECT * FROM transfers, players WHERE id=playerid AND trstatus =1 AND timeofsale <= '$queryhour' AND transfers.position =$position AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery ORDER BY timeofsale $order $limitClause";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);
if ($num == 0) {echo "<p>",$langmark1071,"<br/>",$langmark1072,"</p>";}
}

### End of New Code ###

$i=0;
$j = $start;

if ($tot == 1 AND $page < 2) {echo "<hr/><i>",$langmark1073,"</i><hr/><br/>";}
elseif ($tot == 2 AND $page < 2) {echo "<hr/><i>",$langmark1074,"</i><hr/><br/>";}
elseif ($tot > 2 AND $page < 2) {echo "<hr/><i>",$tot," ",$langmark1075,"</i><hr/><br/>";}
else {echo "<br/>";}

while ($i < $num) {

$playerclub=mysql_result($result,$i,"playerclub");
$sellingid=mysql_result($result,$i,"sellingid");
$price=mysql_result($result,$i,"transfers.price");
$timeofsale=mysql_result($result,$i,"timeofsale");
$currentbid=mysql_result($result,$i,"currentbid");
$bidingteam=mysql_result($result,$i,"bidingteam");
$bidingname=mysql_result($result,$i,"bidingname");
$id=mysql_result($result,$i,"players.id");
$name=mysql_result($result,$i,"players.name");
$surname=mysql_result($result,$i,"players.surname");
$age=mysql_result($result,$i,"players.age");
$club=mysql_result($result,$i,"players.club");
$country=mysql_result($result,$i,"players.country");
$charac=mysql_result($result,$i,"players.charac");
$height=mysql_result($result,$i,"players.height");
$weight=mysql_result($result,$i,"players.weight");
$handling=mysql_result($result,$i,"players.handling");
$speed=mysql_result($result,$i,"players.speed");
$passing=mysql_result($result,$i,"players.passing");
$vision=mysql_result($result,$i,"players.vision");
$rebounds=mysql_result($result,$i,"players.rebounds");
$position=mysql_result($result,$i,"players.position");
$freethrow=mysql_result($result,$i,"players.freethrow");
$shooting=mysql_result($result,$i,"players.shooting");
$defense=mysql_result($result,$i,"players.defense");
$workrate=mysql_result($result,$i,"players.workrate");
$experience=mysql_result($result,$i,"players.experience");
$fatigue=mysql_result($result,$i,"players.fatigue");
$wage=mysql_result($result,$i,"players.wage");

//prikaz trenutne cene
if ($currentbid==0) {
$curentprice = $price;
$kdobida = 'starting price';
$kdobidaid = '&nbsp;';
}
else {
$curentprice = $currentbid;
$kdobida = $bidingname;
$kdobidaid = $bidingteam;
}
$disprice = number_format($curentprice, 0, ',', '.');
$diswage = number_format($wage, 0, ',', '.');

//prikaz datumov
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

if ($handling < 9) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($handling > 8 AND $handling < 17) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($handling > 16 AND $handling < 25) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($handling > 24 AND $handling < 33) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($handling > 32 AND $handling < 41) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($handling > 40 AND $handling < 49) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($handling > 48 AND $handling < 57) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($handling > 56 AND $handling < 65) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($handling > 64 AND $handling < 73) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($handling > 72 AND $handling < 81) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($handling > 80 AND $handling < 89) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($handling > 88 AND $handling < 97) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($handling > 96 AND $handling < 105) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($handling > 104 AND $handling < 113) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($handling > 112 AND $handling < 121) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($handling > 120 AND $handling < 129) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($handling > 128 AND $handling < 137) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($handling > 136 AND $handling < 145) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($handling > 144 AND $handling < 153) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($handling > 152 AND $handling < 161) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($speed < 9) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($speed > 8 AND $speed < 17) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($speed > 16 AND $speed < 25) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($speed > 24 AND $speed < 33) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($speed > 32 AND $speed < 41) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($speed > 40 AND $speed < 49) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($speed > 48 AND $speed < 57) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($speed > 56 AND $speed < 65) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($speed > 64 AND $speed < 73) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($speed > 72 AND $speed < 81) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($speed > 80 AND $speed < 89) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($speed > 88 AND $speed < 97) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($speed > 96 AND $speed < 105) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($speed > 104 AND $speed < 113) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($speed > 112 AND $speed < 121) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($speed > 120 AND $speed < 129) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($speed > 128 AND $speed < 137) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($speed > 136 AND $speed < 145) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($speed > 144 AND $speed < 153) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($speed > 152 AND $speed < 161) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($passing < 9) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($passing > 8 AND $passing < 17) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($passing > 16 AND $passing < 25) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($passing > 24 AND $passing < 33) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($passing > 32 AND $passing < 41) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($passing > 40 AND $passing < 49) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($passing > 48 AND $passing < 57) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($passing > 56 AND $passing < 65) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($passing > 64 AND $passing < 73) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($passing > 72 AND $passing < 81) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($passing > 80 AND $passing < 89) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($passing > 88 AND $passing < 97) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($passing > 96 AND $passing < 105) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($passing > 104 AND $passing < 113) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($passing > 112 AND $passing < 121) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($passing > 120 AND $passing < 129) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($passing > 128 AND $passing < 137) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($passing > 136 AND $passing < 145) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($passing > 144 AND $passing < 153) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($passing > 152 AND $passing < 161) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($vision < 9) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($vision > 8 AND $vision < 17) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($vision > 16 AND $vision < 25) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($vision > 24 AND $vision < 33) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($vision > 32 AND $vision < 41) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($vision > 40 AND $vision < 49) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($vision > 48 AND $vision < 57) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($vision > 56 AND $vision < 65) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($vision > 64 AND $vision < 73) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($vision > 72 AND $vision < 81) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($vision > 80 AND $vision < 89) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($vision > 88 AND $vision < 97) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($vision > 96 AND $vision < 105) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($vision > 104 AND $vision < 113) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($vision > 112 AND $vision < 121) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($vision > 120 AND $vision < 129) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($vision > 128 AND $vision < 137) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($vision > 136 AND $vision < 145) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($vision > 144 AND $vision < 153) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($vision > 152 AND $vision < 161) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($rebounds < 9) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($rebounds > 8 AND $rebounds < 17) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($rebounds > 16 AND $rebounds < 25) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($rebounds > 24 AND $rebounds < 33) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($rebounds > 32 AND $rebounds < 41) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($rebounds > 40 AND $rebounds < 49) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($rebounds > 48 AND $rebounds < 57) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($rebounds > 56 AND $rebounds < 65) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($rebounds > 64 AND $rebounds < 73) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($rebounds > 72 AND $rebounds < 81) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($rebounds > 80 AND $rebounds < 89) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($rebounds > 88 AND $rebounds < 97) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($rebounds > 96 AND $rebounds < 105) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($rebounds > 104 AND $rebounds < 113) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($rebounds > 112 AND $rebounds < 121) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($rebounds > 120 AND $rebounds < 129) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($rebounds > 128 AND $rebounds < 137) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($rebounds > 136 AND $rebounds < 145) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($rebounds > 144 AND $rebounds < 153) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($rebounds > 152 AND $rebounds < 161) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($position < 9) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($position > 8 AND $position < 17) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($position > 16 AND $position < 25) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($position > 24 AND $position < 33) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($position > 32 AND $position < 41) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($position > 40 AND $position < 49) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($position > 48 AND $position < 57) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($position > 56 AND $position < 65) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($position > 64 AND $position < 73) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($position > 72 AND $position < 81) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($position > 80 AND $position < 89) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($position > 88 AND $position < 97) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($position > 96 AND $position < 105) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($position > 104 AND $position < 113) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($position > 112 AND $position < 121) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($position > 120 AND $position < 129) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($position > 128 AND $position < 137) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($position > 136 AND $position < 145) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($position > 144 AND $position < 153) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($position > 152 AND $position < 161) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($shooting < 9) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($shooting > 8 AND $shooting < 17) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($shooting > 16 AND $shooting < 25) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($shooting > 24 AND $shooting < 33) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($shooting > 32 AND $shooting < 41) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($shooting > 40 AND $shooting < 49) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($shooting > 48 AND $shooting < 57) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($shooting > 56 AND $shooting < 65) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($shooting > 64 AND $shooting < 73) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($shooting > 72 AND $shooting < 81) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($shooting > 80 AND $shooting < 89) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($shooting > 88 AND $shooting < 97) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($shooting > 96 AND $shooting < 105) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($shooting > 104 AND $shooting < 113) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($shooting > 112 AND $shooting < 121) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($shooting > 120 AND $shooting < 129) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($shooting > 128 AND $shooting < 137) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($shooting > 136 AND $shooting < 145) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($shooting > 144 AND $shooting < 153) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($shooting > 152 AND $shooting < 161) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($freethrow < 9) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($freethrow > 8 AND $freethrow < 17) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($freethrow > 16 AND $freethrow < 25) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($freethrow > 24 AND $freethrow < 33) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($freethrow > 32 AND $freethrow < 41) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($freethrow > 40 AND $freethrow < 49) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($freethrow > 48 AND $freethrow < 57) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($freethrow > 56 AND $freethrow < 65) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($freethrow > 64 AND $freethrow < 73) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($freethrow > 72 AND $freethrow < 81) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($freethrow > 80 AND $freethrow < 89) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($freethrow > 88 AND $freethrow < 97) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($freethrow > 96 AND $freethrow < 105) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($freethrow > 104 AND $freethrow < 113) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($freethrow > 112 AND $freethrow < 121) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($freethrow > 120 AND $freethrow < 129) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($freethrow > 128 AND $freethrow < 137) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($freethrow > 136 AND $freethrow < 145) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($freethrow > 144 AND $freethrow < 153) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($freethrow > 152 AND $freethrow < 161) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($defense < 9) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($defense > 8 AND $defense < 17) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($defense > 16 AND $defense < 25) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($defense > 24 AND $defense < 33) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($defense > 32 AND $defense < 41) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($defense > 40 AND $defense < 49) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($defense > 48 AND $defense < 57) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($defense > 56 AND $defense < 65) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($defense > 64 AND $defense < 73) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($defense > 72 AND $defense < 81) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($defense > 80 AND $defense < 89) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($defense > 88 AND $defense < 97) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($defense > 96 AND $defense < 105) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($defense > 104 AND $defense < 113) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($defense > 112 AND $defense < 121) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($defense > 120 AND $defense < 129) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($defense > 128 AND $defense < 137) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($defense > 136 AND $defense < 145) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($defense > 144 AND $defense < 153) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($defense > 152 AND $defense < 161) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($workrate < 9) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; $gmwr=0;}
elseif ($workrate > 8 AND $workrate < 17) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; $gmwr=1;}
elseif ($workrate > 16 AND $workrate < 25) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; $gmwr=2;}
elseif ($workrate > 24 AND $workrate < 33) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; $gmwr=3;}
elseif ($workrate > 32 AND $workrate < 41) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; $gmwr=4;}
elseif ($workrate > 40 AND $workrate < 49) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; $gmwr=5;}
elseif ($workrate > 48 AND $workrate < 57) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; $gmwr=6;}
elseif ($workrate > 56 AND $workrate < 65) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; $gmwr=7;}
elseif ($workrate > 64 AND $workrate < 73) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; $gmwr=8;}
elseif ($workrate > 72 AND $workrate < 81) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; $gmwr=9;}
elseif ($workrate > 80 AND $workrate < 89) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; $gmwr=10;}
elseif ($workrate > 88 AND $workrate < 97) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; $gmwr=11;}
elseif ($workrate > 96 AND $workrate < 105) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; $gmwr=12;}
elseif ($workrate > 104 AND $workrate < 113) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; $gmwr=13;}
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($workrate > 120 AND $workrate < 129) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($workrate > 128 AND $workrate < 137) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($workrate > 136 AND $workrate < 145) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($workrate > 144 AND $workrate < 153) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($workrate > 152 AND $workrate < 161) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($experience < 9) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($experience > 8 AND $experience < 17) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($experience > 16 AND $experience < 25) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($experience > 24 AND $experience < 33) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($experience > 32 AND $experience < 41) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($experience > 40 AND $experience < 49) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($experience > 48 AND $experience < 57) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($experience > 56 AND $experience < 65) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($experience > 64 AND $experience < 73) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($experience > 72 AND $experience < 81) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($experience > 80 AND $experience < 89) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($experience > 88 AND $experience < 97) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($experience > 96 AND $experience < 105) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($experience > 104 AND $experience < 113) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($experience > 120 AND $experience < 129) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($experience > 128 AND $experience < 137) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($experience > 136 AND $experience < 145) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($experience > 144 AND $experience < 153) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($experience > 152 AND $experience < 161) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";
?>

<table border="0" cellpadding="1" cellspacing="0" width="100%">
<td colspan="2">
<?=($j+1)?>. <a href="player.php?playerid=<?=$id?>"><?=$name," ",$surname?></a> <?=$disprice?> &euro;&nbsp;
<?php if ($kdobida <>'starting price') { ?>(<a href="club.php?clubid=<?=$kdobidaid?>"><?=$kdobida?></a>)<?php } if ($kdobida =='starting price') {echo "(".$kdobida.")";}
if ($cmor<>4) {$cgor='';} elseif (in_array($id, $newarray)) {echo "&nbsp;<img src=\"img/bookmarkY.jpg\" border=\"0\" height=\"13\" alt=\"bookmarked\" title=\"Player already bookmarked\">";}?>
</td></tr>
<tr><td valign="top" width="227">
<b><?=$langmark1077?>&nbsp;</b> <a href="club.php?clubid=<?=$sellingid?>"><?=$playerclub?></a><br/>
<b><?=$langmark118?>:&nbsp;</b> <?=$diswage?> &euro;<br/>
<b><?=$langmark113?>:&nbsp;</b> <?=$age?><br/>
<b><?=$langmark116?>:&nbsp;</b> <?=$height?> cm<br/>					
<b><?=$langmark1076?>:&nbsp;</b> <?=$disdate?><br/>
</td>

<td valign="top">								
<table border="0" cellpadding="0" cellspacing="0">
<tr><td><b><?=$langmark120?>:&nbsp;</b></td><td width="78"><?=$handling_dspl?></td>
<td><b>&nbsp; &nbsp; <?=$langmark121?>:&nbsp;</b></td><td><?=$speed_dspl?></td></tr>
<tr><td><b><?=$langmark122?>:&nbsp;</b></td><td><?=$passing_dspl?></td>
<td><b>&nbsp; &nbsp; <?=$langmark123?>:&nbsp;</b></td><td><?=$vision_dspl?></td></tr>
<tr><td><b><?=$langmark124?>:&nbsp;</b></td><td><?=$rebounds_dspl?></td>
<td><b>&nbsp; &nbsp; <?=$langmark125?>:&nbsp;</b></td><td><?=$position_dspl?></td></tr>
<tr><td><b><?=$langmark126?>:&nbsp;</b></td><td><?=$shooting_dspl?></td>
<td><b>&nbsp; &nbsp; <?=$langmark127?>:&nbsp;</b></td><td><?=$freethrow_dspl?></td></tr>
<tr><td><b><?=$langmark128?>:&nbsp;</b></td><td><?=$defense_dspl?></td>
<td><b>&nbsp; &nbsp; <?=$langmark129?>:&nbsp;</b></td><td><?=$workrate_dspl?></td></tr>
</table>
</td>
</tr>
<?php
if($i >0 && $j%23 == 0) {
?>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<?php } else { ?>
<tr><td colspan="2"><br/></td></tr>
<?php
}
$i++;
$j++;
// konec zanke
}
?>
<table width="100%" cellspacing="1" cellpadding="1">
<tr bgcolor="#e7e7e7">
<td align="center" colspan="2" bgcolor="#e7e7e7">
    	
<?php
if($total_pages > 1) {func_paging_home($page, $total_pages, $getStr);}
?>
</td>
</tr>	
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>
<?php
function func_paging_home($page, $total_pages, $getStr)
{
	$url=$_SERVER['REQUEST_URI'];
	if(strpos($url,"page")>0) {$link=str_replace("page=".$page,"page",$url);}
	 elseif(strpos($url, '?')>0) {$link.=$url."&page";}
	 else {$link.=$url."?page";}

		if($page > 1)
		{
			$new_url = str_replace("page", "page=".($page-1), $link);
			//$new_url="$link=".($page-1);
			//$new_url.=$getStr;
			echo "<a href=",$new_url,"$getStr class='text'>","&lt;&lt; ",$langmark1078,"</a>&nbsp;&nbsp;";
		}

	if($total_pages>PAGING_LIMIT_1)
	{
	$cnter = $total_pages-$page;
	if($cnter>PAGING_LIMIT_1)
	  {
	   $start=$page;
	   $limiter=$page+PAGING_LIMIT_1;
	 }
	  else
	   {
	   $start=$total_pages-PAGING_LIMIT_1;
	   $limiter=$total_pages;
       }
	  }

	  else
	   {
	    $start=1;
		$limiter=$total_pages;
	   }

	for($i=$start; $i<=$limiter; $i++)
	{

	//$new_url="$link=".$i;
	$new_url = str_replace("page", "page=".$i, $link);
    //$new_url.=$getStr;

	if($i == $page)
	{
       echo "<a href=",$new_url,"$getStr class='text'><font color=\"GREEN\"><b>",$i,"</b></font></a>&nbsp;&nbsp;";
	}
	else
	{
	   echo "<a href=",$new_url,"$getStr class='text'>",$i,"</a>&nbsp;&nbsp;";
	}
	}
		if($page < $total_pages)
		{
			//$new_url="$link=".($page+1);
			$new_url = str_replace("page", "page=".($page+1), $link);
			//$new_url .=$getStr;
			echo "<a href=",$new_url,"$getStr class='text'>",$langmark1079," &gt;&gt;","</a> ";
		}

	}//End of function
/*
function getTotal()
{

extract($_REQUEST);

if ($position==0) {
$query = "SELECT * FROM transfers, players WHERE id=playerid AND trstatus =1 AND timeofsale <= '$queryhour' AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid = 0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery ORDER BY timeofsale $order $limitClause";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);

}
else {
$query = "SELECT * FROM transfers, players WHERE id=playerid AND trstatus =1 AND timeofsale <= '$queryhour' AND transfers.position=$position AND ((currentbid > 0 AND currentbid <= $max_price AND currentbid >= $min_price) OR (currentbid =0 AND transfers.price <= $max_price AND transfers.price >= $min_price)) AND $charquery AND age <= $max_age AND age >= $min_age AND height <= $max_height AND height >= $min_height AND weight <= $max_weight AND weight >= $min_weight AND players.wage <= $max_wage AND players.wage >= $min_wage $skillquery ORDER BY timeofsale $order $limitClause";
$result = mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result);

}
	
return $num;
	
}//EO Fn
*/
?>