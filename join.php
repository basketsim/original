<?php
require("inc/lang/en.php");
include_once("inc/basic.php");
require_once('inc/config.php');
include("geoip.inc");

function check_ip(){
	$ipParts = explode(".", $_SERVER["REMOTE_ADDR"]);
	if ($ipParts[0] == "165" && $ipParts[1] == "21") {
    	if (getenv("HTTP_CLIENT_IP")) {
        	$ip = getenv("HTTP_CLIENT_IP");
        } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } elseif (getenv("REMOTE_ADDR")) {
            $ip = getenv("REMOTE_ADDR");
        }
    } else {
       return $_SERVER["REMOTE_ADDR"];
   	}
   	return $ip;
}
$user_ip = check_ip();

if(isset($_POST['user_country'])) {
$country44 = $_POST['user_country'];
extract($_POST);
} else {
$gi = geoip_open("GeoIP.dat",GEOIP_STANDARD);
$country44 = geoip_country_name_by_addr($gi, $user_ip);
geoip_close($gi);
}

if(empty($country44) || notExists($country44)) {$country44= 'Argentina';}

$defregions = array();
$defregions = getRegions($country44);
$regionStr = "";

foreach($defregions as $v)
{
   $regionStr .="<option value='$v'>$v</option>\r\n";
}

//dBug($regionStr);

?>
<script language="JavaScript">

function submitForm()
{
   document.joinForm.action='join.php';
   document.joinForm.submit();
}
</script>

<h2><?=$langmark590?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" width="100%">
<td class="border" width="61%" bgcolor="#ffffff">

<b><?=$langmark603?><br/>
<?=$langmark604?><br/>
<?=$langmark605?></b><br/><hr/><br/>

<form name="joinForm" method="post" action="registration.php" style="margin: 0">
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr><td><?=$langmark591?>:</td><td>
   <input type="text" name="user_name" value="<?=$user_name?>" maxlength="16" class="inputreg"> (min.4)</td></tr>

<tr><td><?=$langmark592?>:</td><td>
   <input type="password" name="user_pass" value="<?=$user_pass?>" maxlength="30" class="inputreg"> (min.5)</td></tr>

<tr><td><?=$langmark593?>:</td><td>
   <input type="text" name="user_mail" value="<?=$user_mail?>" class="inputreg"></td></tr>

<tr><td><?=$langmark594?></td><td>
   <input style="margin:0; padding:0;" type="checkbox" name="hide_mail"></td></tr>

<tr><td><?=$langmark595?>:</td><td>
   <input type="text" name="user_real" value="<?=$user_real?>" maxlenght="60" class="inputreg"></td></tr>

<tr><td><?=$langmark596?>:</td><td>
<select name="user_country" class="inputreg" id="pda-brand" ONCHANGE="document.joinForm.action='join.php';document.joinForm.submit();">
<option name="Albania" value="Albania" <?php if ($country44=='Albania'){echo "selected";}?>>Albania</option>
<option name="Argentina" value="Argentina" <?php if ($country44=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($country44=='Australia'){echo "selected";}?>>Australia</option>
<option name="Austria" value="Austria" <?php if ($country44=='Austria'){echo "selected";}?>>Austria</option>
<option name="Belarus" value="Belarus" <?php if ($country44=='Belarus'){echo "selected";}?>>Belarus</option>
<option name="Belgium" value="Belgium" <?php if ($country44=='Belgium'){echo "selected";}?>>Belgium</option>
<option name="Bosnia" value="Bosnia" <?php if ($country44=='Bosnia'){echo "selected";}?>>Bosna and Herzegovina</option>
<option name="Brazil" value="Brazil" <?php if ($country44=='Brazil'){echo "selected";}?>>Brazil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($country44=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($country44=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($country44=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($country44=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($country44=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Croatia" value="Croatia" <?php if ($country44=='Croatia'){echo "selected";}?>>Croatia</option>
<option name="Cyprus" value="Cyprus" <?php if ($country44=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($country44=='Czech Republic'){echo "selected";}?>>Czech Republic</option>
<option name="Denmark" value="Denmark" <?php if ($country44=='Denmark'){echo "selected";}?>>Danmark</option>
<option name="Egypt" value="Egypt" <?php if ($country44=='Egypt'){echo "selected";}?>>Egypt</option>
<option name="Estonia" value="Estonia" <?php if ($country44=='Estonia'){echo "selected";}?>>Estonia</option>
<option name="Finland" value="Finland" <?php if ($country44=='Finland'){echo "selected";}?>>Finland</option>
<option name="France" value="France" <?php if ($country44=='France'){echo "selected";}?>>France</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($country44=='FYR Macedonia'){echo "selected";}?>>FYR Macedonia</option>
<option name="Georgia" value="Georgia" <?php if ($country44=='Georgia'){echo "selected";}?>>Georgia</option>
<option name="Germany" value="Germany" <?php if ($country44=='Germany'){echo "selected";}?>>Germany</option>
<option name="Greece" value="Greece" <?php if ($country44=='Greece'){echo "selected";}?>>Greece</option>
<option name="Hong Kong" value="Hong Kong" <?php if ($country44=='Hong Kong'){echo "selected";}?>>Hong Kong</option>
<option name="Hungary" value="Hungary" <?php if ($country44=='Hungary'){echo "selected";}?>>Hungary</option>
<option name="India" value="India" <?php if ($country44=='India'){echo "selected";}?>>India</option>
<option name="Indonesia" value="Indonesia" <?php if ($country44=='Indonesia'){echo "selected";}?>>Indonesia</option>
<option name="Ireland" value="Ireland" <?php if ($country44=='Ireland'){echo "selected";}?>>Ireland</option>
<option name="Israel" value="Israel" <?php if ($country44=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($country44=='Italy'){echo "selected";}?>>Italia</option>
<option name="Japan" value="Japan" <?php if ($country44=='Japan'){echo "selected";}?>>Japan</option>
<option name="Latvia" value="Latvia" <?php if ($country44=='Latvia'){echo "selected";}?>>Latvija</option>
<option name="Lithuania" value="Lithuania" <?php if ($country44=='Lithuania'){echo "selected";}?>>Lithuania</option>
<option name="Malaysia" value="Malaysia" <?php if ($country44=='Malaysia'){echo "selected";}?>>Malaysia</option>
<option name="Malta" value="Malta" <?php if ($country44=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($country44=='Mexico'){echo "selected";}?>>Mexico</option>
<option name="Montenegro" value="Montenegro" <?php if ($country44=='Montenegro'){echo "selected";}?>>Montenegro</option>
<option name="Netherlands" value="Netherlands" <?php if ($country44=='Netherlands'){echo "selected";}?>>Netherlands</option>
<option name="New Zealand" value="New Zealand" <?php if ($country44=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Norway" value="Norway" <?php if ($country44=='Norway'){echo "selected";}?>>Norway</option>
<option name="Peru" value="Peru" <?php if ($country44=='Peru'){echo "selected";}?>>Peru</option>
<option name="Philippines" value="Philippines" <?php if ($country44=='Philippines'){echo "selected";}?>>Philippines</option>
<option name="Poland" value="Poland" <?php if ($country44=='Poland'){echo "selected";}?>>Poland</option>
<option name="Portugal" value="Portugal" <?php if ($country44=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Puerto Rico" value="Puerto Rico" <?php if ($country44=='Puerto Rico'){echo "selected";}?>>Puerto Rico</option>
<option name="Romania" value="Romania" <?php if ($country44=='Romania'){echo "selected";}?>>Romania</option>
<option name="Russia" value="Russia" <?php if ($country44=='Russia'){echo "selected";}?>>Russia</option>
<option name="Serbia" value="Serbia" <?php if ($country44=='Serbia'){echo "selected";}?>>Serbia</option>
<option name="Slovakia" value="Slovakia" <?php if ($country44=='Slovakia'){echo "selected";}?>>Slovakia</option>
<option name="Slovenia" value="Slovenia" <?php if ($country44=='Slovenia'){echo "selected";}?>>Slovenia</option>
<option name="South Korea" value="South Korea" <?php if ($country44=='South Korea'){echo "selected";}?>>South Korea</option>
<option name="Spain" value="Spain" <?php if ($country44=='Spain'){echo "selected";}?>>Spain</option>
<option name="Sweden" value="Sweden" <?php if ($country44=='Sweden'){echo "selected";}?>>Sweden</option>
<option name="Switzerland" value="Switzerland" <?php if ($country44=='Switzerland'){echo "selected";}?>>Switzerland</option>
<option name="Thailand" value="Thailand" <?php if ($country44=='Thailand'){echo "selected";}?>>Thailand</option>
<option name="Tunisia" value="Tunisia" <?php if ($country44=='Tunisia'){echo "selected";}?>>Tunisia</option>
<option name="Turkey" value="Turkey" <?php if ($country44=='Turkey'){echo "selected";}?>>Turkey</option>
<option name="Ukraine" value="Ukraine" <?php if ($country44=='Ukraine'){echo "selected";}?>>Ukraine</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($country44=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($country44=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($country44=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($country44=='Venezuela'){echo "selected";}?>>Venezuela</option>
</select></td></tr>

<tr><td>City or region:</td><td>
    <select name="user_region" class="inputreg">
   <?php
   foreach($defregions as $v)
   {
   ?>
   <option name="<?=$v?>" value="<?=$v?>"><?=$v?></option>
   <?php
    }
   ?>
    </select>
</td></tr>

<tr><td><?=$langmark598?>:</td><td>
   <input type="text" name="team_name" value="<?=$team_name?>" maxlength="30" class="inputreg">  (min.3)</td></tr>

<tr><td><?=$langmark599?>:</td><td>
   <input type="text" name="short_name" value="<?=$short_name?>" maxlength="15" class="inputreg">  (min.2)</td></tr>

<tr><td><?=$langmark600?>:</td><td>
   <input type="text" name="arena_name" value="<?=$area_name?>" maxlength="30" class="inputreg">  (min.3)</td></tr>
<tr><td colspan="2" align="center">
   <br/><input type="submit" value="Submit and join Basketsim!" class="buttonreg">

</td></tr>
  </table></form>

<br/><i><?=$langmark606?> <a href="terms.php"><?=$langmark607?></a></i>.

</td><td width="39%">
<img src="img/BSLS_light.png" alt="Basketsim" border="0" width="230">
</td>

</tr>
<tr>
<td><div id="footer" style="text-align:center"> <a href="privacy.php"> Privacy Policy</a> </div></td>
</tr>
</table>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>

<?php
function getRegions($country)
{
   $country = trim($country);
   $rs = mysql_query("SELECT `region` FROM `regions` WHERE TRIM(country)='$country' ORDER BY `id` ASC, `region` ASC");
   $res = array();
   if(mysql_num_rows($rs))
   {
      while($row = mysql_fetch_assoc($rs))
      {
         extract($row);
         $res[] = $region;
      }
   }

   return $res;
}//EO Fn

function notExists($country)
{
   $country = trim($country);
   $q = "SELECT `region` FROM `regions` WHERE TRIM(country)='$country' LIMIT 0, 1";
   $rs = mysql_query($q);
   $res = array();
   if(mysql_num_rows($rs))
   {
      return false;
   }
      return true;
}

function dBug($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
?>