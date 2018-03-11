<b>In the brackets before each description, you can see the type of an event. Different types of events are:</b>
<br/>1 - score for 2 after an assist <!-- done -->
<br/>2 - unassisted score for 2 <!-- done -->
<br/>3 - offensive rebound after a miss for 2 <!-- done -->
<br/>4 - defensive rebound after a miss for 2 <!-- done -->
<br/>5 - turnover
<br/>6 - steal
<br/>7 - unassisted score for 3 <!-- done -->
<br/>8 - offensive rebound after a miss for 3 <!-- done -->
<br/>9 - defensive rebound after a miss for 3 <!-- done -->
<br/>10 - personal foul at 2 point attempt <!-- done -->
<br/>11 - personal foul at 3 point attempt <!-- done -->
<br/>12 - personal foul while 2 pointer is scored <!-- done -->
<br/>13 - personal foul while 3 pointer is scored <!-- done -->
<br/>14 - free throws 2/2 (scored/tries) <!-- done -->
<br/>15 - free throws 1/2 <!-- done -->
<br/>16 - free throws 0/2 <!-- done -->
<br/>17 - free throws 3/3 <!-- done -->
<br/>18 - free throws 2/3 <!-- done -->
<br/>19 - free throws 1/3 <!-- done -->
<br/>20 - free throws 0/3 <!-- done -->
<br/>21 - free throws 1/1 <!-- done -->
<br/>22 - free throws 0/1 <!-- done -->
<br/>23 - fast break with 2 pointer scored
<br/>24 - fast break with 3 pointer scored
<br/>25 - fast break which is later stoped but the team is still on offense
<br/>26 - fast break where offensive player commits turnover
<br/>27 - score for 2 after an offensive rebound <!-- pending examination -->
<br/>28 - missed shot after an offensive rebound followed by a defensive rebound <!-- pending examination -->
<br/>29 - missed shot after an offensive rebound followed by an offesnive rebound <!-- pending examination -->
<br/>30 - intentional foul
<br/>31 - block
<br/>32 - offensive foul <!-- done -->
<br/>33 - injury with a replacement
<br/>34 - end of the quater <!-- done -->
<br/>35 - half time <!-- done -->
<br/>36 - end of the match <!-- done -->
<br/>37 - walkover <!-- done -->
<br/>38 - substitution after 5 personal fouls <!-- done -->
<br/>39 - injury with no replacement available and walkover as a consequence
<br/>40 - defensive event reported before the half time
<br/>41 - defensive event reported before the half time (worse defensive team is scoring nicely)
<br/><br/>

<?php
require_once('../inc/config.php');

$piuka = mysql_query("SELECT `matchevent` , `description` FROM `descriptions` ORDER BY `matchevent` ASC");
$f=0;
while ($f<mysql_num_rows($piuka)) {
$timiA = mysql_result($piuka,$f,"matchevent");
$timiB = mysql_result($piuka,$f,"description");

echo "(",$timiA,") ",htmlentities(stripslashes($timiB)),"<br/>";

$f++;
}
?>