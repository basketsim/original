<?php
ini_set("max_execution_time", 2000);
require_once('cron2conect.php');

//HELP-1
$dan = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$dan); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-1,$ffyear));
$izbor = mysql_query("SELECT userid FROM users WHERE signed LIKE '$ffdate%'") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$user = mysql_result($izbor,$t,"userid");
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<font color=\"green\"><b>Help message #1 (Matches and Tactics)</b></font>', 'So it\'s your 2nd day in Basketsim! For a couple of weeks you will receive help messages, read them carefully! You can see the list of your future matches when you click on <b>Matches</b> in the menu. Next to each of the future matches you see an option <b>orders</b>, click it to prepare tactics and lineup for a match. You can read everything about tactics in the relevant <a href=\"gamerules.php?action=tactics\">game rules section</a>. Don\'t forget to set your orders at least 30 minutes before match start and it\'s always smart to set the full lineup to avoid losing with a walkover.<br/><br/><i>You will receive your next help message in two days!</i>')") or die(mysql_error());
echo "HELP1: ".$user."_";
$t++;
}

//HELP-2
$dan = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$dan); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-3,$ffyear));
$izbor = mysql_query("SELECT userid FROM users WHERE signed LIKE '$ffdate%'") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$user = mysql_result($izbor,$t,"userid");
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<font color=\"green\"><b>Help message #2 (Players and Market)</b></font>', 'When you click <b>Players</b> in the left menu, you see a list of players signed to your club. Most of your players are not very good yet, but this will change. In Basketsim it\'s good for players to have multiple good skills, players with just one or two good skills won\'t be helpful at all. For more information on players check the relevant <a href=\"gamerules.php?action=players\">game rules section</a>.<br/><br/>You can buy new players at the <b>Market</b>. When doing so, be very careful at first, not to pay too much. Check transfer histories and prices for similar players. Observe the market, whether someone else is bidding on a player, if there is no interest in him, perhaps his starting price was set too high. There are lots of players available, so no need to hurry with the purchases. Think wise, how much can you afford to spend on players and what kind of salaries can your team afford to pay? You can also use transfer market to sell players.<br/><br/><i>You will receive your next help message in two days!</i>')") or die(mysql_error());
echo "HELP2: ".$user."_";
$t++;
}

//HELP-3
$dan = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$dan); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-5,$ffyear));
$izbor = mysql_query("SELECT userid FROM users WHERE signed LIKE '$ffdate%'") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$user = mysql_result($izbor,$t,"userid");
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<font color=\"green\"><b>Help message #3 (Training and Friendlies)</b></font>', 'Your players can improve with <b>Training</b>. Players are divided in two training groups - guards and big men and you can set a different training plan for each group. It\'s important to have a coach, even a poor coach is better than no coach. If you already have a long-term plan for your team, it might include acquiring and training young players, because they tend to develop fast comparing to the veterans. For more information on training check the relevant <a href=\"gamerules.php?action=training\">game rules section</a>!<br/><br/>In the second part of the season there\'s only one league match played every week, so when you\'ll see your team eliminated from the national cup, always arrange a <b>Friendly</b> match. This will optimize your training, as every player must start one match in a week in order to receive training.<br/><br/><i>You will receive your next help message in two days!</i>')") or die(mysql_error());
echo "HELP3: ".$user."_";
$t++;
}

//HELP-4
$dan = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$dan); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-7,$ffyear));
$izbor = mysql_query("SELECT userid FROM users WHERE signed LIKE '$ffdate%'") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$user = mysql_result($izbor,$t,"userid");
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<font color=\"green\"><b>Help message #4 (Youth and Draft)</b></font>', 'There are several ways to sign players in Basketsim, other than transfer market. Every week you can sign a <b>Youth player</b> from the Camp. High investment (50.000) enables you to have decent chances of getting someone good. Once that you\'ll be able to afford a good coach, it will also make sense to add young players to your Youth team, but until then, promoting them directly to your first team is an option, especially due to a fact that some of them can become a good trainees.<br/><br/>Having a young, rather weak team, you can also benefit from the <b>Draft</b>, so don\'t forget to sign for it as soon as you\'ll have an option to do so. You should always plan your spendings carefully to avoid financial problems, so some features like scouts can wait for the time when your team will already be financially established and that\'s when you\'ll have more fans and larger capacity arena - these two combined will provide you with a good weekly income in the future.<br/><br/><i>You will receive your next help message in two days!</i>')") or die(mysql_error());
echo "HELP4: ".$user."_";
$t++;
}

//HELP-5
$dan = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$dan); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-9,$ffyear));
$izbor = mysql_query("SELECT userid FROM users WHERE signed LIKE '$ffdate%'") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$user = mysql_result($izbor,$t,"userid");
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<font color=\"green\"><b>Help message #5 (Community and Forums)</b></font>', 'Basketsim is a place where thousands of managers from all over the World meet. You can see for yourself, which managers are <a href=\"whosonline.php\">online</a> at the time. This list gets especially useful in the second half of the season, when you\'re searching opponents for friendly matches and you need clubs to send challenge to. You can interact with others on <a href=\"indexconf.php\">Basketsim forums</a>. You are a member of your national forum by default, but you can easily sign for several other forums as well, by simply picking them from the list of forums (just click the icon next to any forum name to join). Forums are a perfect place to ask questions, discuss different aspects of the game with other users or just chat about anything related or non-related to Basketsim.<br/><br/>You can also use the leagueboards - every league has it\'s own forum called the leagueboard and you can talk to your league-mates there or just follow their recent transfers which are automatically posted there. You\'ll find a leagueboard link at the top of your league page.<br/><br/><i>You will receive your next help message in two days!</i>')") or die(mysql_error());
echo "HELP5: ".$user."_";
$t++;
}

//HELP-6
$dan = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$dan); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-11,$ffyear));
$izbor = mysql_query("SELECT userid FROM users WHERE signed LIKE '$ffdate%'") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$user = mysql_result($izbor,$t,"userid");
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<font color=\"green\"><b>Help message #6 (Gamerules and Supporter)</b></font>', 'With several short help messages we have attempted to show you the basics of Basketsim. It\'s highly recommended to read the <a href=\"gamerules.php\">Game Rules</a> - you will find more information there and they will help you to learn how to play and master the game. And while the first can be easy, the second can be pretty difficult and will offer you a lot of challenge!<br/><br/>Basketsim is a project with ongoing developement, new features are added every season and old features are improved regulary. Every user can <a href=\"supporter.php\">Support</a> the game and gain additional features in return. However all users are welcome to play at any time! And when you\'ll start to love the game, don\'t forget to invite your friends to join too!<br/><br/><i>You will receive your final help message in two days!</i>')") or die(mysql_error());
echo "HELP6: ".$user."_";
$t++;
}

//HELP-7
$dan = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$dan); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-13,$ffyear));
$izbor = mysql_query("SELECT userid FROM users WHERE signed LIKE '$ffdate%'") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$user = mysql_result($izbor,$t,"userid");
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<font color=\"green\"><b>Help message #7 (Arena Upgrade)</b></font>', 'It\'s 14 days already since you\'ve become a member of the Basketsim community. You have read all the help messages and your club is starting tough, yet rewarding way to a success! But in order to succeed, your team will need a decent arena to host all the fans who want to follow your home matches. When you\'ll decide to increase your arena, a nearby construction company will provide you with a special discount, but to obtain it, you\'ll have to add at least 1000 (or more) seats in the upper level section of your <a href=\"arena.php\">Arena</a>.<br/><br/>We wish you best of luck in your Basketsim career!<br/>Basketsim admins')") or die(mysql_error());
echo "HELP7: ".$user."_";
$t++;
}

echo "| HeLp OdPoSlaN |";
?>