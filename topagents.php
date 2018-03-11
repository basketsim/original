<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(include 'basketsim.php');
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark930?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="56%">

<h2><?=$langmark931?></h2>

<br/><b>Albania</b><br/>
1. <a href="player.php?playerid=2396488"><b>Paran Maxhuni</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=1573649"><b>Mentor Ferra</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
3. <a href="player.php?playerid=1821294"><b>Nderush Golemi</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
4. <a href="player.php?playerid=2613997"><b>Bardibal Grazhdani</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=3503924"><b>Auron Shima</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=1550832"><b>Ermir Xhemali</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
7. <a href="player.php?playerid=2047291"><b>Kristofor Ganiu</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=3188738"><b>Perset Rusi</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=2192396"><b>Shkëlqim Lila</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=1479790"><b>Vajkal Josipi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Argentina</b><br/>
1. <a href="player.php?playerid=2648011"><b>César Villarreal</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=2877301"><b>Miguel Ángel Arismendi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=2548359"><b>Ramon Davico</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
4. <a href="player.php?playerid=1980429"><b>Mateo Zárate</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
5. <a href="player.php?playerid=2734343"><b>Flavio Giardinelli</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
6. <a href="player.php?playerid=2475243"><b>Horacio Jorge</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
7. <a href="player.php?playerid=1090410"><b>Inocencio Ábalos</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=153829"><b>Iñigo Aguilar</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
9. <a href="player.php?playerid=3114966"><b>Eric Dulko</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=1048869"><b>Ignacio Centurión</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>

<br/><b>Australia</b><br/>
1. <a href="player.php?playerid=1082538"><b>Callum Darcy</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=1063804"><b>George Craig</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2616585"><b>Justin Wright</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=2915211"><b>David White</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=3214739"><b>Grant Ryan</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
6. <a href="player.php?playerid=1168416"><b>Martin Crothers</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
7. <a href="player.php?playerid=1070444"><b>Corey Andrew</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=1652398"><b>Marko Carroll</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=2947824"><b>Steve Godden</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=744786"><b>Max Williams</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>Austria</b><br/>
1. <a href="player.php?playerid=2877640"><b>Pirmin Mayer</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
2. <a href="player.php?playerid=2650879"><b>Joschi Prätsch</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
3. <a href="player.php?playerid=2617286"><b>Armin Friedl</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=3202038"><b>Sefan Schifferle</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
5. <a href="player.php?playerid=3503768"><b>Rainer Stöhr</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=1546667"><b>Lukas Hipfl</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=4032228"><b>Alex Ott</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=3114104"><b>Rudolf Grabler</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
9. <a href="player.php?playerid=1860176"><b>Hannes Bekker</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=3967315"><b>Cornel Uttner</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>

<br/><b>Belarus</b><br/>
1. <a href="player.php?playerid=4450553"><b>Dimitri Medved</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
2. <a href="player.php?playerid=4255225"><b>Vyacheslav Kovel</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
3. <a href="player.php?playerid=4367600"><b>Dzmitry Doroshevich</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
4. <a href="player.php?playerid=4426733"><b>Dmitriy Adamovich</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=4532871"><b>Maxim Dubski</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=4230013"><b>Mikalaj Salavey</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
7. <a href="player.php?playerid=4368023"><b>Juras Trubila</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
8. <a href="player.php?playerid=4425640"><b>Maxim Bychanok</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=4494700"><b>Aleksey Domeyko</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=4494703"><b>Mikhail Bahdanovich</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Belgium</b><br/>
1. <a href="player.php?playerid=1696866"><b>Julien Jansen</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2639325"><b>Sacha Buyl</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=3236691"><b>Jonas Simenon</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
4. <a href="player.php?playerid=2332545"><b>Frederik Liégeois</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=201269"><b>Dominique Delhaye</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=2742293"><b>Nick Sinnesaël</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2929144"><b>Fabrice Moureau</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=154291"><b>Saber Lauwers</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=3189916"><b>Olivier Ghys</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=3202109"><b>Cédric Deprez</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Bosnia and Herzegovina</b><br/>
1. <a href="player.php?playerid=2021381"><b>Peko Bozalija</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2031343"><b>Kabir Paponja</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=1673590"><b>Ćamil Đelmaš</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=889771"><b>Milomir Musemić</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=2591833"><b>Ajdin Kabilović</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=3302157"><b>Željko Šabović</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=1494929"><b>Romeo Đogović</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=3292535"><b>Halim Smajić</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
9. <a href="player.php?playerid=1942880"><b>Daglas Pehadžić</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=3184886"><b>Velid Rupnik</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>

<br/><b>Brazil</b><br/>
1. <a href="player.php?playerid=1042758"><b>Bernardo Schwinden</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=3229049"><b>Edilsom Oliveira</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2622084"><b>Rodrigo Oliveira</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
4. <a href="player.php?playerid=3771950"><b>Elson Santiago</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=650772"><b>Flamur Balić</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=3582839"><b>Oduvaldo Jesus</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=3842467"><b>Felipe Schmidt</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=1096751"><b>Ivan Jesus</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=755364"><b> Fidelis</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=1339832"><b>Miguel Machado</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>

<br/><b>Bulgaria</b><br/>
1. <a href="player.php?playerid=2615124"><b>Konstantin Panov</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=1533965"><b>Dimitar Alexiev</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
3. <a href="player.php?playerid=1813959"><b>Stanko Partalin</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=2395501"><b>Krasimir Yonchev</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=2698387"><b>Tzvetan Iliev</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=3160793"><b>Petko Anastasov</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=2996268"><b>Yani Kanchev</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=2614322"><b>Anton Mitrev</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
9. <a href="player.php?playerid=1818228"><b>Iliyan Nikolov</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=1157657"><b>Venelin Velchev</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Canada</b><br/>
1. <a href="player.php?playerid=3595730"><b>Frédéric Johnson</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=3116239"><b>Reid Biasatti</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=1757196"><b>Mark Brossard</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
4. <a href="player.php?playerid=2590091"><b>Dany Lévesque</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=3190009"><b>Neil Sutton</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=3115349"><b>Lorenzo Dales</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=3025628"><b>Joel Hall</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=3843115"><b>Joseph-Armand Marcus</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=3843106"><b>William Pettinger</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=3653153"><b>Peter Lamour</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Chile</b><br/>
1. <a href="player.php?playerid=1481882"><b>Manuel Moreno</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=201050"><b>Diego Castillo Velasco</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2023792"><b>Pedro Barros</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=3144546"><b>Vladimiro Zamorano</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
5. <a href="player.php?playerid=2372525"><b>Nibaldo Ramírez</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=920310"><b>Sebastián Guzmán</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
7. <a href="player.php?playerid=3171999"><b>Jorge Pereira</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
8. <a href="player.php?playerid=3213579"><b>Renzo García</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
9. <a href="player.php?playerid=2022473"><b>Octavio Letelier</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=2415050"><b>Gonzalo Bahamondes</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>China</b><br/>
1. <a href="player.php?playerid=2928872"><b>Wang Tan</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=2449701"><b>Min Yang</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=2042622"><b>Yee Ming</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=2615453"><b>Yang Wen</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=3189584"><b>Jim Deng</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=2647989"><b>Qin Wu</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
7. <a href="player.php?playerid=2823603"><b>Fa Sun</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
8. <a href="player.php?playerid=2809696"><b>Cheng Chu</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
9. <a href="player.php?playerid=2245091"><b>Jiang Zhengyi</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2123259"><b>Fang Ling</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>Colombia</b><br/>
1. <a href="player.php?playerid=2997475"><b>Alberto Acosta</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
2. <a href="player.php?playerid=1485334"><b>Carlos Solano</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=2639399"><b>Rafael Cacua</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
4. <a href="player.php?playerid=2027879"><b>Evert Jair Bernal</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=1564356"><b>Paulo Cesar Dovale</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=3784121"><b>Oscar Emilio Chavez</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
7. <a href="player.php?playerid=2915635"><b>James Melo</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=3967321"><b>Luis Buendia</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=1626267"><b>Ivan Aguirre</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2750243"><b>Omar Gaitan</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>

<br/><b>Croatia</b><br/>
1. <a href="player.php?playerid=2194375"><b>Tona Vrček</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=1586671"><b>Vladimir Jurčić</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=2166448"><b>Matko Ljubković</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
4. <a href="player.php?playerid=1635024"><b>Matias Maržić</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
5. <a href="player.php?playerid=3012230"><b>Ante Hafizović</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=2039775"><b>Renato Dević</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
7. <a href="player.php?playerid=912651"><b>Zoltan Vrčić</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
8. <a href="player.php?playerid=2448250"><b>Nino Duljaj</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=235216"><b>Marko Vidušin</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=1778254"><b>Dado Kevo</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Cyprus</b><br/>
1. <a href="player.php?playerid=1154482"><b>Sebastianos Bakogiannis</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
2. <a href="player.php?playerid=3210228"><b>Grigoris Sxortsianitis</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=1878642"><b>Matthaios Mpatonetas</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=658356"><b>Alkis Kefalas</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
5. <a href="player.php?playerid=4091047"><b>Erotas Vafiadis</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=678535"><b>Lakis Sarris</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2902715"><b>Michalis Bezerianos</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=3503350"><b>Evagoras Kaminaridis</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=755300"><b>Fanos T. Andreadis</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=703897"><b>Manthos Koukodimos</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Czech Republic</b><br/>
1. <a href="player.php?playerid=907040"><b>Martin Hruška</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
2. <a href="player.php?playerid=2807647"><b>Kristian Kulhavý</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=1528296"><b>Petr Jón</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=3300047"><b>Jan Hudec</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=411238"><b>Karel Chrudimský</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=2712293"><b>Ferdinand Blažek</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
7. <a href="player.php?playerid=3966217"><b>Rostislav Pitomec</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=1986325"><b>Jakub Vrba</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
9. <a href="player.php?playerid=1159906"><b>Jan Suchomel</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=2914049"><b>Marcel Polák</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Denmark</b><br/>
1. <a href="player.php?playerid=1493630"><b>Emil Bertelsen</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=2832720"><b>Christian Christensen</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=640391"><b>Dan Hansen</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
4. <a href="player.php?playerid=1571317"><b>Paw Erichsen</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=1028513"><b>Christos Sørensen</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
6. <a href="player.php?playerid=1633698"><b>Frederik Frandsen</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2625877"><b>Oliver Sørensen</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=750462"><b>Natan Sveistrup</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=1653133"><b>Mikkel Mortensen</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
10. <a href="player.php?playerid=3781213"><b>Syver Jensen</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Egypt</b><br/>
1. <a href="player.php?playerid=2765379"><b>Nokrashy Ghali</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
2. <a href="player.php?playerid=2943244"><b>Zaki Al Gahary</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=3653051"><b>Sutekh Salam</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=2957036"><b>Edfu Nasser</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
5. <a href="player.php?playerid=3651747"><b>Yahiya El Borolossy</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=3967511"><b>Ibrahim Khoury</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=3653196"><b>Yahiya Youssef</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=3653476"><b>Ali Simidi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=3114290"><b>Seth Ghali</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=2156119"><b>Amsu Mahfouz</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Estonia</b><br/>
1. <a href="player.php?playerid=1814224"><b>Lennart Egel</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=1719043"><b>Bengt Aidu</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=1240284"><b>Steve Idasaar</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=1943874"><b>Einar Tali</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
5. <a href="player.php?playerid=2648296"><b>Henri Jakobson</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
6. <a href="player.php?playerid=1693298"><b>Andrus Semm</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=2428306"><b>Ralf Kaur</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=2660601"><b>Kalev Soon</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=2475625"><b>Derrick Evert</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
10. <a href="player.php?playerid=3176474"><b>Roman Jooksik</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Finland</b><br/>
1. <a href="player.php?playerid=788627"><b>Roope Sipilä</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
2. <a href="player.php?playerid=282090"><b>Santeri Junnila</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=1816095"><b>Jussi Nyman</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=3056216"><b>Teemu Jalonen</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=1522896"><b>Tomi Riuttanen</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=1719413"><b>Vesa-Matti Otava</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=917710"><b>Jouni Tyyskä</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
8. <a href="player.php?playerid=2056562"><b>Antti Britschgi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=4090489"><b>Johannes Joukainen</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=2433108"><b>Eetu Tammelin</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>France</b><br/>
1. <a href="player.php?playerid=175913"><b>Enzo "The Heir" Gruson</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
2. <a href="player.php?playerid=1088746"><b>Morgan Marechal</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=1517590"><b>Antoine Martin</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=1575233"><b>Kellian Fache</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
5. <a href="player.php?playerid=2386775"><b>Antoine Jobard</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=1081686"><b>Jonas Remy</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=3287630"><b>Elouan Maes</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=1258935"><b>Driss Mouton</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=774108"><b>Randy Oriol</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=1777460"><b>Sean Guichard</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>FYR Macedonia</b><br/>
1. <a href="player.php?playerid=1490834"><b>Stevan Petreski</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2359843"><b>Kliment Spirkoski</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
3. <a href="player.php?playerid=1490507"><b>Ilyo Imeroski</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=2631021"><b>Blasko Vaskov</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=3228220"><b>Ordan Kostov</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=1550582"><b>Gjorgi Stojchev</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2054802"><b>Andon Angjelov</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
8. <a href="player.php?playerid=1475571"><b>Ljupco Mihailov</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=3843235"><b>Ognen Risteski</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=3056181"><b>Lazo Gushtanov</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Georgia</b><br/>
1. <a href="player.php?playerid=4450053"><b>Gaga Eristavi</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=4256572"><b>Lavrenti Eristavi</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
3. <a href="player.php?playerid=4251637"><b>Beso Liklikadze</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=4532340"><b>Ivane Nasaridzhe</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=4453726"><b>Davit Gurieli</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=4253701"><b>Lasha Esadze</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=4263337"><b>Karlo Oniani</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
8. <a href="player.php?playerid=4364877"><b>Gaga Munjishvili</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=4455599"><b>Andrea Asatiani</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
10. <a href="player.php?playerid=4253063"><b>Kote Kharaidze</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Germany</b><br/>
1. <a href="player.php?playerid=1090788"><b>Leo Steinberger</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=2450054"><b>Sascha Kaiserling</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2695900"><b>Gerd Sultzberger</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
4. <a href="player.php?playerid=2617880"><b>Rafael Guillén</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
5. <a href="player.php?playerid=308095"><b>Lucas Heinemann</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=1476676"><b>Michael Holzmann</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
7. <a href="player.php?playerid=2632003"><b>Dede Frank</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=2562679"><b>Namejs Dzenis</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=2983196"><b>Hans Hackbarth</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
10. <a href="player.php?playerid=2311435"><b>Miķelis Leimanis</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Greece</b><br/>
1. <a href="player.php?playerid=1018233"><b>Ioulios Malaperdas</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=1556715"><b>Emmanuil Xristoglou</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=2488430"><b>Patrikios Xasmouritos</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=2329725"><b>Crist Felekis</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=1983403"><b>Theodore Poulos</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=1596909"><b>Kypros Fettas</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2409083"><b>Anestis Gesidis</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=1480927"><b>Rafael Zervas</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=2537596"><b>Telis Karafloxetoulas</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
10. <a href="player.php?playerid=806400"><b>Alexandros Alexiou</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>

<br/><b>Hong Kong</b><br/>
1. <a href="player.php?playerid=3303935"><b>Li Wu</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=4092226"><b>Calvin Cheng-fu</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
3. <a href="player.php?playerid=2930082"><b>Bo Ng</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=3433579"><b>Jackie Low</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
5. <a href="player.php?playerid=4028323"><b>Lai Shih</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=2795359"><b>Wayne Cho</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
7. <a href="player.php?playerid=2636015"><b>Dave Ng</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=4206476"><b>Steve She</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=2636010"><b>Huang Qian</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=2957690"><b>Shirong Xi</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>

<br/><b>Hungary</b><br/>
1. <a href="player.php?playerid=1119248"><b>Sándor Fekete</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
2. <a href="player.php?playerid=1038353"><b>Zsolt Báder</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=2864501"><b>Richard Rudas</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
4. <a href="player.php?playerid=1087734"><b>László Szegedi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=1935554"><b>Géza Kocsi</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=1212665"><b>József Berényi</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=2928273"><b>Jakab Bereményi</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=2787992"><b>Csaba Tököli</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=331131"><b>Pál Dienes</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=1300326"><b>Jakab Laczka</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>India</b><br/>
1. <a href="player.php?playerid=2614025"><b>Shridhar Pattnaik</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=3025084"><b>Sujit Shahalia</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=4252750"><b>Pankaj Suthar</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
4. <a href="player.php?playerid=3733321"><b>Savitha Patil</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=3504957"><b>Bhalchandra Hardas</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=3974154"><b>Dhruv Kabadagi</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=4147529"><b>Sitikantha Walia</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=2752169"><b>Aviral Ray</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=3505084"><b>Sampada Pipalia</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=3584110"><b>Sanjeev Biswal</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Indonesia</b><br/>
1. <a href="player.php?playerid=3505329"><b>Ruli Purba</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=2809065"><b>Kusumo Sjahrir</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2751713"><b>Gesang Teja</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=3294131"><b>Seto Tarigan</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=4152907"><b>Asmara Budiman</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
6. <a href="player.php?playerid=4092138"><b>Yandi Sjahrir</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
7. <a href="player.php?playerid=3503052"><b>Jajang Canggih</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
8. <a href="player.php?playerid=4256899"><b>Ilman Yusuf</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=4257683"><b>Muhammad Mohammadi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=3843444"><b>Lemah Meha</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>

<br/><b>Ireland</b><br/>
1. <a href="player.php?playerid=4029145"><b>Bartholomew Harty</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=3011872"><b>Darijo Pribanović</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=2918334"><b>Cornelius Mulcahey</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=3652698"><b>Daniel Murray</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=4147978"><b>Anthony Fox</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=2752075"><b>Laurence Bannon</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
7. <a href="player.php?playerid=4408404"><b>Donough O’Neill</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
8. <a href="player.php?playerid=2610376"><b>Donagh McCarthy</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
9. <a href="player.php?playerid=4092210"><b>Declan Brown</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=3652238"><b>William Connolly</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>Israel</b><br/>
1. <a href="player.php?playerid=801080"><b>Natan Basla</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2730339"><b>Eitan Lindenbaum</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=2121683"><b>Pini Balaban</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=1609954"><b>Eddy Burger</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=2039463"><b>Ido Rudner</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=2549271"><b>Yaron Hauser</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
7. <a href="player.php?playerid=1070563"><b>Dvir Gomperz</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
8. <a href="player.php?playerid=1486499"><b>Daniel Segan</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=2330127"><b>Monny Rachman</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=1206155"><b>Eyal Melamed</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Italy</b><br/>
1. <a href="player.php?playerid=2445093"><b>Pasquale Donati</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2194045"><b>Bernardo Contestabili</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=3041411"><b>Girolamo Bettinelli</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=2329983"><b>Lorenzo Zuccola</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=1202541"><b>Yuri Duranti</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=2664533"><b>Antonio Tosinghi</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
7. <a href="player.php?playerid=2666147"><b>Massimo Biffo</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=1558952"><b>Gianni Cristoferi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=1730075"><b>Ignazio Perseo</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=1711234"><b>Oscar Verrina</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Japan</b><br/>
1. <a href="player.php?playerid=4604174"><b>Toshio Nakasawa</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
2. <a href="player.php?playerid=4366681"><b>Kyou Arai</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=4317228"><b>Jiro Ishikawa</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
4. <a href="player.php?playerid=4256707"><b>Takumi Takahashi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=4455101"><b>Yuuta Miyamoto</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
6. <a href="player.php?playerid=4408420"><b>Kazuki Nagase</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
7. <a href="player.php?playerid=4570136"><b>Minoru Ibi</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
8. <a href="player.php?playerid=4255210"><b>Sho Sarumara</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
9. <a href="player.php?playerid=4494691"><b>Yuuto Idane</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
10. <a href="player.php?playerid=4570131"><b>Kenta Maruyama</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>

<br/><b>Latvia</b><br/>
1. <a href="player.php?playerid=2945170"><b>Mārcis Freibergs</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=1382374"><b>Juris Banko</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=1759038"><b>Aleksejs Pedars</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=1228423"><b>Svens Kaminskis</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=3310210"><b>Aloizs Akīmovs</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=2728033"><b>Alfreds Ēķis</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=1050022"><b>Ivars Barons</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=2117562"><b>Vitālijs Laksa</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=1033125"><b>Gatis Birznieks</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=3177251"><b>Zigmārs Kesenfelds</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Lithuania</b><br/>
1. <a href="player.php?playerid=2403522"><b>Audrius Samuolis</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2375233"><b>Gediminas Zubrus</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=2617343"><b>Aurelijus Vladislas</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
4. <a href="player.php?playerid=2657556"><b>Gedas Savickas</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
5. <a href="player.php?playerid=2408651"><b>Salvijus Vasiliauskas</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
6. <a href="player.php?playerid=2325789"><b>Achilas Mikenas</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
7. <a href="player.php?playerid=2681114"><b>Leopoldas Jurgaitis</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=1379720"><b>Marius Maskoliunas</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=1052574"><b>Robertas Morkūnas</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2794073"><b>Vincas Asmalinovas</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Malaysia</b><br/>
1. <a href="player.php?playerid=3898222"><b>Tuan Conrad</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
2. <a href="player.php?playerid=3843459"><b>Rashidi Fernando</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=3625829"><b>Kong Ben Younes</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=3433565"><b>Kareem Salleh</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=2901416"><b>Tsao Yahp</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=4254367"><b>Andrew Wan</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
7. <a href="player.php?playerid=3652701"><b>Min Wang</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=4254275"><b>Peng Ramlee</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=3190239"><b>Chang Khaw</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=2749617"><b>Li Eng</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>Malta</b><br/>
1. <a href="player.php?playerid=3205217"><b>Emmanuel Cremona</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=1614273"><b>Paul Debrincat</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=1230105"><b>Francesco Mizzi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=4154243"><b>Giuseppe Aquilina</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
5. <a href="player.php?playerid=1067455"><b>Gerald Gauci</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=3070085"><b>Michael Grima</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
7. <a href="player.php?playerid=3843124"><b>James Vella</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
8. <a href="player.php?playerid=1356471"><b>Samuel Cordina</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
9. <a href="player.php?playerid=2000819"><b>Hubert Grima</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
10. <a href="player.php?playerid=1579946"><b>Carmelo Mangion</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Mexico</b><br/>
1. <a href="player.php?playerid=3899664"><b>Hipolito Palacios</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=3134646"><b>Gil Palacios</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=1747953"><b>Saul Cazares</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=2372284"><b>Ixca Sesma</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=3782556"><b>Esperidion Vela</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
6. <a href="player.php?playerid=3114128"><b>Silvestre Najera Rios</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2914926"><b>Octaviano Ayala</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
8. <a href="player.php?playerid=4148893"><b>Isidro Gudiño</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=3843303"><b>Tereso Leon</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2936203"><b>Fabian Meza</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Montenegro</b><br/>
1. <a href="player.php?playerid=3504155"><b>Živko Kokić</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=3444546"><b>Dalibor Ražnatović</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=3298359"><b>Dimitrije Mijović</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
4. <a href="player.php?playerid=3898559"><b>Kostadin Milićević</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
5. <a href="player.php?playerid=3446346"><b>Panto Anđelić</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=4092182"><b>Cvijetin Glogovac</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
7. <a href="player.php?playerid=3202568"><b>Dobrivoje Redžić</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
8. <a href="player.php?playerid=4253595"><b>Novak Sekulić</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
9. <a href="player.php?playerid=3584096"><b>Vlade Papić</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=3190335"><b>Spomenko Gligorić</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Netherlands</b><br/>
1. <a href="player.php?playerid=3505138"><b>Ivan van der Oudenalder</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=3140285"><b>Kyan Zijlstra</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2393133"><b>Christian Blom</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=288488"><b>Ian Dol</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=3043089"><b>Anass Bouland</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=2766233"><b>Maurits Hoekstra</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
7. <a href="player.php?playerid=1147827"><b>Sem Zoer</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
8. <a href="player.php?playerid=1274770"><b>Erik Zwarts</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=3134006"><b>Koen Werkman</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=1711557"><b>Joop Wiegers</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>New Zealand</b><br/>
1. <a href="player.php?playerid=1508971"><b>Brian Baldwin</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
2. <a href="player.php?playerid=2767127"><b>Dominic Blackman</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=2041266"><b>Regan Fell</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
4. <a href="player.php?playerid=4317020"><b>Christopher Switzer</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=3843309"><b>Finn Batistich</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=3967333"><b>Tyrone Dyas</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=3818890"><b>Alex Bacica</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=3843313"><b>Christopher Sarich</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
9. <a href="player.php?playerid=4408252"><b>Seth Carr</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
10. <a href="player.php?playerid=4317027"><b>Dominic Dykins</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Norway</b><br/>
1. <a href="player.php?playerid=4032418"><b>Sander Haraldstad</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=3298363"><b>Kåre Christiansen</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=3504245"><b>Svein Finne</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=2010734"><b>Ole Woll</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=3747938"><b>Busby Bratberg</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=3784060"><b>Arvid Sandvik</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=3782236"><b>Per Edvardsen</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=3503936"><b>Espen Henriksen</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=3279931"><b>Jokkum Bue</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=3503869"><b>Rolf Bruvik</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>

<br/><b>Peru</b><br/>
1. <a href="player.php?playerid=2711264"><b>Álvaro Olmedo</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=3826256"><b>Nibaldo Alberti</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=3898376"><b>Daniel Feito</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
4. <a href="player.php?playerid=4494654"><b>Juan Pablo Montalbán</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=4255984"><b>Julio César Casaretto</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=4092170"><b>Malcom Gallegos</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=3078377"><b>Andrés Henríquez</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=2901405"><b>Reinaldo Gatti</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
9. <a href="player.php?playerid=3484653"><b>Brandon Aracena</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2901406"><b>Raúl Obregón</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>

<br/><b>Philippines</b><br/>
1. <a href="player.php?playerid=2950624"><b>Johnnie Francis</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
2. <a href="player.php?playerid=1020159"><b>Joel Luna</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=4091792"><b>Gani Mangubat</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=3967106"><b>Christopher Duremdes</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=2297857"><b>Arsenio Álvarez</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
6. <a href="player.php?playerid=2865148"><b>Juliano Cucueco</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=1289840"><b>Juanito Mapúa</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
8. <a href="player.php?playerid=4148413"><b>Benjie Orais</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
9. <a href="player.php?playerid=3601920"><b>Jeffrey Rabanal</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=4091804"><b>Jose Mendoza</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Poland</b><br/>
1. <a href="player.php?playerid=1937897"><b>Adam Kruszelnicki</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=1938256"><b>Antoni Rzornek</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=1522411"><b>Seweryn Przybyszewski</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=1555055"><b>Feliks Hobienicki</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=2718558"><b>Aleksander Szuldrzyński</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=2699113"><b>Udo Bruch</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=853422"><b>Piotr Stachurski</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=1961122"><b>Konrad Uzdowski</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=2428598"><b>Mateusz Bosacki</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2631128"><b>Czesław Jordanowski</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>

<br/><b>Portugal</b><br/>
1. <a href="player.php?playerid=1751507"><b>Eduardo Gouveira</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=2410717"><b>Alfredo Trabucho</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=1116675"><b>Adolfo Guanartème</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=2648845"><b>Fabiano Leote</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=1535916"><b>Agostinho Manolas</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=1964024"><b>Orlando Maurício</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
7. <a href="player.php?playerid=1501190"><b>Eduardo Antunes</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
8. <a href="player.php?playerid=2040341"><b>Adriano Fernandes</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=2381341"><b>Júlio Campinos</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=2057036"><b>Isidoro Feyst</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Puerto Rico</b><br/>
1. <a href="player.php?playerid=4455135"><b>Armando Álvarez</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
2. <a href="player.php?playerid=4494706"><b>Cordaro Natal</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
3. <a href="player.php?playerid=4494707"><b>Julio Rodríguez</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
4. <a href="player.php?playerid=4603177"><b>Ezequiel Fontán</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=4605514"><b>Antonio Rangel</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=4534640"><b>Serafin Ximénez</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=4536074"><b>Marco Córdova</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
8. <a href="player.php?playerid=4365618"><b>Clourindo Soto</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=4451644"><b>Peter Laureano</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
10. <a href="player.php?playerid=4454544"><b>Andrés Natal</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Romania</b><br/>
1. <a href="player.php?playerid=1557386"><b>Stefan Scurtici</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
2. <a href="player.php?playerid=135114"><b>Iosef Grubachihi</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=2456896"><b>Augustin Sorodoc</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=1132035"><b>Nelu Nutu</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
5. <a href="player.php?playerid=1215349"><b>Iustinian Arsene</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=1043179"><b>Filip Zvanca</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
7. <a href="player.php?playerid=2193321"><b>Arsenie Mituletcu</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
8. <a href="player.php?playerid=3144903"><b>Emanuel Raducu</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=521498"><b>Andrica Ploscaru</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=2287943"><b>Neculai Serbu</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Russia</b><br/>
1. <a href="player.php?playerid=2593224"><b>Vasiliy Jefimkin</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2702859"><b>Vladimir Shestakov</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=1127178"><b>Vladik Pakhomov</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
4. <a href="player.php?playerid=3843163"><b>Bronislav Kuzmin</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
5. <a href="player.php?playerid=2619882"><b>Vladimir Bobrov</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=4091822"><b>Alexander Vinogradov</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
7. <a href="player.php?playerid=1855083"><b>Fedor Chuprov</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=3967185"><b>Klim Alifanov</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
9. <a href="player.php?playerid=2883052"><b>Bronislav Lapin</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=3433162"><b>Karl Ivantszov</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>Serbia</b><br/>
1. <a href="player.php?playerid=1669149"><b>Veselin Borojević</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=2072654"><b>Gradimir Zimonjić</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=725326"><b>Radomir Vidojković</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
4. <a href="player.php?playerid=2379500"><b>Sava Andrejević</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
5. <a href="player.php?playerid=2435412"><b>Rodoljub Lemić</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=1140436"><b>Rajko Dabić</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=3115078"><b>Stamenko Čabarkapa</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
8. <a href="player.php?playerid=3127774"><b>Radmilo Sekulić</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=2712855"><b>Stanko Cugalj</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=2647550"><b>Bane Lukić</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>Slovakia</b><br/>
1. <a href="player.php?playerid=1508323"><b>Cyprián Gubrický</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
2. <a href="player.php?playerid=1516887"><b>Drahoslav Skrován</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=641072"><b>Jozef Bajčev</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=3045347"><b>Maroš Prepelica</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=4091093"><b>Vratislav Sluštík</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
6. <a href="player.php?playerid=2933830"><b>Vavrinec Lauroško</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
7. <a href="player.php?playerid=2961967"><b>Slavomír Petian</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=2839110"><b>Ľubomír Isteník</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=1019853"><b>Kornel Boško</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=3269385"><b>Samuel Pelčarský</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Slovenia</b><br/>
1. <a href="player.php?playerid=1023277"><b>Erazer Mori</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
2. <a href="player.php?playerid=2332213"><b>Peter Zavrl</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
3. <a href="player.php?playerid=1118780"><b>Jure Bratič</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=2412974"><b>Štefan Urbanc</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
5. <a href="player.php?playerid=1359381"><b>Nejc Tomšič</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=143125"><b>Urko Bartol</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2347068"><b>Tadej Gams</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
8. <a href="player.php?playerid=1534824"><b>Matjaž Možina</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=1596283"><b>Vid Velkavrh</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2264779"><b>Jakob Kodela</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>South Korea</b><br/>
1. <a href="player.php?playerid=3673213"><b>Jung-Chul Au</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=4253805"><b>Doo-Hwan Shim</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2333247"><b>Hyun-Gi Kwon</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=3433507"><b>Hyun-Shik Choi</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=3843411"><b>Jung-Hwa Phang</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=3783996"><b>Hoi-chang Moon</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=3154808"><b>Soon-kwon Ou</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
8. <a href="player.php?playerid=4092113"><b>Myung-Bak Zhin</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
9. <a href="player.php?playerid=3967453"><b>Seung-Min Cho</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=3145643"><b>Sung-Wook Choi</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Spain</b><br/>
1. <a href="player.php?playerid=2025423"><b>Jesús Pujol</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2346685"><b>José Ángel Suárez</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=2296491"><b>Manuel Campos</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=236128"><b>Manuel Villacres</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=2824377"><b>Rafael Peláez</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=2295954"><b>José Luís Velasco</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2004884"><b>Bernardo Díaz</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=2450012"><b>Agustín Martínez</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=1117202"><b>Darío Sanz</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=1388341"><b>Joaquín Gil</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Sweden</b><br/>
1. <a href="player.php?playerid=2121229"><b>Åke Torstensson</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
2. <a href="player.php?playerid=1593901"><b>Matteo Jansson</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=3078267"><b>Jonah Fredriksson</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=2988738"><b>Leandro Öberg</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=2665314"><b>Ove Nyberg</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
6. <a href="player.php?playerid=848206"><b>Max Lejon</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
7. <a href="player.php?playerid=1824474"><b>Gustaf Lundström</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
8. <a href="player.php?playerid=2778397"><b>Josef Andersson</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=754210"><b>Timmy Svan</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
10. <a href="player.php?playerid=2696859"><b>Alvin Lund</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>

<br/><b>Switzerland</b><br/>
1. <a href="player.php?playerid=1179985"><b>Raphael Frischknecht</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
2. <a href="player.php?playerid=2996351"><b>Michele Keller</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=3198364"><b>Hubert Amstutz</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
4. <a href="player.php?playerid=2763869"><b>Alain Sigrist</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
5. <a href="player.php?playerid=2577981"><b>Jean-Claude Baur</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=688421"><b>Alex Cavalli</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
7. <a href="player.php?playerid=4091066"><b>Raffael Wettstein</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
8. <a href="player.php?playerid=2377614"><b>Thomy Allet</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
9. <a href="player.php?playerid=2490092"><b>Benedikt Bachman</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
10. <a href="player.php?playerid=2069130"><b>Marco Daenzler</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>

<br/><b>Thailand</b><br/>
1. <a href="player.php?playerid=2902207"><b>Brane Bevc</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=1729625"><b>Ratanankorn Jetjirawat</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
3. <a href="player.php?playerid=3967346"><b>Tong Tanasugarn</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=2346939"><b>Anurak Kasamsun</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
5. <a href="player.php?playerid=2733051"><b>Ting Songprawati</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=3024372"><b>Ngam Parnthong</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=2431340"><b>Loesan Kawrungruang</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=4251657"><b>Chalermchai Klinpayom</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=4091994"><b>Pairote Rai</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
10. <a href="player.php?playerid=3583932"><b>Piya Sarit</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

<br/><b>Tunisia</b><br/>
1. <a href="player.php?playerid=1951967"><b>Othmen Jannaoui</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=2519994"><b>Khaled Mzali</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
3. <a href="player.php?playerid=4206358"><b>Riadh Chiba</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
4. <a href="player.php?playerid=2029149"><b>Sabri Tayeb</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=3094973"><b>Chiheb Fadhel</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=3653954"><b>Marwane Thabet</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
7. <a href="player.php?playerid=4149626"><b>Adham Ezzat</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=3900571"><b>Alaeddine Eyadema</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=4152921"><b>Farid Shousha</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
10. <a href="player.php?playerid=2901371"><b>Wajdi Aloui</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>

<br/><b>Turkey</b><br/>
1. <a href="player.php?playerid=2296687"><b>Koçer Elalmaz</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
2. <a href="player.php?playerid=1124676"><b>Ender Sezgin</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=1201976"><b>Rüknettin Özbalci</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
4. <a href="player.php?playerid=2851276"><b>Menderes Solmaz</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=1474192"><b>Ilkser Belenardiç</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=1561502"><b>Kutlualp Izel</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
7. <a href="player.php?playerid=1796455"><b>Rafet Özdem</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
8. <a href="player.php?playerid=2031198"><b>Sualp Arkadas</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=3545957"><b>Ali Teneke</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2755556"><b>Ongu Dikmen</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>

<br/><b>Ukraine</b><br/>
1. <a href="player.php?playerid=2075178"><b>Vladyslav Pelyuk</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=1973040"><b>Yakiv Andrukhovych</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
3. <a href="player.php?playerid=2423973"><b>Petro Stefaniuk</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
4. <a href="player.php?playerid=4252950"><b>Leonard Moiseenko</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
5. <a href="player.php?playerid=3191320"><b>Sasha Naumenko</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
6. <a href="player.php?playerid=3898731"><b>Oleksander Shynkar</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=2749192"><b>Alexey Us</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
8. <a href="player.php?playerid=3783022"><b>Dmytro Bondar</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
9. <a href="player.php?playerid=3653074"><b>Tiger Chalenko</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
10. <a href="player.php?playerid=3206268"><b>Serj Lyubchenko</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>

<br/><b>United Kingdom</b><br/>
1. <a href="player.php?playerid=3205484"><b>Mickey Bradley</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
2. <a href="player.php?playerid=676662"><b>Simon Hardwicke</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
3. <a href="player.php?playerid=2047734"><b>George Reynolds</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=2821264"><b>Gordon Hope</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=651045"><b>Dylan Hamilton</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=2698614"><b>Max Kelly</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
7. <a href="player.php?playerid=3502870"><b>Humphrey Belgrove</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=2358208"><b>Fergal Averill</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=3091323"><b>Tommy Tyrrell</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
10. <a href="player.php?playerid=2648773"><b>George Middleton</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>

<br/><b>Uruguay</b><br/>
1. <a href="player.php?playerid=1196360"><b>Giuseppe Ortega</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
2. <a href="player.php?playerid=1676712"><b>Álvaro Quiroz</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
3. <a href="player.php?playerid=3124075"><b>Darío Ríos</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>
4. <a href="player.php?playerid=1186022"><b>Chocolato Ortiz</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
5. <a href="player.php?playerid=3096806"><b>Juan Caballero</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
6. <a href="player.php?playerid=1137297"><b>Felipe Escobar</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
7. <a href="player.php?playerid=3309186"><b>José Garza</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
8. <a href="player.php?playerid=2669500"><b>Rafael Rodriguez</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
9. <a href="player.php?playerid=2985153"><b>Pablo Fajardo</b></a> (<?php echo $langmark929,": ",$langmark123;?>)<br/>
10. <a href="player.php?playerid=3061474"><b>Javier López</b></a> (<?php echo $langmark929,": ",$langmark120;?>)<br/>

<br/><b>USA</b><br/>
1. <a href="player.php?playerid=1581987"><b>Harrison Crews</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
2. <a href="player.php?playerid=2393361"><b>Adolfo Becerra</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
3. <a href="player.php?playerid=1960144"><b>Rufus Lamb</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
4. <a href="player.php?playerid=2669641"><b>Elbert Hannah</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=3306194"><b>Rodrigo Luther</b></a> (<?php echo $langmark929,": ",$langmark125;?>)<br/>
6. <a href="player.php?playerid=1617324"><b>Arthur Crawford</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
7. <a href="player.php?playerid=309755"><b>Mike Ridley</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
8. <a href="player.php?playerid=2648992"><b>Anthony Leslie</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
9. <a href="player.php?playerid=3588031"><b>Lance Tracy</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=2347958"><b>Willard Fay</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>

<br/><b>Venezuela</b><br/>
1. <a href="player.php?playerid=3308371"><b>Alejandro Graterol</b></a> (<?php echo $langmark929,": ",$langmark122;?>)<br/>
2. <a href="player.php?playerid=4092019"><b>Richard Panacual</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
3. <a href="player.php?playerid=1479649"><b>Humberto Acuña</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
4. <a href="player.php?playerid=3136988"><b>Julio Friedel</b></a> (<?php echo $langmark929,": ",$langmark121;?>)<br/>
5. <a href="player.php?playerid=2167192"><b>Christian Yapur</b></a> (<?php echo $langmark929,": ",$langmark127;?>)<br/>
6. <a href="player.php?playerid=3719945"><b>Dilan Conde</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>
7. <a href="player.php?playerid=3596229"><b>Carlos Marcano</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
8. <a href="player.php?playerid=3503594"><b>Marcos Ortega</b></a> (<?php echo $langmark929,": ",$langmark124;?>)<br/>
9. <a href="player.php?playerid=3719950"><b>Moises Fernández</b></a> (<?php echo $langmark929,": ",$langmark128;?>)<br/>
10. <a href="player.php?playerid=3782075"><b>Alejandro Vivas</b></a> (<?php echo $langmark929,": ",$langmark126;?>)<br/>

</td><td class="border" width="44%">

<?php
$query = mysql_query("SELECT players.id AS id, players.name AS ime, players.surname AS priimek, players.age AS age, players.wage AS wage FROM players, transfers WHERE players.id=transfers.playerid AND transfers.playerclub ='Free Agent' AND transfers.bidingteam ='$userid' ORDER BY players.wage DESC LIMIT 250") or die(mysql_error());
$num = mysql_num_rows($query);?>
<h2><table cellpadding="0" cellspacing="0" width="100%" border="0"><tr><td><?=$langmark932?></td><td align="right"><?=strtolower($langmark118),"&nbsp;"?></td></tr></table></h2>
<br/><table width="100%" cellspacing="1" cellpadding="0">
<?php
$i=0;
while ($i < $num) {
$id = mysql_result($query,$i,"id");
$name = mysql_result($query,$i,"ime");
$surname = mysql_result($query,$i,"priimek");
$age = mysql_result($query,$i,"age");
$wage = mysql_result($query,$i,"wage");
echo "<tr><td align=\"left\">",($i+1),". <a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a> (",$age,")</td><td align=\"right\">",number_format($wage),"&nbsp;&euro;</td></tr>";
$i++;
}
echo "</table>";
if ($i==0) {echo $langmark933;} else {
$jaba = @mysql_query("SELECT * FROM events WHERE type=2 AND team='$trueclub'");
$mum = @mysql_num_rows($jaba);
//$najto = @mysql_query("SELECT max(EV) as topev FROM transfers WHERE playerclub='Free Agent' AND bidingteam='$userid' LIMIT 1");
//$najres = @mysql_result($najto,0);
echo "<br><h2>Your stats</h2><br/><b>",$i,"</b> - total picks made<br/><b>",$mum,"</b> - total scouts hired<br/><b>",round($mum/$i,1),"</b> - scouts hired per pick<!--<br/><br/><b>",number_format($najres)," &euro;</b> - top EV signing-->";}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>