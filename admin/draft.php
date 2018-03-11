<?php
ini_set("max_execution_time",1500);
include_once("common.php");

/*
BEFORE THIS SCRIPT PLAYERS MUST BE CREATED BY DRAFT_PLAYERS.PHP

always uncomment below in script only the action you want to run - be careful!

1. backup tables draft and drafters
2. removing teams with arenas under 1500 seats or too little players (rules can be adjusted to avoid this)
SELECT teams.teamid, sum(seats1+seats2+seats3+seats4) as dess FROM `arena` , teams WHERE arena.teamid = teams.teamid AND draft =1 GROUP BY teams.teamid ORDER BY dess ASC
SELECT club, count( * ) FROM `players` , teams WHERE club = teamid AND draft =1 GROUP BY club ORDER BY count( * ) ASC
3. wait for last daily update before draft to pass and then comment out draft update until the end of the season
4. adjusting number of players in draft to number of clubs signed | $kul = mysql_query("SELECT club FROM users"); while ($pin = mysql_fetch_array($kul)) {$id = $pin['club']; $lopa = mysql_query("SELECT * FROM drafters WHERE team=$id"); if (mysql_num_rows($lopa)>1) {echo $id,"<br/>";}} die("__");
5. update of salaries for players (below)
6. public announcement and potential news message
7. draft_insert and draft_order
8. draft_message (bottom) update text of the message before sending
9. draft_finish cron must be turned on
*/

/*
//ODSTRANITEV neaktivnih USERJEV ZA DRAFT (niso se logirali cca 1-2 meseca)
$piksl = mysql_query("SELECT users.club FROM users, teams WHERE users.club = teams.teamid AND teams.draft =1 AND users.last_active < '2014-04-16 03:30:00'") or die(mysql_error());
$p=0;
while ($p < mysql_num_rows($piksl)) {
$ping = mysql_result($piksl,$p);
echo $ping,"<br/>";
mysql_query("UPDATE teams SET curmoney=curmoney+190000, draft=0 WHERE teamid = $ping LIMIT 1") or die(mysql_error());
mysql_query("DELETE FROM drafters WHERE team=$ping LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $ping, NOW(), 'Your draft entry was removed due to inactivity. Signup cost was refunded.', 0, 190000)") or die(mysql_error());
$p++;
}
$piksl = mysql_query("SELECT users.club FROM users, teams WHERE users.club = teams.teamid AND teams.draft =1 AND users.bad_login > 98 AND users.last_active < '2014-06-01 03:30:00'") or die(mysql_error());
$p=0;
while ($p < mysql_num_rows($piksl)) {
$ping = mysql_result($piksl,$p);
echo $ping,"<br/>";
mysql_query("UPDATE teams SET curmoney=curmoney+190000, draft=0 WHERE teamid = $ping LIMIT 1") or die(mysql_error());
mysql_query("DELETE FROM drafters WHERE team=$ping LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $ping, NOW(), 'Your draft entry was removed due to club closure. Signup cost was refunded.', 0, 190000)") or die(mysql_error());
$p++;
}
die("_PER");
*/

/*
//UPDATE PLAČ
$groza = mysql_query("SELECT `id`, `height`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `experience` FROM `players` WHERE club=99999");
while($r=mysql_fetch_array($groza)) {
$id=$r["id"];
$height=$r["height"];
$handling=$r["handling"];
$speed=$r["speed"];
$passing=$r["passing"];
$vision=$r["vision"];
$rebounds=$r["rebounds"];
$position=$r["position"];
$freethrow=$r["freethrow"];
$shooting=$r["shooting"];
$defense=$r["defense"];
$experience=$r["experience"];
$w = (($handling * (((-tanh((($height-190)/6)-2.5))/4)+0.75)) + ($speed * (((-tanh((($height-190)/6)-2.5))/10)+0.9)) + ($passing * (((-tanh((($height-190)/6)-2.5))/6.5)+0.75)) + ($vision * ((((tanh((($height-180)/3)-2.5))/20)+0.85)+(((-tanh((($height-200)/3)-2.5))/10)+0.8)-0.9)) + ($rebounds * (((tanh((($height-185)/6)-2.5))/2.5)+0.6)) + ($position * ((((-tanh((($height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($freethrow) + ($shooting * ((((tanh((($height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($height-200)/3)-2.5))/6.6)+0.85)-1)) + ($experience * 0.5) + ($defense)) *4;
$w = (($w*$w*$w)/225000)-7500;
mysql_query("UPDATE `players` SET `wage`='$w' WHERE club=99999 AND `id`=$id LIMIT 1") or die("No wage update!");
}
die("wages for 99999 updated!");
*/

/*
$result65 = mysql_query("select *, ((((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9)*((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9))/15)*(((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/240000+(1/(exp(pow(((age-16)/10),4.1)))))*((((workrate/8)+1)/19)+1))*((sqrt((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/180000))/(((-0.231+0.5)*0.71)+0.29)) as tada from players where club=99999 and age=19 UNION select *, ((((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9)*((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9))/15)*(((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/240000+(1/(exp(pow(((age-16)/10),4.1)))))*((((workrate/8)+1)/19)+1))*((sqrt((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/180000))/(((0+0.5)*0.71)+0.29)) as tada from players where club=99999 and age=20 order by tada DESC") or die(mysql_error());
$bum=mysql_num_rows($result65);
$dyear = 2014;
$dday = 16;
$dmonth = 6;
$dhour = 23;
$dmin = 15;
$dsec = 0;
$v=0;
while ($v < $bum) {
$id=mysql_result($result65,$v,"id");
$name=mysql_result($result65,$v,"name");
$surname=mysql_result($result65,$v,"surname");
$age=mysql_result($result65,$v,"age");
$country=mysql_result($result65,$v,"country");
$height=mysql_result($result65,$v,"height");
$kdaj = date("Y-m-d H:i:s", mktime($dhour,$dmin,$dsec-$v*20,$dmonth,$dday,$dyear));
mysql_query("INSERT INTO draft VALUES ('', $v+1, $sez, $id, '$name', '$surname', $age, '$country', $height, 0, '$kdaj', 1);") or die(mysql_error());
$v++;
}
$query = "SELECT pick FROM draft WHERE season=$sez ORDER BY pick ASC";
$dodajanje = mysql_query($query);
$i=0;
while ($i < 1108){
$drafti = mysql_result($dodajanje,$i,"pick");
$hmm = mysql_query("SELECT DISTINCT team FROM drafters ORDER BY `points`+`strength`+`wealth` DESC, wealth DESC") or die(mysql_error());
$bulk = mysql_result($hmm,$i);
echo "DRAFT ST.: ",$drafti," ... DOBI KLUB: ",$bulk,"<br/>";
mysql_query("UPDATE draft SET to_club=$bulk WHERE pick=$drafti AND season=$sez");
$i++;
}
echo "<br/><br/>",$i;
*/

/*
$izbor = mysql_query("SELECT userid, username, `when` FROM draft, users WHERE `to_club` = club AND done =1 AND season =$sez");
while($i=mysql_fetch_array($izbor)) {
$user=$i["userid"];
$username=$i["username"];
$endatum=$i["when"];
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1];
$ffhour=$ffhour.":".$ffmin;
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Draft notice</b>', 'Hi $username! Congratulations on taking part in the 21th Basketsim draft, which will take place <b>today</b> - on Monday the 16th! We are informing you that your club will be eligible to pick a player at around <b>$ffhour</b> (server time)! Please be aware that <u>actual pick time can be significantly different</u>, especially if teams ranked near you will use draft tokens to improve their position, so be online at least one full hour before your predicted pick time, check the draft page often and you will eventually find your team on the list of 100 clubs to pick next. That list will be available and updated thorough the day and linked from the top of the page. You will also be able to use <b>draft tokens</b> from that list <i>(whenever your team is displayed amongst the next 100 to pick you will see an option to use tokens and improve your position with simple clicks on link which will appear next to your team name)</i>.<br/><br/>You can buy draft tokens in <a href=youth.php>youth</a> section, maximum 500 tokens at once and 1500 altogether. When you will use tokens, make sure to be very determined, click fast, as draft picks are made every 20 seconds!<br/><br/>And if you won\'t be able to make it online during your pick time, don\'t worry, your club staff will pick a player for you. And any unused tokens will be almost fully refunded to clubs after the draft is completed.<br/><br/>Enjoy the draft day!<br/>admin')") or die(mysql_error());
}
*/
?>