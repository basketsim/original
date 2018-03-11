<?php
/*
"value not same as..."
"...possible however that some of your early subs have lowered provisional TO rating, something that is not shown in the rating, which is only based on the starting five, but ofcourse during the
buy youth cena v pravila kako je določena; pri buy youth dodatna razlaga na strani, kako in kaj in da je to samo alternativa obstoječemu sistemu +v faq da lahko vsak odpre BY!!
sovpliv ratingov/eventov v sami tekmi (kar se tiče njihove razporeditve, deloma odnosno na tim ratinge)
točna utrujenost, izgubljanje in pa nereset!; =jasno viden fatigue vs taktike +tudi točno pridobivanje XP v tekmah!  |  točen tiredness ter brisanje tirednessa in pridobivanje xpja (ter drugih skillov)
pojasnila in poudarek glede skavt kvalitete in kako vpliva talent; nasploh skavting mehanizem podrobno v help +tudi vse druge stvari bolj podrobno!
league structure in cups v pravila (pod competitions?)         +++random sekcija v rules oz luck ... konstantnost rezultatov omenim, vedno neki porazi, referenca na real life...
def event changing (during match, reported at HT) help; vpliv subs tudi v help in to dodam tam ko mam že tle nekje kako točno subsi potekajo! kdaj sf... kdo namesto... itd.
mogoče rabim v help dodat tudi splošna basket pravila?!
"without yt you can improve st tren"?! ... 'sometimes'    pri utemeljevanju za mlade ekipe?!
foul trouble v pravila, natančen rules za menjave   ;;   princip subskilov
help on crysis situation - to k helpu za novince, vse s cuptempa sem
kako gledati uspeh pri tekmah, kako brati tekme, EV vs uspeh, vsi vplivi na tekme, !variabilen shooting! "not all points scored depend on shooting skill", poudarim pomen defensa in turnoverov(!)
rast EV vs tipi treninga; phys tren podrobno   ;   omenim v pravilih tudi to da se BY redno čisti   ;   poudarim v pravilih da se drugi polčas stvari "izravnavajo"
rulesi ki se odpirajo s pomočjo js na klik (kot win help) mogoče FAQ!    ;    gimme kovč help redirect :/
vpliv defensa na spremenjene star ratinge in team ratinge, proučevanje defensa nasprotnika iz njegovih preteklih match reportov

"there are no guaranteed points in any system. engine works with great depth and it enables various results, however there are no perfect teams in basketsim, so not a single win is 100% ensured and I think this is how it should be but at the same time it's clear from the previous season and also from this one, that all championships are only topped with the high quality teams, so we have both - interesting matches and quality prevailing at the end"
*/

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {include('inc/basic.php');} else {include_once('inc/config.php'); include('inc/header.php'); include('inc/osnova.php');}
?>
<div id="main">
<h2>GAME RULES</h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="68%">
<?php
$action=$_GET['action'];
if ($action=='season' OR $action=='all') {
if ($action=='all') {?>

<a name="GRtop"></a><h3>Game rules - all in one page</h3>
&nbsp;<a href="gamerules.php">back to standard view</a> or <a href="#" onclick="window.print();return false;">print</a><br/><br/>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td align="right" width="4"><font color="darkgreen"><b>0</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch0"><b>Introduction</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>1</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch1"><b>Players</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>2</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch2"><b>Training</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>3</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch3"><b>Youth</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>4</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch4"><b>Transfers</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>5</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch5"><b>Finances</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>6</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch6"><b>Arena</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>7</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch7"><b>Matches</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>8</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch8"><b>Tactics</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>9</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch9"><b>National teams</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>10</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch10"><b>International</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>11</b></a></td><td align="left">&nbsp;&nbsp;<a href="#ch11"><b>Denominations</b></a></td></tr>
</table>
<hr/><a name="ch0"></a><br/><br/>

<?php } else {?><a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=players">Next chapter >></a><br/><br/><?php }?>

<big><b>0. Introduction</b></big><br/><br/>

<b>Basketsim</b> in an online web browser game in which you take control of a basketball team and try to lead it to honor and glory. Upon successful registration and confirmation from an admin, you get the right to control all the aspects of your virtual basketball club. Basketsim presents  a dynamic environment to the user where you can do a variety of things. For example, you can interact with other managers, make decisions that will either make you or break you, or compete with the best of the best and try to win the most prestigious titles in Basketsim! You can login to Basketsim at any time to check how your team is doing, how your players are progressing in their training regiment, or spend some time checking out what other managers have to say by reading statements that they have posted on their page.<br/>

<br/><b>The Basketsim season</b> is divided in two parts. In the first part of the season, there are two league matches per week. It's a tough part of the season, as things are occurring fast - having strong bench players and good tiredness control is vital for success in this part of the season. After the Basketsim draft has been completed, national cups are played.  This is the second part of the season and only one league match is played per week, but matches become more important. If you are not participating in the national cup or if you get knocked out of the competition, you can arrange friendly matches against other managers, get some attendance money and optimize your training.<br/>

<br/><b>Basketsim is easy to navigate.</b> You can choose various options from the menu on the left, checking your club, players, training and everything else. Below the menu, you can access your profile and on the top of the page, you can see the number of users online.  If you click on this number, you can see all the names of the managers who are currently online. This can be very useful if you are searching for an opponent with whom to  play a  friendly match. From the top of the page, you can also access the  statistics section. the news section of Basketsim can be accessed if you click on the basketsim.com sign on the top left or if you click the home icon below the menu.  In both cases, you will be led to the  section where important news is posted so it's good to keep an eye on this section.<br/>

<br/>In the following chapters of the game rules, you will find lots of useful information which will help you to understand the mechanics and rules of the  game. If you need further assistance, do not hesitate to use the  Basketsim forums where you will always get helpful advice from experienced managers.<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=players">Next chapter >></a><?php }

}
if ($action=='players' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch1\"></a><br/><br/>";} else {?><a href="gamerules.php?action=season"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=training">Next chapter >></a><br/><br/><?php }?>

<big><b>1. Players</b></big><br/>

<br/>Each Basketsim player has 10 basic skills. But there are some other factors that can affect his performance. Physical characteristics (height and weight) are important and tiredness can also affect players in a negative way. A player's personality can also be important in certain situations. We will explain this further, later in this chapter.<br/>

<br/><b>Ballhandling</b> - this is a basic skill for any basketball player. Every player must be able to handle ball in some situations, but some players handle the ball much more often then others. This ability is most important for guards, especially point guards. If PG's handling is weak, team is very vulnerable to make more turnovers.<br/>

<br/><b>Quickness</b> - a very important ability for any player on the court. Quickness is the combination of speed and reflexes. Quick players are likely to make more steals, converting them into easy-scoring fast breaks. Forwards and centers with fast reflexes will often outsmart taller opponents and win a rebound. Shooters can also benefit from being quick, getting cleaner shots, to improve their 2-points average.<br/>

<br/><b>Passing</b> - having few good passers in the team is always a good idea. Every player will have to pass the ball sometimes and if he can't pass well, he is likely to make a turnover. Passing is important for guards, but forwards with good passing can improve reliablity of the team.<br/>

<br/><b>Dribbling</b> - is ability that combines well with quickness and ballhandling. Add some defense and shooting and you have a decent guard. Players with a good ability to dribble are likely to cut inside and score or force their opponent to foul them. Centers will rarely need to dribble the ball. Guards and forwards with low dribbling ability are more prone to lose the ball.<br/>

<br/><b>Rebounding</b> - rebounding is a very important aspect of basketball, and being able to jump high and grab the ball can win the match for your team. Any player playing as a forward or a center should be at least an average rebounder, unless the combination of his positioning and quickness is so good that he will simply outsmart opponents.<br/>

<br/><b>Positioning</b> - basketball is much more than grabbing, handling and passing the ball. Two skills determine how good players are off the ball - defense and positioning. Positioning is important for all players. Centers and forwards will fully use their rebounding skill only if they are able to position well. Good positioning can be essential for any player to find a clear shooting position, especially for long-distance shots.<br/>

<br/><b>Freethrows</b> - being able to convert free throws can be essential for a team's succes. If the opponent is closing you down, attacks will often end with a personal foul. When it comes to free throw attempts no other skill will help the player taking the shots to get 2 out of 2.<br/>

<br/><b>Shooting</b> - shooting is an important skill for any player but bear in mind that shooting success often depends on the  combination of many abilities. A top guard with average shooting is more likely to score than a superb shooter with no supporting skills. If a player can't cut in, if he's unable to position well, his attempts are more likely to get blocked. When it comes to long distance shooting, shooting becomes more important.<br/>

<br/><b>Defense</b> - very important skill especially in combination with a high quickness ability. High-defense players will usualy make fewer personal fouls, more steals and in general they will make it tougher for the opponent's offense to penetrate your defense. Having such players also increases the chances of your opponent making an offensive foul.<br/>

<br/><b>Work rate</b> - work rate is not exactly a skill, it's a mixture of ability and character. Players with high workrate work harder! The player with the highest work-rate ever was probably Michael Jordan, so if you want to develop a star, a high work rate is a good start. But there are always some decent not-so-hard-working players around, so don't worry if some of your players are not so hard working. Details on the benefits of this skill can be found in the training chapter of the game rules, as this skill is only valuable for player's training and progress. Workrate levels above skill 15 are very rare.<br/>

<br/><b>Experience</b> - experience cannot be learnt, it has to be earned. Every basketball player was once an inexperienced youngster but after playing more and more matches he gained experience. The same goes for Basketsim players. And while all skills can be improved over the level perfect, experience is the only skill where you'll actually see the exact level once your player reaches the level above 15. However that kind of experience levels are usually only reserved for players with fantasic history, not just at club but also in the national team.<br/>

<br/><br/><big>SKILLS AND PLAYERS PERFORMANCE</big><br/><br/>

<table border="1"><tr><td>
<b>2-points scoring</b> is affected by: shooting, positioning, quickness, dribbling.
<br/>Often players score after a rebound or a steal followed by a fast break.</td></tr>

<tr><td><b>3-points scoring</b> is affected by: shooting, positioning, quickness, freethrows.
<br/>A player can score after steal followed by a fast break.</td></tr>

<tr><td><b>Free throw</b> shooting is affected by the freethrows skill.</td></tr>

<tr><td><b>Rebounding </b>is affected by: rebounding, positioning and quickness.
<br/>Rebounding can be greatly influenced by the tactical approach used.</td></tr>

<tr><td><b>Personal fouls </b>are affected by low quickness, positioning and defense.
<br/>The opponent's positioning and quickness are also important.</td></tr>

<tr><td><b>Offensive personal fouls</b> are affected by low dribbling and positioning skills.
<br/>The opponent's defense and positioning also have a high influence on offensive fouls by your players.</td></tr>

<tr><td><b>Assists </b>are affected by the passing skill.</td></tr>

<tr><td><b>Steals </b>are affected by defense and speed.
<br/>Players often score after a steal.</td></tr>

<tr><td><b>Turnovers </b>are affected by low handling, passing and dribbling, high fatigue and good opponent's defense.
<br/>What is most important depends on the position the player is currently playing.</td></tr>
</table>

<br/><br/><big>OTHER INFLUENCES</big><br/><br/>

<table border="1">
<tr><td>All match events can be affected by <b>experience</b>, some more, like three point shooting, and some less, like steals.</td></tr>

<tr><td><b>Tiredness</b> affects player's ability to rebound, score for two and convert free throws. It increases player's chances to commit foul or make turnover. Tiredness can be very important, especially high levels can make players perform much worse as usual. Leisure training is one method of addressing the tiredness issue in your team, players will train less but they'll get much needed rest. When season ends, tiredness is halved for all players.</td></tr>

<tr><td>Some match events can be highly affected by <b>height</b> and <b>weight</b>, like rebounding, 2-point shooting and turnovers. There are certain ranges of ideal height and weight for each playing position. Point Guards are typically around 185-190 cm tall while other positions demand higher players. Ideal height for centers is around 215 cm and even more is welcome. It's similar with weight, while centers can benfit of having 120 kg or more, small forwards have ideal value at around 100 kg and point guards will do just fine when having 85 kg or less.</td></tr>

<tr><td>A player having a <b>bad day</b> means that player's performance in the match was on the bottom of his capability. Players have their ups and downs, they performance is not the same in every match. You will typically recognize player having a bad day, just like you will recognize when he shines in the match.</td></tr>

<tr><td>In league matches, players gain a <b>bonus when playing at home</b>. It's the boost given by the fans and the cheerleaders and it affects skills that are related to player's aggressiveness or mental approach, namely rebounds, defense, freethrows, speed and passing.</td></tr>
</table>

<br/><br/><big>CHARACTER</big><br/>

<br/>There are fourteen types of character in Basketsim. A player with certain type of personality will act in different ways in certain situations. The influence may not be so big, but even personality factors can be decisive sometimes.<br/>

<br/><b>Stable</b>: stable players are more likely to make a clear two-pointer. They can also be good in avoiding turnovers.
<br/><b>Entertaining</b>: people love entertainers, so they can have a positive influence on your home match attendance. They will always try to make show out of the match, so they may score some daring 3-pointers, but at the same time they are prone to miss some close, easy shots.
<br/><b>Calm</b>: calm players are likely to score an extra 3-pointer from time to time and their chances of making personal fouls are just a bit lower. But not committing a personal foul isn't the best option in all situations.
<br/><b>Aggressive</b>: they are more likely to grab the rebound and score for two, but they are also prone to commit more personal fouls in defense and even offensive fouls.
<br/><b>Controversial</b>: controversial players are hard to predict, so it's hard to say what their benefits and downsides are.
<br/><b>Selfish</b>: selfish players are not very popular in basketball, since it's a team sport. They are likely to miss some extra two and three point attempts, but if you have a good rebounder, the missed shots might feed him well.
<br/><b>Dirty</b>: dirty players are often assigned on a special mission to limit the opponent's most gifted player. They are great at one on one defending, but they are sure to face the foul trouble sooner or later, so make sure you have someone capable coming from the bench.
<br/><b>Clumsy</b>: clumsy players are prone to turnovers, they will have hard time developing technical skills - even when already promoted to senior team.
<br/><b>Explosive</b>: explosive players get a real boost when playing fast basketball (FEB, DS, CTB) but suffers at TTP, RTD and IS. Their explosiveness also help them to develop quickness better. And it's the skill they need to get the boost, because without great quickness skill they are bound to fail.
<br/><b>Loyal</b>: these are players loyal to their current team, coach, teammates and fans. They feel great in home court, playing infront of supporting crowd, but they will typically underperform while on road. It's up to every manager to plan their playing time carefully and get the most out of them.
<br/><b>Wise</b>: wise players learn the game faster, they gain experience easier and near the end of their career, they make a great future coach.
<br/><b>Fragile</b>: some players are always more prone to complicated injuries than others and some luck is needed for their talent to be turned into a successful career. Fragile players are sometimes uneasy about contact and they find their peace on the freethrow line, where they typically shine - mostly due to a fact that they are easier to develop freethrow skill than other players.
<br/><b>Tough</b>: the opposite to fragile, tough players never give up. You can beat them, but you won't get rid of them, crash their nose, teeth, head but they'll continue to play. Rare injuries and 1% less fatigue in every match allow such players to play more matches!
<br/><b>Lazy</b>: all players who become professionals must work hard at one point of their career, but the problem of lazy players is that they are not remotely interested in developing their defense skill or playing defense. Also, make sure that they own good shooting skills, because repeated contested outside shots and unwillingness to attack the basket can harm their inside shooting as well.<br/>

<br/>Personal characteristic of players can also have an impact on their Youth team development. Before player signs his first pro-contract, the pure joy for basketball is surely one of the important factors in his progression. When dealing with youth players, you have to understand what skills they tend to develop better or worse according to their character. Selfish players are the most obvious example, when focusing on shooting and dribbling they'll be much more motivated as if you make them focus on passing or defense. Calm and stable players tend to discover their strengths, when focused on shooting, speaking for stable players alone, they can reach masterclass at freethrows even at young age and they can soon become very good at ball handling. Calm players might have a problem when they are tackling quickness, which is pretty much the same we can tell for controversial players and positioning. Aggressive players are always hungry to rebound the ball within their reach and this can also reflect in their early development. Entertainers are often on court with primary goal to impress the audience. They'll be very motivated when their focus is set on dribbling, skill which enables them execution of breathtaking-moves. Clumsy characters will suffer when learning the tehnical skills, but coaches will push them stronger when they develop rebounding and positioning. Explosive players will have easy time developing good quickness, but could suffer in some other areas. For wise players it's quite the opposite, quickness could be an issue, but passing is their speciality. Fragile players are a fast learners, you can consider them as real stars and they'll make it big time, as long as they can stay healthy. Tough and lazy characters are the last two to be mentioned in that mix - first are pre-set to become strong defensive players, exactly an area where lazy players will definitely suffer, but both could be having issues with their speed levels. Character of youths can result in 1 to almost 3 full skills difference between otherwise similar players, given that their other training conditions are similar.<br/>

<br/><big>RATINGS</big><br/>

<br/>After each match the five starting players are awarded a star rating, according to their quality and performance. Each player's ratings can vary from match to match, but not too greatly, if he plays in the same position as the last match. Players can improve their star ratings with lots of hard work and dedication during the training process.<br/>

<br/>Apart from star ratings, you can see a player's statistics for any match that he played in (if he played at least one minute). You should combine both, star ratings and player's statistics when you are trying to evaluate a player. You can also track a player's average statistics from all his matches on his personal statistics page.<br/>

<br/><big>INJURIES</big><br/>

<br/>Any player can get injured when he playing the match. You can lower the chances for injuries by improving your medical facilities. An injury can take 0-9 weeks to heal. A red cross with the appropriate number will appear next to the player's name on the players' list. If the number is green, then the player can play in the next match despite the injury but his chances to get injured will be somewhat higher. Injuries usually heal a bit faster than the time the doctors predicted immediately after the injury occurred but this also depends on the medical staff, for example having medical center on level 5 will ensure your players to recover at double speed comparing to team that is without medical center. In addition to this medical center gives your player deduction of tiredness of 1% per level per week.<br/>

<br/>Players can also get injured during training. Medical center has no influence in that case, it's important that your players are not too fatigued before training, as their chances to pick an injury during training increase with their tiredness.<br/>

<br/><big>MVP</big><br/>

<br/>When a Basketsim season ends, the most valuable player (MVP) for each league is announced. Players with at least 500 minutes of league gametime are sorted by their total rating divided by their gametime. This means that if a player is leading the average stats, he can still end up NOT winning the MVP award. It's possible that his ratings were achieved with a lot of gametime compared to his rival players (league stats are only shown per match, not per 40 minutes, however supporters are able to check the MVP race stats during the season as well). Players who are awarded with MVP receive a silver trophy and players who are awarded with the country MVP receive a golden one. The global MVP player receives a special cup. Players that are no longer playing in the same team are still able to win the trophy based on their past league performances. The league MVP's club is awarded with 50.000 €.<br/>

<br/>Here is an explanation how player MVP awards in the game are won:<br/>
- league: best average of all players with at least 500 minutes played<br/>
- country: best average amongst the league MVP winners combined with league strength<br/>
- national cup, FPC and YCWC: best accumulated stats over the season<br/>
- CS and CWS: best average amongst players with at least 12 matches played<br/>
- global: determined individually, given to a player with the biggest impact on a season<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=season"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=training">Next chapter >></a><?php }

}
if ($action=='training' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch2\"></a><br/><br/>";} else {?><a href="gamerules.php?action=players"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=youth">Next chapter >></a><br/><br/><?php }?>

<big><b>2. Training</b></big><br/>

<br/>Training is essential for promising youngsters to develop into world class players. Older players can gain from training as well, especially if they are hard working. Only players that take part in matches receive training, so it can be important to changes lineups a bit from match to match. All players set up in the starting five at least once in a week receive training! Each player can receive only one training per week, which corresponds to the last position he played (guard or big man). Players in their 30s are likely to lose skills, but regular training combined with good workrate and a decent coach can help them to postpone big drops until the late age.<br/>

<br/>Hardworking players can be distinguished as being those with a high work rate. Such players will always listen to the coach and do their best. Their development can be very rapid, especially if their coach is hardworking as well. Coaches with extreme workrate can be highly influential, but as they are aware of the benefits they can provide, it will take a lot more money to persuade them to join the club. One should keep in mind that from training point of view it's always much better to have coach with a terrible workrate then no coach at all!<br/>

<br/>Before training you must tell your coach what your players should train. Guards and big men can be separated into two training groups and each group can train a different skill. Which group a player trains with is determined by the position the player played during his last match. Players who last played as guards are placed in the first group and players who last played as forwards and centers in
the second. Injured players don't train.<br/>

<br/>The intensity can be set differently for each of the training groups. Intensity is very important: training at high intensity, players will learn more but they will get tired after training. Training at low intensity, players will train less, but they will be more reposed after training.<br/>

<br/>Different types of training also mean differences in how much value your players gain. For example shooting is in general more important skill than handling, so training shooting or some other widely needed skill will increase the value of your player more, but this doesn't mean that his improvement will bring him or your team more benefit. Skills which add more value also mean more wage increase in a long run. So develop your players with a great care, you don't want to end up with bunch of overpaid players, wrongly skilled for their best playing position.<br/>

<br/>Once per week coach presents you the training results. Skill improvements are marked with green and skill drops with red color. This doesn't mean that player has improved or dropped a whole skill level, you'll have to track this manually.<br/>

<br/><b>Physical training</b><br/>

<br/>The choice of training types covers all the skills that determine player's quality. Of course you can't train players to grow or to change their character or workrate, but apart from training their basketball abilities, you can also set up a plan for their physical training. For that, you'll need to pay a gym rent. The rental price depends on your medical center and number of players involved in training. Only your coach can handle this so you need one to set up the training. However your coach's characteristics are not important for this type of training as he only creates the schedules for players. There is also no need for players to play in matches in order to gain or lose weight.<br/>

<br/>Physical training affects player's weight and tiredness. You can set up training regime for each player individually, but you can also unset training for any player at any time. There are 4 training types and player can either focus on agility if you want him to improve his footwork and balance or power if you want him to improve his strength. Available training types for physical training are: jogging, push ups, short sprints and weight lifting. Each of these regimes have different effects on players in terms of weight gain, weight loss and tiredness. Mostly it depends on player's current body mass. Your heavy center, for example, might not appreciate the fact that he is forced to do short sprints, even if they prove to be affective, they can turn out to fatigue him. The best advice is to test players and see what suits them best as every player is an individual with his own preferences. However common sense can easily be applied to all training types.<br/>

<br/>Every Monday, your players are being checked by the club personnel and you are provided with a simple report, how your players were affected by their gym work. You can remove any player from physical training at any time by choosing an empty option. It's entirely up to you who should or shouldn't train. Players excluded from physical training won't perform any worse, so always remember that physical training is not mandatory, it only helps your player to get closer to their desired body mass.<br/>

<br/><b>Growth</b><br/>

<br/>Every now and then you will notice that one of your younger players has grown a bit. So when you get a 15yo rookie, you can try to estimate how much he might grow, but you can never be 100% sure that he will grow, as some young players might never grow at all. Coaches are measuring potential growth of your younger players twice per week, so you will most likely be able to notice it on Monday or Friday evening.<br/>

<a name="coachez"></a><br/><big>COACHES</big><br/>

<br/>Basically, there are two types of coaches in Basketsim: high workrate coaches and good all-round coaches. New clubs would often first sign inexperienced coach with a great workrate and nothing else, buy 10 talented 16-17 year old players and train them at a high intensity for 2 or 3 seasons. That's a solid plan to develop some stars and make some money. But in the long term, teams look forward at hiring the best possible all-round coach that will still be able to contribute towards the team's training, but will also have the ability to develop good youth team players.<br/>

<br/>Coaches are determined by 6 main characteristics:<br/>
- work rate,<br/>
- experience,<br/>
- motivation,<br/>
- personality,<br/>
- handling youths,<br/>
- age.<br/>

<br/>Work rate has already been explained. It has an impact on senior team's training quality. A coach's motivation has an impact on his work rate. When motivation drops he's not so determined to work to the full potential of his normal work rate. Every new coach that you hire is fully motivated. The age and the personality of a coach are not important when it comes to training and matches, but both can impact his motivation drops, for example coaches with selfish character will never become as attached to the club as stable coaches, something that will result in faster motivation drops. When coach's motivation fall below 95% you can negotiate new contract with him to keep up his motivation again. Coaches over 60 years old will retire when they part with their current club.<br/>

<br/>The Experience of your coach can have a big impact on your team's match performance, especially when it comes to freethrows. Experienced coach know how to talk to players and when to call timeouts, as a result players are more calm during the matches and more successful at freethrow line. When it comes to training, coach's experience is only important for Youth teams, where coach can influence the development of youngsters by applying his experiences to them. Another important factor for Youth team training is coach's special ability to work with the youths.<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=players"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=youth">Next chapter >></a><?php }

}
if ($action=='youth' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch3\"></a><br/><br/>";} else {?><a href="gamerules.php?action=training"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=transfers">Next chapter >></a><br/><br/><?php }?>

<big><b>3. Youth</b></big><br/>

<br/>Basketsim offers multiple ways of signing talents. Every week your club hosts a camp for young talents to show what they're made of. Everyone can come and play, while your coach will try to pick the best player. You can go two roads from here. One is to pick a player aged 16 or 17 and add him to your first team directly. Or you can go with 14 - 15 year old instead and add him to your Youth team. Direct promotion cost 50.000 &euro; (lower cost option is available but will give you worse return) and is <b>very recommended for clubs with less experienced coaches or coaches who don't know how to deal with youth teams that well</b>, mostly these are clubs that don't have the money to buy a great coach just yet. Promoting a players directly to your first team largely depends on luck, so everyone can get lucky sometimes and a great coach is not needed. On the other hand, <b>you can only add a player to your Youth team if your coach has at least 75 YT ability</b> and players can be developed in the youth team from that point on! Such promotion costs 25.000 euro. When (if) you promote that player to senior team (later when his youth team development is completed), you pay 15% of his future EV at promotion.<br/>

<br/>In Basketsim there is also an option to draft players. Draft occurs once per season, players from less known clubs, aged mostly 19 and some 20 years old are evaluated by the experts to make a list of picks. Every club has a privilege to sign up and be a part of this prestigious event. On Monday, the day before the national cups begin, the draft starts at around noon. Best teams can choose from lower picks and lesser teams get to choose from the top picks. However managers can take advantage of their activity, it's interactive draft and position of the clubs can be significantly altered with the use of special draft tokens. These can only be purchased one the day before draft and on the draft day - until top 1000 picks are on.<br/>

<br/>And there is yet another way to recruit good prospect to your team. By supporting a local college with a large financial injection, you get the right to sign one of their best players after the season is over. It's typically a player, aged 20 or 21. You can wait until last day of the season to sign the deal with the college and the quality of player will mostly depend on the size of your donation.<br/>

<br/><big>YOUTH TEAMS</big><br/>

<br/>There is no doubt that Youth teams (YT) deserve their own chapter. This is because of their specifics, as there's no other way to develop players in a similar way like it can be done with 14 - 17yo players in your YT. Some clubs are unable to include youngsters to their senior team at all, often because they are playing against immense opponents on weekly basis, their goals are set high and they can't afford to play inexperienced players in the all-important matches. Such teams are still able to take a good care of their Youth teams, while teams focusing primarily on the youngsters - even inside their senior team lineups - can double the fun and their prospect by having a quality Youth team.<br/>

<br/>It's easy to start your own Youth team, all you need is a single 14 - 15 yo player, promoted from Camp and this is a start of the team that can sustain up to 12 players. In theory a new player can join the Youths every Friday, but after you reach the maximum of 12, you must either sack or promote players in order to release places for the newcomers. Players up to 17 years of age can be included in YT, when they reach 18, they are automatically promoted by your club personnel. You will notice that one quarter of the players coming from camps will be typically aged 14 and majority 15 years of age. It costs you nothing to fire a YT member, just make sure to understand that there's no way back; once fired, a youngster will retire indefinitely. Player must turn 16, before he's eligible for promotion. It costs 25.000 to promote youngster into your senior team. Promoted players can never again return to the YT.<br/>

<br/>Youth team players can be included in the gym training (physical training), but can't take part in first team matches, so they are not able to train with the first team as well. They can't compete in the 3-point contest and can't play for the national team (other than taking a honorable spot in the improvised U15 selection). They don't have a professional contract, so wage only reflect their age and not their actual quality. In a similar way, their value (Youth value) - while very relevant for the squad assessment - cannot be applied to comparisons with the senior team players.<br/>

<br/>One of the main distinctions between the senior team members and the youths is how they develop. When you first observe a newly acquired youngster, all you have is coach's recommendation, but actual skills are a mystery. You can observe the level of talent, which is a brief description of his potential future workrate, but it has no impact towards his youth career success. Players are developed individually, skill after skill. Every youngster can be given a skill to focus on and the amount of time to develop that skill. If your coach is less experienced you will probably face 4 weeks per skill limit and that might not be enough for good results. The most experienced coaches will give players an option for 9 weeks focus, but going down that road will require a good plan on how many skills you plan to develop, before promoting a player. Right balance is the key of youth development.<br/>

<br/>So how exactly do youth players develop skills? First you need a good coach, preferably someone with ability to develop youth at level 75 or higher. For new teams it's sometimes recommended to use the instant promotions instead for first couple of seasons and during that time train good prospects inside the senior team in order to earn money for a great coach and switch to youth teams after that. So when you have decided which skill to focus on and for how long - make sure that it's your final decision, because you won't be able to change that until the training is completed. Re-focusing on the same skill (later on) is possible, but there's no point in doing that, unless a better coach is used or in case of a poor skill. You also need to know that any attempts to develop great skills in 4 or 5 weeks are not that likely to work. You'll just have to find the right time-frame here, 9 weeks can give a great result, but the difference between 4 and 7 weeks is much bigger than the difference between 6 and 9 and it's unlikely that you will be able to develop all skills if you only use 9 weeks focus. After setting the instructions, a player will start developing his new skill according to a provisional workrate. It's a situation-specific value and it probably won't be the same when he's going to work on his next skill. Provisional workrate is based on: coach's experience, coach's ability to handle youngsters, some luck, just a bit of coach's workrate and - very important - total number of weeks. You can see provisional workrate as soon as you finalize your instructions on which skill should be developed next. Every Thursday, training results are in and when the focus time expires, new skill become visible. Developed skill is a result of several factors: provisional workrate (as described above), already existing skills, player's physique and his character. For example, tall and heavy players will find it very difficult to develop handling, dribbling or quickness with the same ease as short and lightweight players. If rebounding is in question, situation will be just the opposite. And an example to showcase the importance of the characters is a selfish player, who will be very much motivated to develop his shooting, but not that much keen when focusing on his passing or defense.<br/>

<br/>So why promote a player before the age of 18? For numerous reasons! With number one reason - after becoming more and more skillful, player will find it extremely hard to develop new skills in same way as before. Eventually, a time should come, best to promote him, either to play and train him inside your first team or to sell him on the market and release a spot for someone younger and eager to learn fast. Players will also find it difficult to get any experience at all without being involved in first team matches and special talents will surely be hunted by the U19 national coaches. So Youth team should really be just that first step for players in their development. Players usually won't have all skills developed when they are promoted, so make sure they'll develop skills that suit them best! Undeveloped skills will be revealed after promotion, but will not be as good as skills that were properly developed.<br/>

<br/><big>BUY YOUTH</big><br/>
<a name="byo"></a>
<br/>Less common, but existing option is to sign a clubless youth player and add him to your youth team. This option can be found under Market in the menu and it allows you to bring in foreign players and players who already have some skills developed. However getting players in with the use of this method can be frustrating - it requires a dedicated manager with lots of patience and determination to fight the market closures and other restrictions. First restriction is the fact that the market only opens every time when there are at least 15 players available, so you need to check back often to get someone really good. Second restriction is a cruel fact that not every youngster will sign for every team. Who he'll sign for depends on his personality, club's recent success and club's long term prospect as he sees it. Third restriction is the maximum of 3 foreign players that youth clubs can have at one time. Once a player is signed and added to your youth team, he's not any different from your other youngsters, so everything explained in this chapter applies to him.<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=training"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=transfers">Next chapter >></a><?php }

}
if ($action=='transfers' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch4\"></a><br/><br/>";} else {?><a href="gamerules.php?action=youth"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=finances">Next chapter >></a><br/><br/><?php }?>

<big><b>4. Transfers</b></big><br/>

<br/>Basketsim has a transfer market, where you can either sell or buy players. There are some regulations which make sure that market works in fair and transparent way. When player is listed for sale, maximum starting price is limited to 1.5-times his evaluated value (will be adjusted to 1 x EV in the future). When you are bidding on a player, you can't raise bid further until someone else bids higher. When buying and selling players, you should be familiar with agent fees system. When you place player for sale you don't pay anything, but according to the time when that player was last transfered, agents fees might apply if he gets sold. If player was purchased and then sold in 60 days time or less, then the earnings are taxed. For a player who was sold just 1 day after a purchase you will get 0% of the earnings and for a player who was sold 61 days after a purchase you will get 100% of the earnings. For example: you purchased a player only 1 day ago, but have decided to sell him. You purchased him for 350.000 € and after 1 day he was sold for 700.000 €. You will receive 350.000 €. Selling him after 31 days would give you 525.000 € and selling him after 61 days would give you 700.000 €. This system gives you a chance to drop a player if you have changed your mind after a purchase. You must be especially careful if you have purchased back your own player and you are selling him again before 60 days period has expired. 10% of player's last achieved price will be taken into account for calculation of agent fees, so you can lose a lot of money. This is because bidding on own player is an option, only intended for those who changed their mind about selling the player and not as a way to raise his price.<br/>

<br/>It's important to know that overpriced transfers are not allowed! It's absolutely forbidden to arrange transfer at a price above the market price or to gift money to other managers by buying their players above the reasonable market price. In case of cheating, unreasonable sale prices or prearranged transfer deals, the gamemasters can either adjust the price or disallow the transfer. Prices should always be determined by the market in a fair bidding process where unrelated clubs bid against each other. If someone suggest you to bid mutually on a player until certain price is reached, refuse it and report him to the gamemasters, because raising the price in such a way would be cheating!<br/>

<br/><big>SCOUTING</big><br/>

<br/>From time to time you might want to hire a scout to find a Free Agent to sign up and play for your club. The better the scout is and the more time he has, the more likely he is to find a good player. Every time you hire new scout you pay 3.000 &euro;. Scout is then assigned to you and if you are not happy with his skills you can hire a new one for another 3.000 &euro;. When you are happy with your scout you may want to send him searching for players. He uses his prefered locations and skills to narrow down the selection, so if you are looking for a certain skill or nationality you can just pick scout who suits your needs best. Most important skill for scouts is scouting ability - best scouts won't even bother to check low quality players. Feel for the talent can also be important if you want better chances for a young pick.<br/>

<br/>Scouting is an active procedure, both for scout and club manager. Every day scout reports back to you and offers a free agent available for signup. The decision is entirely on you, either to sign, either to pass and hope that better player shows up. After each update when you have scout hired, you are able to sign player who was found last. Chances to get really good player increase as scout spends more time searching for players. When you send scout to search for players you pay additional fee, regardless of scout's quality. It only depends on maximum number of days - scout demands 10.000 &euro per day and he doesn't care if search ends after one day. He is contracted to offer several players or to offer one that you sign up and if he finds good player in one day, he still gets a full fee. Additionally, players will demand sign-up fee to be prepared to sign contract for you. After the job is done, scout leaves club and therefore he opens spot for you to hire a new scout. You can't have more then one scout searching for players at the time.<br/>

<br/>With the scout search, there is always a small chance that scout won't find new player in one or two days of his search. Another rare scenario is that two scouts find the same player, so he can already be signed when you try to sign him. Scout can also test your decisions by offering you the same player for the second time. You can refuse all his offers, but if you don't pick a player before the search is over, scout will leave club and you won't sign a new player. The last day to sign a player is when scout is saying there are 0 searching days left.<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=youth"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=finances">Next chapter >></a><?php }

}
if ($action=='finances' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch5\"></a><br/><br/>";} else {?><a href="gamerules.php?action=transfers"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=arena">Next chapter >></a><br/><br/><?php }?>

<big><b>5. Finances</b></big><br/>

<br/>On your finances page you see three different values:<br/>
- current money is the money your club have at the moment,<br/>
- in brackets you see prediction for next week,<br/>
- bidding money is the money you can use for bidding on players on the Market,<br/>
Spending all bidding money means that you will go in red with your current money!</i><br/>

<br/>There are many ways to spend money in Basketsim. Your starting money is very important and you should carefully plan where to invest it. You have several options, for example you can strengthen your squad with players from the market or fill it with youngsters (who will progress better and demand lower salaries). Very good investments can be a decent coach and bigger arena, because that will enable you to train well and at the same time get the most out of attendence money. Make sure not to overpay players listed on the market and for any cost avoid the bankruptcy. At every week when you have more than 2 million debt, you are in danger of losing your team. And when your balance is negative you also have to pay bank interest, so it's better avoid the red numbers. There are expenses to be paid every Friday, like salaries, youth camp investment, the cheerleaders money, so make sure you'll be able to fund those activities from your sponsors income and match entrance money. If your team is still young and on a tight budget be careful with things like scouts, cheerleders investment and big market purchases.<br/>

<br/>There are certain rules how much current money you need to be able to pay for things available in the game:<br/>
- you need positive money balance in order to start an arena upgrade,<br/>
- you need at least 80% of coach's sign-up value for him to be prepared to sign a contract with you,<br>
- you need at least 90% of the money of the total cost to invest in the college or to improve the medical center,<br/>
- there are no limits for the draft signup and camp investment.<br/>

<br/>And how can you earn money? You get money from every home league match, cup and friendly match. The size of your arena determines how many spectators can visit the match, but you also need to make sure that your arena won't be too big, as that might be unnecessary investment. Ask around, on the forums or elsewhere what the best increase is or observe arenas of other, established clubs to determine what the right seating percentages per section are. You can sell your players or train young players to become stars and then sell them in order to earn money. If you have a weak team you can hope that you will get one of the top drafts and sell him big, but usually it makes more sense to keep a top draft player. On the finances page you can track your temporary expenses and incomes. One of the most important regular income sources that we haven't mentioned yet are the sponsors. Sponsors are most interested in your fans so they'll focus on the size of your fanclub to calculate how much money to give you.<br/>

<br/><big>AWARDS</big><br/>

<br/>After the season is over, teams are awarded for their achivements. You can see a structure of league awards here:<br/><br/>

<table border="1" cellspacing="0" cellpadding="0" width="100%">
<tr><td align="right" bgcolor="#efefef">Level\Place</td><td align="right" bgcolor="#efefef">1</td><td align="right" bgcolor="#efefef">2</td><td align="right" bgcolor="#efefef">3</td><td align="right" bgcolor="#efefef">4</td><td align="right" bgcolor="#efefef">5</td><td align="right" bgcolor="#efefef">6</td><td align="right" bgcolor="#efefef">7</td><td align="right" bgcolor="#efefef">8</td><td align="right" bgcolor="#efefef">9/11</td><td align="right" bgcolor="#efefef">12/14</td></tr>
<tr><td align="center" bgcolor="#efefef"><b>1</b></td><td align="right">1.500.000</td><td align="right">1.200.000</td><td align="right">900.000</td><td align="right">750.000</td><td align="right">600.000</td><td align="right">500.000</td><td align="right">450.000</td><td align="right">400.000</td><td align="right">100.000</td><td align="right">200.000</td></tr>
<tr><td align="center" bgcolor="#efefef"><b>2</b></td><td align="right">900.000</td><td align="right">550.000</td><td align="right">550.000</td><td align="right">500.000</td><td align="right">450.000</td><td align="right">400.000</td><td align="right">350.000</td><td align="right">300.000</td><td align="right">75.000</td><td align="right">150.000</td></tr>
<tr><td align="center" bgcolor="#efefef"><b>3</b></td><td align="right">800.000</td><td align="right">450.000</td><td align="right">450.000</td><td align="right">410.000</td><td align="right">370.000</td><td align="right">330.000</td><td align="right">290.000</td><td align="right">250.000</td><td align="right">120.000</td><td align="right">120.000</td></tr>
<tr><td align="center" bgcolor="#efefef"><b>4</b></td><td align="right">700.000</td><td align="right">350.000</td><td align="right">350.000</td><td align="right">320.000</td><td align="right">290.000</td><td align="right">260.000</td><td align="right">230.000</td><td align="right">200.000</td><td align="right">100.000</td><td align="right">100.000</td></tr>
<tr><td align="center" bgcolor="#efefef"><b>5</b></td><td align="right">600.000</td><td align="right">300.000</td><td align="right">300.000</td><td align="right">260.000</td><td align="right">220.000</td><td align="right">180.000</td><td align="right">140.000</td><td align="right">100.000</td><td align="right">75.000</td><td align="right">50.000</td></tr>
</table>

<br/><i>(Prizes for places 9/11 are lower due to additional playoff game, from which team gets attendance money.)</i><br/>
<br/>In addition to financial benefits, best teams also get additional fans after the season is over. Winning team of each league gets 50 additional fans, second team 40 and so on to 5th team with 10 new fans. There is no difference between league levels, however in a similar way, teams which get relegated also lose some fans due to poor results.<br/>

<br/>After national cup is completed, teams are awarded for their cup achievements as well:<br/><br/>

<table border="1" cellspacing="0" cellpadding="0" width="35%">
<tr><td align="left" bgcolor="#efefef">Winner</td><td align="right">1.600.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Runner-up</td><td align="right">1.200.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Semi-finalist</td><td align="right">900.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Quarter-finalist</td><td align="right">600.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Reached top 16</td><td align="right">400.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Reached top 32</td><td align="right">200.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Reached top 64</td><td align="right">100.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Reached top 128</td><td align="right">50.000</td></tr>
</table>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=transfers"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=arena">Next chapter >></a><?php }

}
if ($action=='arena' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch6\"></a><br/><br/>";} else {?><a href="gamerules.php?action=finances"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=matches">Next chapter >></a><br/><br/><?php }?>

<big><b>6. Arena</b></big><br/>

<br/>To attract more spectators and earn more attendance money, you can enlarge your arena. In order to do so, enter the desired amount of seats you would like to add and, if everything is OK, the construction company will start work. You will have to pay all the costs in advance.<br/>

<br/>Court side, court end and upper level seats cost 125 &euro; per seat to be built. Every VIP box costs 675 &euro; and you will have to pay 165.000 &euro; as a one time payment to construction company, but this sum includes all future maintance costs (you won't have any weekly maintance costs).<br/>

<br/>You should make plan carefully about the percentage of seats in every sector. Finding the right formula might optimize your attendance, but eventually you'll have to build up a balcony level. A balcony is built when you increase the Upper level capacity for the first time. This means that your arena will have to be completely redone, so it's a very expensive proceedure with a once-off cost of 330.000 &euro;. When the arena is upgraded, you will be able to increase the capacity of Upper level seats with no additional one-time costs.<br/>

<br/>At the time your arena is being upgraded you are not able to seat as much spectators as usual, because some of the seats are closed off due to construction work. So you should check your fixtures and figure out when it the best time to get the work done would be. When construction is finished you will receive a message in the club's latest news. You will then be able to use your arena at full capacity or expand it further.<br/>

<br/><big>TICKET PRICES</big><br/><br/>

Court end - 15 &euro; / spectator<br/>
Court side - 20 &euro; / spectator<br/>
Upper level - 20 &euro; / spectator<br/>
VIP boxes - 100 &euro; / spectator<br/>

<br/>The Ticket price is same for cup, league and playoff matches. In friendly matches tickets are a bit cheaper. In league matches full earning go to home team, in cup and friendly matches earnings are split between both teams equally.<br/>

<br/><big>ATTENDANCE</big><br/><br/>

One of the important factors in the game is how to attract as many spectators as possible to your home matches. Having these spectators means more ticket money. From that point of view, home league and cup matches are most important, followed by the friendly matches, where nice revenue can also be earned. Several factors have influence on the amount of spectators that will gather in your arena on any given day.<br/>

<br/>Obviously most important factor is the type of match. If it's a league, cup or playoff game more fans will come to watch comparing to a friendly match. Amount of fans that you have in your fanclub is second most important influence. Fans create right atmosphere in the arena, so good amount of fans is crucial for good attendance. Cheerleaders can also help with building up right atmosphere in your arena, especially if it's big. Your cheerleaders will always give you a tip about their mood - you can observe in menu under arena. Keep in mind that girls can not only be lacking funds, but they can also be spoiled by your generosity! Entertaining players inside your starting five can also motivate potential spectators in a positive way and earn you additional ticket income!<br/>

<br/>There are other factors that influence match attendance. Playing on a higher league level can ensure you better attendance of league matches. In cup matches, when lower division teams are scheduled to play against top division teams, supporters of home team will make sure that they don't miss that match. Because it can always be the last in elimination-natured cup competition. It's also refreshing for them to watch top quality team, after the team has been performing in league against less prominent opponents. In league matches there is additional positive factor, being high on league table and especially leading it can have great impact on your attendance, there is also more interest in matches between opponents that are placed close to each other in the league table.<br/>

<br/>When playing international friendly match away, you will have to purchase air tickets to travel to the venue. But international friendly matches tend to have higher turnover of visitors than domestic friendlies. There is also small unpredictability factor that influences all attendances.<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=finances"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=matches">Next chapter >></a><?php }

}
if ($action=='matches' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch7\"></a><br/><br/>";} else {?><a href="gamerules.php?action=arena"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=tactics">Next chapter >></a><br/><br/><?php }?>

<big><b>7. Matches</b></big><br/>

<br/>Basketsim matches are played twice a week. <i>On saturdays and sundays</i> league matches are played in all countries. You can check the exact dates for each league under <a href="league.php">League</a> in main manu. <i>On tuesdays and wednesdays</i> the 2nd match of the week is played. This can be a league, cup or friendly match. In first half of the season league matches are played twice per week and in the second part of the season the cup is played on tuesdays/wednesdays. When a team is knocked out of the cup, they can play friendly matches with any other team that is also out of cup. Some teams have a free pass to the 2nd round of the cup and can play friendly match when other teams are playing 1st round of national cup. <a href="gamerules.php?action=international">International cups</a> are the opportunity for each team to play 3rd match in a week.<br/>

<br/>Up to 30 minutes before the match starts you can set the lineup and give tactical orders. You need to read chapters tactics and players to know exactly what choices you have. But basically it's always a good idea to set up all 10 players (5 in the starting team and 5 on the bench), because if a team should be left with less than 5 players on the court, a walkover occurs, resulting in an automatic loss, no matter what the score was up to that point. If both teams start the match with less then 5 players set to play, home team losses the match.<br/>

<br/>When the match starts, you can watch it in live mode if you are online at the time. You can even watch the changing of the statistics during the match and if you want to watch multiple matches you can do so by adding matches to the multiview. Multiview is the suggested method of watching matches in live mode as it is fast and more fun, due to the fact that you can watch matches of your friends or opponents alongside your own match and you also get to see the time played, so at any moment you know exactly how much time is left in the game.<br/>

<br/><i>There are a few events that happen every time your team play the match:</i><br/>
- all starting players receive a certain amount of experience and as a result their estimated value grows,<br/>
- all starting players get tired, it depends on the match type and your tactical choice how tired they get,<br/>
- all starting players receive a new personal star rating, replacing the previous one,<br/>
- all starting players get marked to receive training on the following thursday.<br/>

<br/><i>And there are some events that can occur, but do not necessarily always happen:</i><br/>
- all players involved in the match can get injured (the chances of an injury can be influenced by the level of your medical center),<br/>
- if it's a competition match, players get their personal statistics updated immediately after the match.<br/>

<br/>Every home match and every cup match gives you a certain amount of money from ticket sales. Attendance is influenced by the size and seating types of your arena, the size of your fanclub, the mood of your cheerleaders and the number of entertaining players in the starting five. League, cup and international matches are also important as they influence the mood of fans and determine how many will join in the following update. A few minutes after league matches end in one country, the league standings are updated. League statistics are updated when matches in all countries end (i.e. on mondays and/or thursdays in the early morning).

<br/><br/><big>LEAGUE SYSTEM</big><br/>

<br/>Every nation in Basketsim has at least three league levels. There is a single top division in each country, three second-level divisions and 9 third-level divisions. Some countries also have 4th and 5th level with 27 and 81 leagues - this depends on the amount of users in a country. Every league in Basketsim has 14 participants and teams play twice to each other in a season, once at home and once away from home. After 26 rounds winner of every league below top level is promoted to higher level and winner of top league in a country is crowned as national champion. Second placed teams play playoff matches at home in their attempt to reach higher level league as well. There is a single match and they play against 9th to 11th placed teams from higher level leagues. Teams placed 12th to 14th are relegated to bottom level, unless they already play in lowest level league in a country.<br/><br/>If two teams end up with the same score after 26 rounds of league they are divided based on better points difference (amount of points scored in a season minus amout of points received). If their point difference is the same, they are divided based on more points scored only.<br/>

<a name="ncrules"></a><br/><big>NATIONAL CUPS</big><br/>

<br/>In every country a National Cup is played each season. Teams are drawn to play matches and every match is decisive, the winning team being promoted to the next round, while the losing team being knocked out of the Cup. To win the National Cup, a team must win all rounds. In countries with 5 level leagues best 1024 teams from the previous season compete, while in countries with 3 or 4 level leagues all teams compete in cup, but some do not play in the first round and start in the second round instead. The draw is semi-seeded and it prefers active teams to play against bot teams at home in the first few rounds. Attendance money is split 50% - 50% between both teams in all matches. There is no home advantage in cup matches. You can check your National Cup in the menu under Leagues by clicking the National Cup link. There you can also check progress of cups in other countries. Besides the honorable trophy and money prizes which can be won, some of the best contestants from each National Cup qualify for the next season's Cup Winners Series.<br/>

<br/><big>THE ENGINE</big><br/>

<br/>To determine most precisely how the game engine works you should study other chapters of the rules as well, especially parts about tactics and players. Every time when one team is in possession they have certain chances what will happen next. Either they will shoot, lose the ball or there will be a foul commited on the player who is handling the ball. There is some standard distribution for events so that statistics at the end are similar to real basketball matches. Managers can attempt to increase or decrease occurance of events with tactical choices and with team built up from players with certain skills. The second option is most valid in a case of turnovers and personal fouls. At the half time reporters will express their opinion on which team is the better defensive team in the match, which means that they have a tendency to commit less personal fouls in the game. This doesn't mean that better defensive team should make less personal fouls in every match and it doesn't mean that better defensive team should receive less points as this highly depend on the quality of opposing shooters.<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=arena"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=tactics">Next chapter >></a><?php }

}
if ($action=='tactics' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch8\"></a><br/><br/>";} else {?><a href="gamerules.php?action=matches"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=nationalteams">Next chapter >></a><br/><br/><?php }?>

<big><b>8. Tactics</b></big><br/><br/>

Tactics are an important part of Basketsim. When you choose which tactic to play, you give a lecture to explain to your players what should be their offensive and defensive focus in the match. Players will follow your instructions and play in a specific way in offense and in defense. For example they will shoot more or less, have a tendancy to make more or less turnovers, rebounds, fouls and so on. But you should also keep in mind that players are not robots, so they won't always behave exactly as you want. The set of available tactics is described below.<br/>


<a name="dtac"></a>
<br/><big>DEFENSIVE TACTICS</big><br/>

<br/><b>Sprint back on defense (SBOD)</b> - with this instruction you tell players to run back to defense as soon as possession is switched to the opponent. Sure, your players will still be unable to prevent some fast breaks, but fast positioning of your defense can eventually result in opponents getting less shooting opportunities. Just make sure your tired team won't make less attempts too.<br/>

<br/><b>Contest every shot (CES)</b> - the main idea is to prevent the opponent from scoring. Whenever they'll shoot, your players will try to intervene. So it's very important for your players not to make to many personal fouls in the match. This type of approach can also result in your opponents getting nervous and in such case it will affect turnovers too.<br/>

<br/><b>Block out and rebound (BOAR)</b> - this instruction priviledges your rebounders, they are instructed to block out and rebound on every shot, not giving up second and third shots. This instruction can be difficult to carry out, but it can give your team an important additional value, especially if you are facing a superior rebounding opponment or if your plan is to win the game by being the superior rebounding opponent yourself.<br/>

<br/><b>Protect power zone (PPZ)</b> - this is a very specific instruction. Your players will defend aggressively, but at the same time they'll try to avoid making too much fouls. The idea is to prevent opponents from dribbling or passing into the paint, but this is always a difficult task. This approach affects the distribution of fouls in the match and can be really important for teams with unsatisfying bench quality.<br/>

<br/><b>Wear out the opponents (WOO)</b> - if your players are in good physical shape you can always try to tire your opponents. The best way to tire them is by playing pressure defense to create an up-tempo style of play. It's probable that your opponents will make more turnovers than usual, just make sure that plan won't backfire on you, because WOO backfiring is not a rare thing.<br/>

<br/><b>Half court trap (HCT)</b> - this is a balanced approach that can be either seen as a stronger version of normal defense either as an attempt for a more intelligent WOO approach. Forward guards the ball handler and is trying to disrupt any quick passing with his impressive wingspan. The center stands around the free throw line with a guard protecting the low post. The other two players stand on either side of the center with all 3 players keeping their arms stretched out. HCT makes is somewhat harder for opponent to shoot, so you are likely to concede less shots and perhaps even draw some additional turnovers, while your players are prone to make just a few more fouls as usual.<br/>

<a name="otac"></a>
<br/><big>OFFENSIVE TACTICS</big><br/>

<br/><b>Read the defense (RTD)</b> - "Think before you move! Try to take advantage of the defenses' weaknesses." This is what you'll be telling players and as they will "move with a purpose" they are likely to make less turnovers in the match. This approach can be really tiresome for players, but coaches like it due to it's simplicity and efficiency.<br/>

<br/><b>Fast early breaks (FEB)</b> - fast break is all about pushing the ball up the court before the defense has a chance to set up. This approach will increase your chances for more field shots, just make sure you have capable shooters on court and that you don't have any other significant worries in the match team.<br/>

<br/><b>Distance shooting (DS)</b> - your players will try to shoot more often, especially from the distance. There is a big chance that opponents will respond in the same way, shooting more threes to keep up with you, so make sure your shooters are better. You also have to know that amount of forced distance shots will likely increase, however on the positive note, your players won't penetrate that often, so you're likely to suffer less turnovers.<br/>

<br/><b>Try to penetrate (TTP)</b> - by telling your players to penetrate more, you can expect more contacts to occur. It's very likely that your players will get fouled more as a consequence. So this tactical approach is not recommended if your players are not at least decent freethrow shooters. This approach can be very useful, if you think you might benefit from getting your opponent into foul trouble.<br/>

<br/><b>Crash the boards (CTB)</b> - many think that offensive rebounds win games, if you're one of them and you have a few capable rebounders, then you can try this approach. But study your opponents carefully, if their tactical decision is to block out and rebound often, then you will be probably better off using something else. As a side-effect, it's also possible that your players will get fouled just slightly more when you chose CTB.<br/>

<br/><b>Inside shooting (IS)</b> - it's the opposite approach to distant shooting. If you don't feel confident about your players shooting threepointers or if you feel very confident about their close range shooting, this is the instructions you should give. Some managers might notice the similarity between IS and TTP, but the intent is thoroughly different here, it's not to draw fouls, but to get into best possible shooting positions and finish them off!<br/>

<br/><big>NORMAL APPROACH</big><br/>

<br/><b>Normal (N)</b> - players will play defense/offense in a sort of balanced way, depending on their general basketball ability. But while some see normal as a balanced approach to the either defense or offense, many will describe it as a total lack of approach. Experienced managers will almost always prefer to use other instructions, because normal approach can give an edge to the opponents, even when their abilities are inferior to those of your team. When used, normal approach can have a negative impact on team's 2-point shooting and especially turnovers. And while it's still possible for a teams to play well when given that order, it's also likely that such team will suffer a really bad defeat sooner or later.<br/>

<br/><big>TIREDNESS</big><br/>

<br/>After every match you will notice increased tiredness at your starting players. Tiredness is related to the type of game and tactics that were used. In all league, cup and playoff club matches there is a basic tiredness of 4% for the starting five and most tactics add 1% each. RTD and BOAR as the strongest tactics add additional 1% each, same as unrecommended normal/normal instruction. So basically, your starting players will get fatigued between 6% and 8% in every league/cup/playoff club match. Cup Winners Series and Champions Series add the same amount of tiredness tactics-wise, but the base is down at 2%, so players wil get fatigued between 4% and 6% there. Fair Play Cup matches are relaxing for players to play, so they don't tire them at all.<br/>

<br/>On the national team level all tactics bring 1% tiredness less comparing to club matches and the base for friendly matches is 1%, 3% for qualifications and 4% for the World Cup matches.<br/>

<br/>Players recover from tiredness with a rate of 3% five times per week. Every Friday they also receive a special bonus which depends on how good your club's medical center is. Every level of medical center brings 1% of weekly recovery (1% less for players aged over 30). So ideally, player can downsize his fatigue by 20% inside one week. Speaking of tiredness, don't forget to check the Training chapter of the game rules too, because not all fatigue is match-related, immense training will tire your players significantly (12%), while the impact of intense training is also important (6%).<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=matches"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=nationalteams">Next chapter >></a><?php }

}
if ($action=='nationalteams' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch9\"></a><br/><br/>";} else {?><a href="gamerules.php?action=tactics"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=international">Next chapter >></a><br/><br/><?php }?>

<big><b>9. National teams</b></big><br/>

<br/>National coaches are elected by community for the period of two seasons. Whoever gets the most votes on the election becomes national coach. If two or more users receive the same amount of votes, user who signed for the game first is elected. In his first season national coach tries to qualify for World Cup with his team. In every second season 30 countries compete in the World Cup and other teams play friendly matches in order to improve and build for the future. If coach becomes vacant during the two seasons time, re-election is not possible. Using cheating methods during election results in user disqualification, this includes creating accounts in foreign countries, creating multiple accounts and sending spam messages to other users. Campaign can only be advertised on Basketsim forums and not by using private messages.<br/>

<br/>National team can have up to 14 players in the roster. It's up to national coach which players to enroll, as long as they are of suitable nationality and age and not clubless. He can also remove any player from national team for any reason, but this affects team mood in a negative way. The same goes for enrolling, just that negative effect is smaller. Club owners can't withdraw their player from national team, but good communication between them and NT coach is advisable.<br/>

<br/>Feature specific for national teams is "players say". It's a mood of the players in team, who comment on their national coach. Players always act as a team, so it's logical that teams with many changes in the roster tend to have worse team mood. Results also affect players, but not every win and loss is the same. The explanation for this is below.<br/>

<br>Beside offensive and defensive tactics, coaches must also set attitude when setting up tactics for matches. Attitude have impact on various elements of national teams. There are several approaches available:<br/>
- <u>take it easy</u>: players won't play at their full capabilities. If team scores a win the mood won't increase by much. If the team losses, the mood won't drop by much. During the match players will have hard time playing defense and there will be some negative impact towards their rebounding capabilities. However the impact to rebounding is much smaller as impact of skills and tactics. The good thing when playing take it easy is that players will be very relaxed, so they will score freethrows with more ease then usual. Also the chance for injuries is lowered by much.<br/>
- <u>play for the crowd</u>: players will do anything to please the crowd. If the team wins the mood will increase by much, if the team loses this will result in mediocre drop of mood. During the match, players won't focus on defense so much, they will try to make it a high scoring match. Chances for injuries are somehow lowered with this approach.<br/>
- <u>normal approach</u>: this is a normal attitude that shouldn't be confused with normal tactical approach. Normal attitude means that engine will work as usual for any team matches. The mood raise (in case of win) or drop (in case of loss) after the match will be an average one.<br/>
- <u>very important match</u>: players will get the signal to really go for it in the next match. If they win the mood will increase by much, if they lose the mood will drop by much. It is significant for this approach that players will play slightly better defense as usual, but they will get tired more and the chances for injuries will be increased!<br/>
- <u>match of the century</u>: players will face the fact that next match is absolutely cruical for the team. They will respond with strong defensive performance and they will have bonus on their rebounding capabilities. Ofcourse the bonus is much smaller as the impact of skills and it's also important to know that players will be nervous and this may result in more missed freethrow attempts. Chances for injuries will increase and there will be more tiredness involved. If the team wins the mood will go up big time as the goal was achieved. If team losses the mood will drop to some degree, the drop won't be too big as the players were already told that it's a cruical match, so loss was always possible.<br/>

<br/>In case of a walkover loss, severe drop in national team mood is possible and this even include friendly matches, which otherwise have no impact on morale at all. NT coaches should always make sure that full lineup is set, including the reserve players, not just starting five.<br/>

<br/>We've already mentioned team mood several times - there are some things specific for national teams. Mood have an impact towards team performance when it comes to turnovers. Home court advantage have impact to team's shooting performance. Another thing worth mentioning is tiredness gain for starting players in NT matches. Tiredness is lower comparing to club matches, so that players can play for club and national team at once without being too tired. Players also receive extra experience points when they start for their national team. Exprience gain for starting five players in World Cup and WC Qualifying matches is significantly higher to experience gain in club matches. There is ofcourse also some experience gain in national team friendly matches.<br/>

<br/>Another important thing to consider when it comes to national teams are team captains. It's important to pick a captain who will appear in most matches, because a team captain will always fight extra hard for his country and when he will be absent, that extra bit will be missing. Ofcourse changing team captain is an option too, but that results in a team mood drop!<br/>

<br/>National coaches control several other features, they can set up national team home and away shirts, publish statement and set up players shirt numbers. When scouting for players they don't have special tools, but they can use the help of community and existing tools like club rosters, transfer histories, supporter stats data.<br/>

<br/>Same user can't control two national teams at once. It's up to agreement between U19 and senior coach if some very talented U19 player should play for senior or junior national team. When players reach the age of 20, they must be removed from U19 selections before first match day of the season (Friday). If not, International Basketsim Federation removes them, but this can be extra bad for the national team mood.<br/>

<br/>When World Cup is over, history page is created, best starting five and MVP of the tournament and final are called. Players from top three countries receive medals. All players who were part of the team in any World Cup game are eligible to receive a medal. Managers and nations also receive medals, for managers they are visible on club page and for nations on senior or junior page of national team. After period of two seasons is completed, elections for new national coaches take place. Same manager can be re elected several times, it all depends on the trust of community in his work. After each election morale for national teams changes, values tend to normalize, low levels are increased and high levels somewhat lowered.<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=tactics"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=international">Next chapter >></a><?php }

}
if ($action=='international' OR $action=='all') {
if ($action=='all') {echo "<a name=\"ch10\"></a><br/><br/>";} else {?><a href="gamerules.php?action=nationalteams"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=denominations">Next chapter >></a><br/><br/><?php }?>

<big><b>10. International competitions</b></big><br/><br/>

There are three international competitions in Basketsim. Two of those are reserved for the best teams from previous season. Best teams from national leagues compete in Champions Series (CS) and best teams from national cups compete in Cup Winners Series (CWS), with exception of teams already accepted to play in CS. Countries with greater success from the past can get additional spots in both competitions. If cup semifinalists or quarterfinalists are eligible to play in CWS, score difference and points scored are used to separate amongst them. Both, CS and CWS, are played as playoff series. If one team wins first two matches they win the series with 2-0, else third match decides the series. Since season 9 there is a single final match deciding the winner in both competitions.<br/>

<br/>Money generated from the attendance is given to the International Basketsim Federation (IBF) and teams are awarded after their elimination from the contest. You can see the structure of awards in the table below.<br/><br/>

<table border="1" cellspacing="0" cellpadding="0" width="45%">
<tr><td align="left" bgcolor="#efefef"></td><td align="right" bgcolor="#efefef">CS</td><td align="right" bgcolor="#efefef">CWS</td></tr>
<tr><td align="left" bgcolor="#efefef">Winner</td><td align="right">&nbsp;2.500.000</td><td align="right">&nbsp;1.800.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Runner-up</td><td align="right">1.500.000</td><td align="right">1.200.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Semi-finalist</td><td align="right">1.000.000</td><td align="right">900.000</td></tr>
<tr><td align="left" bgcolor="#efefef">Quarter-finalist</td><td align="right">750.000</td><td align="right">720.000</td></tr>
<tr><td align="left" bgcolor="#efefef">4th round exit</td><td align="right">500.000</td><td align="right">480.000</td></tr>
<tr><td align="left" bgcolor="#efefef">3rd round exit</td><td align="right">300.000</td><td align="right">240.000</td></tr>
<tr><td align="left" bgcolor="#efefef">2nd round exit</td><td align="right">150.000</td><td align="right">120.000</td></tr>
<tr><td align="left" bgcolor="#efefef">1st round exit</td><td align="right">75.000</td><td align="right">60.000</td></tr>
</table>

<br/>Teams get additional money from sponsors on weekly basis while competing in CS or CWS. This amount depends on the type of competition, success and quality of the starting five in team's last home match. From financial point of view it's important to play your star players at home, because that attracts VIP visitors and as result, sponsors give team more money (from competitive perspective there is no home advantage in CS/CWS). Fatigue for players is lower in CS and CWS matches if we compare them with league matches, while experience-gain is higher. Player can pick an injury while performing in CS/CWS, but harsh injuries are uncommon. CS/CWS matches don't count towards training, so player must still be involved in league, cup or friendly starting five to be eligible for training.<br/>

<a name="fpc"></a><br/><big>FAIR PLAY CUP</big><br/>
<!--
dodam all star game!  ;;  it's hard to say which skills most important na players.php v rules pa primary secondary?! oz kar VSE!! [v tabelce lepo] .. poudarim da je pomen glede na event in ni črnobelo za pozicijo, vsi rabijo skoraj vse!!  ++PG extremely important   ;;;   napisani pogoji za by podpis vs osebnost   ;;   +rare stran pri et kovčih?!!
++low quality matches - more random ; ?????
"it's easier to score from TO (or rebounds) and that's not included in 2p team rating"
def event v rules (pomembnost)
experience ... star sistem zelo malo, nov sistem malo

wiki chat v gamerules (med eskterne linke?!!)
-->
<br/>Third international cup in Basketsim is known as the Fair Play Cup (FPC). This is a "thank you cup" for all Basketsim supporters. It gives managers an opportunity to play international matches against opponents from all over the World. FPC is played in a two-phase format. First phase is a group round with 6 teams in each of the approximately 210 groups. Top two teams from every group and some of the best 3rd placed teams qualify for the elimination stage, which is played in the format similar to national cups: every loss is eliminating one. Players don't get tired while playing FPC and there are no significant injuries. The awards that winners can expect are endless amount of joy and pride over the beautiful trophy and also an entry to the next season Champions Series! Also, if you are chasing flags, FPC duels can ease your task of completing your flags collection. Loyal supporters of the game will be happy to notice that 10 appearances in the Fair Play Cup bring a special trophy to the club's trophy room. FPC is ofcourse competitive event, but the larger purpose behind it is for teams and managers from various countries and even continents to get in touch and not just enjoy their mutual games, but perhaps also their correspondence in form of personal messages or exchanged guestbook entries. FPC is really not the place to worry about not being competitive, just go out there, give your best and enjoy the additional matches, with no usual league or cup pressure!<br/>

<?php if ($action=='all') {echo "<br/><br/><br/><a  href=\"#GRtop\">To the top</a>";} else {?><br/><a href="gamerules.php?action=nationalteams"><< Last chapter</a> | <a href="gamerules.php">Rules</a> | <a href="gamerules.php?action=denominations">Next chapter >></a><?php }

}
if ($action=='denominations' OR $action=='all') {
$color = $_GET["color"]; if (!$color) {$color=999;}
if ($action=='all') {echo "<a name=\"ch11\"></a><br/><br/>";} else {?><a href="gamerules.php?action=international"><< Last chapter</a> | <a href="gamerules.php">Rules</a><br/><br/><?php }?>

<big><b>11. Denominations</b></big><br/>

<?php if ($color>19 AND $color<>999) {?>
<br/><big>NATIONAL TEAM MOOD (PLAYERS SAY)</big><br/><br/><?php
if ($color==20) {?><font color="darkred"><b><?=$langmark1564?></b></font><br/><?php } else {echo $langmark1564,"<br/>";}
if ($color==21) {?><font color="darkred"><b><?=$langmark1565?></b></font><br/><?php } else {echo $langmark1565,"<br/>";}
if ($color==22) {?><font color="darkred"><b><?=$langmark1566?></b></font><br/><?php } else {echo $langmark1566,"<br/>";}
if ($color==23) {?><font color="darkred"><b><?=$langmark1567?></b></font><br/><?php } else {echo $langmark1567,"<br/>";}
if ($color==24) {?><font color="darkred"><b><?=$langmark1568?></b></font><br/><?php } else {echo $langmark1568,"<br/>";}
if ($color==25) {?><font color="darkred"><b><?=$langmark1569?></b></font><br/><?php } else {echo $langmark1569,"<br/>";}
if ($color==26) {?><font color="darkred"><b><?=$langmark1570?></b></font><br/><?php } else {echo $langmark1570,"<br/>";}
if ($color==27) {?><font color="darkred"><b><?=$langmark1571?></b></font><br/><?php } else {echo $langmark1571,"<br/>";}
if ($color==28) {?><font color="darkred"><b><?=$langmark1572?></b></font><br/><?php } else {echo $langmark1572,"<br/>";}
} else {$zims=44;}?>

<br/><big>SKILLS</big><br/><br/>
<?php
if ($_COOKIE['userid'] AND $_COOKIE['geslo'] AND strlen($lang)>1) {$kw=46;
if ($color==0) {?><font color="darkred"><b><?=$langmark111?> (0)</b></font><br/><?php } else { ?><?=$langmark111?> (0)<br/><?php }
if ($color==1) {?><font color="darkred"><b><?=$langmark096?> (1)</b></font><br/><?php } else { ?><?=$langmark096?> (1)<br/><?php }
if ($color==2) {?><font color="darkred"><b><?=$langmark097?> (2)</b></font><br/><?php } else { ?><?=$langmark097?> (2)<br/><?php }
if ($color==3) {?><font color="darkred"><b><?=$langmark098?> (3)</b></font><br/><?php } else { ?><?=$langmark098?> (3)<br/><?php }
if ($color==4) {?><font color="darkred"><b><?=$langmark099?> (4)</b></font><br/><?php } else { ?><?=$langmark099?> (4)<br/><?php }
if ($color==5) {?><font color="darkred"><b><?=$langmark100?> (5)</b></font><br/><?php } else { ?><?=$langmark100?> (5)<br/><?php }
if ($color==6) {?><font color="darkred"><b><?=$langmark101?> (6)</b></font><br/><?php } else { ?><?=$langmark101?> (6)<br/><?php }
if ($color==7) {?><font color="darkred"><b><?=$langmark102?> (7)</b></font><br/><?php } else { ?><?=$langmark102?> (7)<br/><?php }
if ($color==8) {?><font color="darkred"><b><?=$langmark103?> (8)</b></font><br/><?php } else { ?><?=$langmark103?> (8)<br/><?php }
if ($color==9) {?><font color="darkred"><b><?=$langmark104?> (9)</b></font><br/><?php } else { ?><?=$langmark104?> (9)<br/><?php }
if ($color==10) {?><font color="darkred"><b><?=$langmark105?> (10)</b></font><br/><?php } else { ?><?=$langmark105?> (10)<br/><?php }
if ($color==11) {?><font color="darkred"><b><?=$langmark106?> (11)</b></font><br/><?php } else { ?><?=$langmark106?> (11)<br/><?php }
if ($color==12) {?><font color="darkred"><b><?=$langmark107?> (12)</b></font><br/><?php } else { ?><?=$langmark107?> (12)<br/><?php }
if ($color==13) {?><font color="darkred"><b><?=$langmark108?> (13)</b></font><br/><?php } else { ?><?=$langmark108?> (13)<br/><?php }
if ($color==14) {?><font color="darkred"><b><?=$langmark1584?> (14)</b></font><br/><?php } else { ?><?=$langmark1584?> (14)<br/><?php }
if ($color==15) {?><font color="darkred"><b><?=$langmark1585?> (15)</b></font><br/><?php } else { ?><?=$langmark1585?> (15)<br/><?php }
if ($color==16) {?><font color="darkred"><b><?=$langmark1586?> (16)</b></font><br/><?php } else { ?><?=$langmark1586?> (16)<br/><?php }
if ($color==17) {?><font color="darkred"><b><?=$langmark1587?> (17)</b></font><br/><?php } else { ?><?=$langmark1587?> (17)<br/><?php }
if ($color==18) {?><font color="darkred"><b><?=$langmark1588?> (18)</b></font><br/><?php } else { ?><?=$langmark1588?> (18)<br/><?php }
if ($color==19) {?><font color="darkred"><b><?=$langmark109?> (19)</b></font><br/><?php } else { ?><?=$langmark109?> (19)<br/><?php }
if ($color==20) {?><font color="darkred"><b><?=$langmark110?> (20)</b></font><br/><?php } else { ?><?=$langmark110?> (20)<br/><?php }
}
if ($kw<>46) {
if ($color==0) {?><font color="darkred"><b>none (0)</b></font><br/><?php } else {?>none (0)<br/><?php }
if ($color==1) {?><font color="darkred"><b>pathetic (1)</b></font><br/><?php } else {?>pathetic (1)<br/><?php }
if ($color==2) {?><font color="darkred"><b>terrible (2)</b></font><br/><?php } else {?>terrible (2)<br/><?php }
if ($color==3) {?><font color="darkred"><b>poor (3)</b></font><br/><?php } else {?>poor (3)<br/><?php }
if ($color==4) {?><font color="darkred"><b>below average (4)</b></font><br/><?php } else {?>below average (4)<br/><?php }
if ($color==5) {?><font color="darkred"><b>average (5)</b></font><br/><?php } else {?>average (5)<br/><?php }
if ($color==6) {?><font color="darkred"><b>above average (6)</b></font><br/><?php } else {?>above average (6)<br/><?php }
if ($color==7) {?><font color="darkred"><b>good (7)</b></font><br/><?php } else {?>good (7)<br/><?php }
if ($color==8) {?><font color="darkred"><b>very good (8)</b></font><br/><?php } else {?>very good (8)<br/><?php }
if ($color==9) {?><font color="darkred"><b>great (9)</b></font><br/><?php } else {?>great (9)<br/><?php }
if ($color==10) {?><font color="darkred"><b>extremely great (10)</b></font><br/><?php } else {?>extremely great (10)<br/><?php }
if ($color==11) {?><font color="darkred"><b>fantastic (11)</b></font><br/><?php } else {?>fantastic (11)<br/><?php }
if ($color==12) {?><font color="darkred"><b>amazing (12)</b></font><br/><?php } else {?>amazing (12)<br/><?php }
if ($color==13) {?><font color="darkred"><b>extra-ordinary (13)</b></font><br/><?php } else {?>extra-ordinary (13)<br/><?php }
if ($color==14) {?><font color="darkred"><b>magnificent (14)</b></font><br/><?php } else {?>magnificent (14)<br/><?php }
if ($color==15) {?><font color="darkred"><b>phenomenal (15)</b></font><br/><?php } else {?>phenomenal (15)<br/><?php }
if ($color==16) {?><font color="darkred"><b>sensational (16)</b></font><br/><?php } else {?>sensational (16)<br/><?php }
if ($color==17) {?><font color="darkred"><b>miraculous (17)</b></font><br/><?php } else {?>miraculous (17)<br/><?php }
if ($color==18) {?><font color="darkred"><b>legendary (18)</b></font><br/><?php } else {?>legendary (18)<br/><?php }
if ($color==19) {?><font color="darkred"><b>magical (19)</b></font><br/><?php } else {?>magical (19)<br/><?php }
if ($color==20) {?><font color="darkred"><b>perfect (20)</b></font><br/><?php } else {?>perfect (20)<br/><?php }
}
?>

<br/><big>TIREDNESS</big><br/>

<br/>energetic (0 - 4%)<br/>
fresh (5 - 9%)<br/>
tired (10 - 14%)<br/>
very tired (15 - 19%)<br/>
extremely tired (20 - 24%)<br/>
drained (25 - 29%)<br/>
exhausted (30% or more)<br/>

<br/><big>MEDICAL CENTER</big><br/>

<br/>non-existant (0)<br/>
broken bones (1)<br/>
cry babies (2)<br/>
brave fighters (3)<br/>
tough guys (4)<br/>
unbreakable (5)<br/>

<br/><big>CHEERLEADERS</big><br/>

<br/>hateful<br/>
bitchy<br/>
irritated<br/>
nice<br/>
happy<br/>
grateful<br/>
cheerful<br/>
blossoming<br/>

<br/><big>HANDLING YOUTHS (COACHES)</big><br/><br/>

pathetic<br/>
poor<br/>
average<br/>
good<br/>
great<br/>
fantastic<br/>
extra-ordinary <span style="color: gray;">(rare)</span><br/>

<?php if ($zims==44) {?>
<br/><big>NATIONAL TEAM MOOD (PLAYERS SAY)</big><br/><br/>

<?=$langmark1564?><!--Things must change for the better!--><br/>
<?=$langmark1565?><!--There are issues in this team--><br/>
<?=$langmark1566?><!--No comment--><br/>
<?=$langmark1567?><!--We hope it will get better soon--><br/>
<?=$langmark1568?><!--We are happy with our national coach--><br/>
<?=$langmark1569?><!--Our coach is sooooo goooood--><br/>
<?=$langmark1570?><!--Our coach is bloody brilliant!--><br/>
<?=$langmark1571?><!--We love you coach, please never leave--><br/>
<?=$langmark1572?><!--Our coach is greater than Phil Jackson--><br/>
<?php
}

if ($action<>'all') {?><br/><a href="gamerules.php?action=international"><< Last chapter</a> | <a href="gamerules.php">Rules</a><?php }

}
if (!$action OR $action=='') {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="left">
<img src="img/rules.gif" align="left" border="0" width="130"></td><td valign="top">
<b><font color="darkgreen">You can see game rules chapters on the right. You can also check and print <a href="gamerules.php?action=all">entire rules in one page</a>!</font></b><br/><br/>
If you still have any unanswered questions after reading through the game rules, don't hesitate to use the <a href="indexconf.php">game forums</a> where other users will be happy to discuss various aspects of Basketsim with you.</b><br/>
<br/>If you need to contact Administrator or the Gamemasters, use <a href="gmcontact.php">this form</a>.<br/><br/>
All users should read <a href="terms.php">Terms of Service</a> and the <a href="privacy.php">privacy policy</a>.</td></tr></table>

<hr/><big><b>FAQ section</b></big><br/><br/>

<b>Q: My players are very tired. What can I do?</b><br/>
A: There are at least two ways to rest your players. One is to set training to leisure or at least lower as immense to ease the impact of tiredness. Another way is to rest player on matches, remember that only starting five receive tiredness in the match.<br/><br/>

<!--<b>Q: When I set up the tactics there is a player who is not even part of my team!?</b><br/>
A: This is your coach.<br/><br/>-->

<b>Q: Is it important to have a coach?</b><br/>
A: From training point of view it's important to have a coach. Any kind of coach is better then no coach. So if you're lacking finances go for the cheapest one and he'll make the difference for you!<br/><br/>

<b>Q: What kind of coach should I buy?</b><br/>
A: If you want to focus on training then coach with with a decent work rate is recommended. On the other hand experience can be important when in matches, especially when it comes to the question how well your players convert free throws.<br/><br/>

<b>Q: I just changed my coach, how will that influence my youth team development?</b><br/>
A: Players that are currently developing their skills will continue to do so with the instructions given by your previous coach. But all future development instructions will be ofcourse handled out by your new coach and players will develop skills accordingly.<br/><br/>

<b>Q: Why is my friendly match arranged for 2 months ahead?</b><br/>
A: In 1st part of Basketsim season there are two league matches per week, in second part of the season there is one league match per week and one cup or friendly match per week.<br/><br/>

<b>Q: My players have great star ratings. Can I be take wins against opponents with lower star ratings for granted?</b><br/>
A: Not necessary! Star rating can be tricky, because every aspect of player's quality is equally represented. For example, if player has good ability to make steals but is bad at field shooting, both will have same impact on his star rating. But he'll only make a few steals and will much more frequently shoot during the game. So it can be crucial to give players appropriate tactical orders to get the best out of them.<br/><br/>

<b>Q: Why is star rating not the same in every match?</b><br/>
A: Star rating is influenced by player's tiredness and the quality of the opponent. If your players are tired or if the opponents are very good defensively it's very likely that your player will have a lower star rating. Star rating also improves as players progress through training.<br/><br/>

<b>Q: Is there a default relation between star rating and player's actual stats?</b><br/>
A: There is no neccesary relation: you should always observe both in order to understand how capable your players are.<br/><br/>

<b>Q: At the start of the new season my players have decreased Evaluated value. Why is this so?</b><br/>
A: Because of the aging! EV value is very dependand on player's age, however it will increase again during the season for all players who are making a progress on training.<br/><br/>

<b>Q: Are tactics important in Basketsim?</b><br/>
A: Tactics are important! When you play against a team, that seems to be of a lower quality than yours, you should try to use the qualities of your team to their fullest by using the appropriate tactical orders.<br/><br/>

<b>Q: How do substitutions work?</b><br/>
A: When one of the starting players is fouled out (or injured) he is replaced with the most suitable player from the bench.<br/><br/>

<b>Q: Which players get training?</b><br/>
A: A player must play in the starting team at least once per week to get training. If he plays twice he will not get extra training, but will train according to the last position played.<br/><br/>

<b>Q: My player is old, when will he retire?</b><br/>
A: Players don't retire until they are part of the club. Only clubless players retire, but the better players have tendancy not to retire early.<br/><br/>

<b>Q: My medical center / arena should be upgraded today, but after the midnight update still haven't occur. Why?</b><br/>
A: Daily update is completed when the day is already over, two hours after midnight, between 2 AM and 3 AM server time!<br/><br/>

<b>Q: Can I send private messages to other users for advertising purposes (election campaing, players for sale etc.)?</b><br/>
A: No! Spamming is not allowed, because it's annoying for other users. If you're found to spam the mailboxes, leagueboards or forums you will face the fine or in worst cases - account deletion.<br/><br/>

<b>Q: I want to report a cheating case or suspicious behaviour. Where can I do that?</b><br/>
A: Please use the GM/Admin <a href="gmcontact.php">contact form </a>. This ensures the case will be dealt with as soon as possible. Writing in the forums is not considered as a report, furthermore, it's against the forum rules<br/><br/>

<b>Q: Can I control more than 1 club?</b><br/>
A: No! Owning or (even occasionally) controlling more than one club is forbidden. Each manager must only log in to his own account.<br/><br/>

<b>Q: Can someone play from the same computer as I do? Can my brother play?</b><br/>
A: Yes, but you must not sell any players to each other! And each must only control own account!<br/><br/>

<b>Q: Can I sell my player to my friend, he will pay the price according to player's EV?</b><br/>
A: No, that would be the same as cheating. Pre-arranged transfers are not allowed, just put that player on the market and surely, some manager with no relation to you will buy him at the most fair price.<br/><br/>

<b>Q: I feel I've been sanctioned without a good reason, how can I ask for a reevaluation?</b><br/>
A: Please be mindful that GMs are trying to do all they can to keep suspicious behaviour at bay. Unfortunately, errors can happen. If you feel you've been mistakenly punished, please <a href="gmcontact.php">contact us </a> and we're happy to hear your arguments. GM decisions shouldn't be discussed on forums, as the other users don't have the full picture of the incident, making any argument very counter-productive in that space<br/><br/>

<b>Q: I am supporter and I'd like to change the statement of my player. Can I do this?</b><br/>
A: Yes, ofcourse! Player's statement can be changed at any time. In case of no statement, just click the cloud icon next to his name to set it and in other case, click the same icon twice to edit it.<br/><br/>

<!--<b>Q: Can I change the look of Basketsim?</b><br/>
A: Yes! There are several skins available and you can set your favorite one in your profile (click the icon below the menu on the left)!<br/><br/>-->

<b>Q: Names and surnames for my country don't seem right. Many players have names that are untypical.</b><br/>
A: Please contact us at basketsim@basketsim.com and we'll look into it, it's always possible to improve list of names for the future use.<br/><br/>

<b>Q: I've noticed some kind of an error on the page. What should I do?</b><br/>
A: If you notice a bug, report it to basketsim@basketsim.com and it will be examined as soon as possible.<br/><br/>

<!--<b>Q: I'd like this site to be translated to my language. Can I help?</b><br/>
A: If your language is not amongst the available languages and you're willing to help, send a notice to basketsim@basketsim.com and you'll be given the instructions.<br/><br/>-->

</td><td class="border" width="32%">

<h2>Rules chapters</h2><br/>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td align="right" width="4"><font color="darkgreen"><b>0</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=season"><b>Introduction</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>1</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=players"><b>Players</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>2</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=training"><b>Training</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>3</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=youth"><b>Youth</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>4</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=transfers"><b>Transfers</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>5</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=finances"><b>Finances</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>6</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=arena"><b>Arena</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>7</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=matches"><b>Matches</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>8</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=tactics"><b>Tactics</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>9</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=nationalteams"><b>National teams</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>10</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=international"><b>International</b></a></td></tr>
<tr><td align="right" width="4"><font color="darkgreen"><b>11</b></a></td><td align="left">&nbsp;&nbsp;<a href="gamerules.php?action=denominations"><b>Denominations</b></a></td></tr>
</table>

<br/><a name="addon"></a><h2>Basketsim add-ons</h2><br/>

<a href="http://www.bamanager.net/" target="_blank" rel="nofollow">BAM</a><br/>
<!--<a href="http://www.basketsim.gr/bswiki/index.php?title=Main_Page" target="_blank">bsWiki</a> (<a href="club.php?clubid=12173" class="greenhilite">thimios</a>)<br/>-->
<a href="http://facebook.basketsim.com" target="_blank">Official Facebook page</a><br/>
<a href="http://bsgoodies.blogspot.com/" target="_blank" rel="nofollow">BS Goodies</a> (<a href="club.php?clubid=11972" class="greenhilite">manathan</a>)<br/>
<a href="http://bsgoodies.blogspot.com/2011/08/basketfox-enhanced-by-bsgoodies.html#links" target="_blank" rel="nofollow">BasketFox</a><br/>
<a href="http://bs.helpdesk.free.fr/" target="_blank" rel="nofollow">BS-helpdesk</a><br/>
<!--<a href="http://www.basketsim.gr/index.php?page=home&lang=en" target="_blank">basketsim.gr</a> (<a href="club.php?clubid=12173" class="greenhilite">thimios</a>)<br/>-->
<a href="http://bs-spain.mejorforo.net/" target="_blank" rel="nofollow">Basketsim Spain</a> (<a href="club.php?clubid=35746" class="greenhilite">Rainman</a>)<br/>
<a href="http://www.kaskus.co.id/showthread.php?t=14271169" target="_blank" rel="nofollow">Basketsim Indonesia</a> (<a href="club.php?clubid=74706" class="greenhilite">redflowers</a>)<br/>
<!--<a href="http://www.basketsim.gr/bswiki/index.php?title=The_BS_Times_-_edition_0001" target="_blank">The BS Times</a><br/>-->
<a href="http://bsretards.webs.com/" target="_blank" rel="nofollow">BS-Retards</a><br/>
<a href="http://basketsim.wikia.com/wiki/Main_Page" target="_blank" rel="nofollow">BS-Wiki</a><br/>
<!--<a href="http://www.basketsimglobal.com/" target="_blank">BS Global</a> (<a href="club.php?clubid=3068" class="greenhilite">hatukas</a>)<br/>-->

<br/><h2>Basketsim helpers</h2><br/>
<i>For any problem that you can't solve, try contacting your local helper.</i><br/>

<table width="100%" cellspacing="0" cellpadding="0">
<tr><td><br/></td></tr>
<tr><td><nobr><a href="club.php?clubid=15986">MOD-reggie</a> (Bosnia and Herzegovina)</nobr></td></tr>
<tr><td><a href="club.php?clubid=11932">MOD-Exorcist</a> (Bulgaria)</td></tr>
<tr><td><a href="club.php?clubid=104090">MOD-madskillz</a> (Czech,Slovakia)</td></tr>
<tr><td><a href="club.php?clubid=3365">MOD-Ruthless</a> <i>(English language)</i></td></tr>
<tr><td><a href="club.php?clubid=9119">GM-starte</a> (Estonia)</td></tr>
<tr><td><a href="club.php?clubid=850">GM-Ripp</a> (Estonia,Norway)</td></tr>
<tr><td><a href="club.php?clubid=5402">Houston</a> (Finland,Sweden)</td></tr>
<tr><td><a href="club.php?clubid=29420">MOD-Skip</a> (Italy)</td></tr>
<tr><td><a href="club.php?clubid=16231">MOD-Kermitt</a> (Poland)</td></tr>
<tr><td><a href="club.php?clubid=20311">MOD-danip</a> (Portugal,Brazil)</td></tr>
<tr><td><a href="club.php?clubid=36">GM-Bebe</a> (Global)</td></tr>
<tr><td><a href="club.php?clubid=2590">GM-Dobay</a> (Global)</td></tr>
<tr><td><a href="club.php?clubid=3720">MOD-CheGhe</a> (Romania)</td></tr>
<tr><td><a href="club.php?clubid=41156">MOD-Sanych</a> (Russia)</td></tr>
<tr><td><a href="club.php?clubid=278">mod-zcurcic</a> (Serbia)</td></tr>
<tr><td><a href="club.php?clubid=16322">MOD-precozizi</a> <i>(Spanish language)</i></td></tr>
<tr><td><br/></td></tr>
<tr><td><a href="club.php?clubid=1820">GD-Longer</a> <i>(graphic design)</i></td></tr>
</table>

<br/><h2>Basketsim graphics</h2><br/>
<i>You can use them freely on any web page or in forum signatures.</i><br/>
<br/><a href="img/newbanner.gif" target="_blank">Modern banner</a>
<br/><a href="img/basketsim_banner.jpg" target="_blank">Classic banner</a>
<br/><a href="img/BSLS_light.png" target="_blank">Logo white</a>
<br/><a href="img/BSLS_dark.png" target="_blank">Logo red</a>
<br/><a href="userbars.php">Basketim userbars</a>
<br/><a href="img/BasketsimGlobalC.png" target="_blank">Basketsim coverage</a>
<br/><a href="img/tfl.gif" target="_blank">Basketsim countries</a>
<?php
}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>