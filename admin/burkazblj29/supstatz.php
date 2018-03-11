<?php
ini_set("max_execution_time",6000);
require_once("cron2conect.php");
mysql_query("TRUNCATE TABLE supstats");
$izbor = mysql_query("SELECT DISTINCT country FROM regions");
$k=0;
while ($k < mysql_num_rows($izbor)) {
$country = mysql_result($izbor,$k);
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=16 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=17 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=18 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=19 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=20 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=21 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=22 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=23 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=24 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=25 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=26 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=27 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=28 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age=29 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND age>29 ORDER BY wage DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}

$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=16 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=17 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=18 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=19 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=20 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=21 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=22 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=23 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=24 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=25 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=26 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=27 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=28 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=29 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age>29 ORDER BY last_training DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}

$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=16 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=17 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=18 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=19 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=20 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=21 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=22 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=23 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=24 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=25 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=26 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=27 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=28 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age=29 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$kn = mysql_query("SELECT id, players.name AS n, age, club, surname, players.country AS c, wage, last_position, star_qual, star_posit, ntplayer, last_training FROM players, teams WHERE players.country='$country' AND club=teamid AND coach=0 AND last_position<>0 AND age>29 ORDER BY star_qual DESC LIMIT 50");
while ($b = mysql_fetch_array($kn)) {
$id = $b[id];
$n = $b[n];
$age = $b[age];
$klub = $b[club];
$sur = $b[surname]; $na = $n." ".$sur;
$c = $b[c];
$wag = $b[wage];
$lasp = $b[last_position];
$squa = $b[star_qual];
$spos = $b[star_posit];
$nt = $b[ntplayer];
$last = $b[last_training];
mysql_query("INSERT IGNORE supstats VALUES ('$id', '$na', '$age', '$klub', '$c', '$wag', '$lasp', '$squa', '$spos', '$last', '$nt')") or die(mysql_error());
}
$k++;
}
mysql_query("alter table supstats order by wage desc") or die(mysql_error());
echo "supp statsi all good!";
?>