<?php
include_once("common.php");
df
/*
no yt warning?! (hitrejši trening?!?!!!!!! bonus na kovča?!!!!!!!! dam to v adminews?!!!!!!!)
preslabi kovči!!
večje arene!! (nizek obisk!)
fatigue!!!!!!

1) MODi in LAji mass za cheer in BAM > odstranim neaktivne (pišem jim, tudi tistim KI SEM JIH ŽE!)
+modi: u18 ime nitk, preveč stickijev, cheer, prazni stickiji/stari, elec rules združijo s pravili!
2) supp msg in pa mogoče bivšim  [[ko bo market search save in tist top guardi itd.]]
3) mass za preslabe kovče (oboje pod 65, nemotivirani, previsoke plače)  ++PRED NAJEMNJEM 75- WARN!!
4) yt friendlies mass vsem ki niso + navodila (tudi na strani za v bodoče)
5) low MC warn oz fatigue, slaba arena in vse podobno!
preslabi kovči, odhod, retire... pod % motivacijo resigned!
6) no logo mass - prej save upload (mogoče anketa naj logo)

++ycwc frendliji mass (zmage..)
++no yt warning

$izbor = mysql_query("SELECT userid FROM `users` WHERE userid=1") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM users WHERE lang='fre'") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM users WHERE level >1") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM `users` WHERE `natcoach`=2") or die(mysql_error());
$izbor = mysql_query("SELECT user as userid FROM `fantasy` WHERE `compet` =7 AND `week` =7") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM `conf_user_folder` , users WHERE user_id = userid AND `folder_id` LIKE 'National coaches'") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM `users`, teams WHERE club=teamid AND (country LIKE 'Malaysia' OR country LIKE 'Indonesia' OR country='Montenegro')") or die(mysql_error());
$izbor = mysql_query("SELECT DISTINCT userid FROM `users`, players WHERE players.club = users.club AND country = 'France' AND coach =0 AND age <20 AND users.club NOT IN (SELECT tp_contest.team FROM tp_contest)") or die(mysql_error());
$izbor = mysql_query("SELECT DISTINCT userid FROM players, users WHERE users.club = players.club AND coach =0 AND quality >0") or die(mysql_error());
$izbor = mysql_query("SELECT DISTINCT userid FROM `users`, players WHERE players.club = users.club AND height <170 AND coach =0 AND users.club NOT IN (SELECT tp_contest.team FROM tp_contest)") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM users, ekipe WHERE club=ekipa AND competition=99") or die(mysql_error());
$izbor = mysql_query("SELECT distinct userid FROM `matches`, users WHERE home_id=club and season=19 and type=1 and crowd1=0 and (`lid_round` =302 OR `lid_round` =296 OR `lid_round` =307 OR `lid_round` =299 OR `lid_round` =300 OR `lid_round` =318 OR `lid_round` =315 OR `lid_round` =297 OR `lid_round` =319 OR `lid_round` =304 OR `lid_round` =305 OR `lid_round` =309 OR `lid_round` =301 OR `lid_round` =317 OR `lid_round` =313 OR `lid_round` =295 OR `lid_round` =329 OR `lid_round` =566 OR `lid_round` =573 OR `lid_round` =570)") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM users, players WHERE users.club=players.club and coach=1 and motiv < 80") or die(mysql_error());
$izbor = mysql_query("SELECT userid FROM `competition` , leagues, users WHERE ((leagues.level =5 AND position >2) OR (leagues.level =4 AND position >11)) AND season =18 AND country = 'Italy' AND competition.teamid = club AND leagues.leagueid = competition.leagueid AND last_Active > '2013-07-22 23:59:59'") or die(mysql_error());
*/

$izbor = mysql_query("SELECT DISTINCT userid FROM `users` , players WHERE players.club = users.club AND coach =0 AND experience <9 AND shooting >68 AND users.club NOT IN (SELECT tp_contest.team FROM tp_contest)") or die(mysql_error());

while($i=mysql_fetch_array($izbor)) {
$user=$i["userid"];
$date=$i['date'];

echo "<a href=\"http://www.basketsim.com/club.php?clubid=",$user,"\">",$user,"</a><br/>";

mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '3-point contest', 'Hello! This is a message regarding an opportunity that you have to enter the latest <a href=\"threepointers.php\">3-point contest</a> and fight for a special award provided by the contest sponsor <a href=\"club.php?clubid=16703\">zarathustra83</a>! To fight for the special prize, you must enter the contest with player, who has none (0) experience level!<br/><br/>Best of luck!<br/>admin')") or die(mysql_error());

/*
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>To: national coaches</b>', 'Hello!<br/><br/>This is a rare mass notice to both, senior and junior national coaches and it\'s just to let you know that <b>16th of August</b> have been added as a friendly date a bit later than usual, so make sure to get a NT friendly match in two days time.<br/><br/>For junior coaches it\'s also worth noticing that qualification dates have been <b>fixed</b>. Previous dates were wrong and unfair towards the new coaches, who deserve at least that one friendly setup before the start of qualifications. So this notice is also a warning to all junior NT coaches to <i>get a friendly match for this Friday evening</i> and make the best out of it.<br/><br/>Best of luck to all national coaches with your season 19 plans!<br/>admin<br/><br/>BTW if you already have friendly fixture for Friday evening, you can easily ignore this message :)')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 1, 0, NOW(), '<b>To: language administrators</b>', 'Hello! Please contact me as soon as you will be online, because translations of new skill levels are needed! Just reply to this message as soon as you see it!<br/><br/>Thank you!<br/>adiego')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Coach motivation</b>', 'Hello! Club staff have noticed lately that your coach have motivation issues, so you should really think about offering him a new contract and that will improve your club training significantly! To offer your coach a new contract or to fire him and get a new one, visit <a href=\"training.php\">training</a> page.<br/><br/>Regards,<br/>IBF (International Basketim Federation)')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Youth club World Cup</b>', 'Hello!<br/><br/>In the final week of the season, Youth Club World Cup is taking place and your team is in it! YCWC is a special competition, a win-win for everyone - win and you play the next day again, lose and you can finally promote your 17 year old stars! You can read more about the contest in <a href=\"index.php\">news section</a>, the most important thing to know is that YCWC is starting <b>tonight</b>, so be ready and if you win your first match, don\'t forget to set the next one just 24 hours later!<br/><br/>Congratulatons and keep up the superb job you\'re doing with your youngsters!<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>League fixtures</b>', 'Hello!<br/><br/>Due to changed league structure in your country, some leagues needed fixtures to be re-calculated and that includes your league. So please make sure to check your fixtures again and also set your settings for the first round matches!<br/><br/>Best regards<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '3-point contest', 'Hello! This is a message regarding the opportunity you have as an owner of player sized under 170 cm. There is a special award available for such players in the latest <a href=\"threepointers.php\">3-point contest</a> provided by the contest sponsor <a href=\"club.php?clubid=87174\">MrJoyce</a> so you can enter and try to win the award!<br/><br/>Best of luck!<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), 'Dual nationality', 'Congratulations! You are an owner of at least one player with dual nationality. This is a really special achievement, because there are just 189 players with dual nationality in Basketsim right now, while there are 1.520.113 players in Basketsim in total!<br/><br/>Best regards<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), 'WC Fantasy', 'World Cup Fantasy game was opened a bit early this week, so if you have received this message, this is just to let you know that some changes are possible to which players can be picked as starters and which can be picked as benchers, so re-check your <a href=bsfantasy.php>lineup</a> to make sure that you can get the most out of the current gameweek!<br/><br/>Best regards<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Regarding cup</b>', 'Hello! It has been noticed that there were no cup matches in your country this week, so <b>all club players will receive training this week</b>! Also cup draw will be available until tomorrow and cup will proceed as usual from next week on!<br/><br/>Best regards!<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>To: U19 national coaches</b>', 'Hello! This is a message regarding the issues in tonight\'s U19 friendlies. While switch from U18 to U19 was fully tested, there was just a single safety thing that wasn\'t removed, but it was enough for 19 years olds to be refused from playing. So most matches initially ended up as a walkover and for that reason all matches were restarted at 20:00. However there were still some issues left, because some coaches were clearly unable to move back 19 years olds in time. So for that reason, replay of walkover matches is possible on Monday, just let me know if you want to play again. There will also be no mood downgrades tonight, despite the walkovers.<br/><br/>I\'d like to applogize for any inconveniences - the good thing is that such situation cannot occur again!<br/><br/>Best regards and all the best in season 16!<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>New Uruguay regions</b>', 'Hello!<br/>All regions are now available to users from Uruguay. You can change your region free of any cost, just visit <a href=\"club.php?cleanup=region\">this link</a> and pick whatever regions you like.<br/><br/>Best regards to great Uruguayan community!<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>To: U18 national coaches</b>', 'Hello! This is a notice about 19 year old players who are currently still in some of the U18 national teams. 19 yo players are obviously not allowed to play in U18 matches, something that can result in a walkover - the least wanted result for any nation. So this message mostly serves as a note that any such players can still be removed from the U18 selections, before they are removed with an automatic update tomorrow.<br/><br/>Best regards and keep up a good work!<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>3-point contest</b>', 'Current <a href=\"threepointers.php\">3-point contest</a> offers a fantastic opporunity to all users from New Zealand, thanks to <a href=\"club.php?clubid=54025\">skordalias</a>, sponsor of the contest, who\'s giving away a special award for best team from New Zealand! So make sure to submit your player in the contest and maybe you will win a 3 months supportership!<br/><br/>Best regards,<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Additional Philippines leagues</b>', 'Hello!<br/><br/>Since there was not enough clubs for all who wanted to join in season 14, additional clubs were added for Phillipines in this season! Make sure to invite all your friends to join Basketsim, there is now space for many more clubs in your country and new users will not just have fun competing in new leagues, but they will also help your already great national team to go even further in the future!<br/><br/>Best regards and all the best to Philippines community!<br/><br/>With respect,<br/>Basketsim admin')") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>U19 WC host vote</b>', 'Hello! As a member of the national coaches forum, you have the priviledge to cast your vote in U19 World Cup host selection. To do that, head to Basketsim forums, go to National coaches forum and write the name of the country you prefer in the sticky thread <b>[VOTE]U19 host</b> - if you haven\'t done so already!<br/><br/>Thank you for your help!<br/>admin')") or die(mysql_error());
*/
}
?>