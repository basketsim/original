<?php
require_once("check_session.php");
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffedbf">
<?php if(strlen(trim($szMessage))){?>
<tr><td class="error" align="left" valign="middle" height="28" colspan="3"><?=$szMessage?></td></tr><?}?>
<tr>
<td width="50%" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffedbf">
<tr><td bgcolor="<?print BGCOLOR;?>" class="labels" height="17">&nbsp;<font color="white"><?=$label[608]?></font></td></tr>
<tr><td height="5"></td></tr>
<tr><td>
1. <?=$label[606]?><br/>
2. <?=$label[607]?><br/>
</td></tr>
<tr><td height="20"></td></tr>
<tr><td>
<?php
echo $level;
$resQuery = mysql_query("SELECT folder_id, folder_type FROM conf_folders WHERE folder_type NOT LIKE 'A' ORDER BY folder_type ASC , `folder_priority` DESC , folder_id ASC") or die(mysql_error());
while ($f=mysql_fetch_array($resQuery)) {
$folderid = $f[folder_id];
$folder_type = $f[folder_type];
$prev = mysql_query("SELECT * FROM conf_user_folder WHERE folder_id='$folderid' && user_id='$userid'");
if (!mysql_num_rows($prev)) {echo "&nbsp;<a href=\"joinconference.php?nFolderId=".$folderid."&nFolderType=",$folder_type,"\" title=\"",$label[519],"\"><img src=\"img/join.gif\" border=\"0\" alt=\"",$label[519],"\" title=\"",$label[519],"\">&nbsp;".$folderid."</a><br/>";}
}
if ($current_right > 1) {?>
&nbsp;<a href="joinconference.php?nFolderId=Moderators&nFolderType=A" title="<?=$label[519]?>"><img src="img/join.gif" border="0" alt="<?=$label[519]?>" title="<?=$label[519]?>">&nbsp;Moderators</a><br/><?php }
if ($current_right > 2) {?>
&nbsp;<a href="joinconference.php?nFolderId=Gamemasters&nFolderType=A" title="<?=$label[519]?>"><img src="img/join.gif" border="0" alt="<?=$label[519]?>" title="<?=$label[519]?>">&nbsp;Gamemasters</a><br/><?php }
if ($langad == 1) {?>
&nbsp;<a href="joinconference.php?nFolderId=Language&nFolderType=A" title="<?=$label[519]?>"><img src="img/join.gif" border="0" alt="<?=$label[519]?>" title="<?=$label[519]?>">&nbsp;Language</a><br/><?php }
if ($natac > 0) {?>
&nbsp;<a href="joinconference.php?nFolderId=National Coaches&nFolderType=A" title="<?=$label[519]?>"><img src="img/join.gif" border="0" alt="<?=$label[519]?>" title="<?=$label[519]?>">&nbsp;National Coaches</a><br/>
<?php }
$tiho = mysql_query("SELECT * FROM cbpp_users WHERE userid = '$userid'");
if (mysql_num_rows($tiho)==1) {
?>
&nbsp;<a href="joinconference.php?nFolderId=Developers&nFolderType=A" title="<?=$label[519]?>"><img src="img/join.gif" border="0" alt="<?=$label[519]?>" title="<?=$label[519]?>">&nbsp;Developers</a><br/>
<?php }?>
</td></tr>
</table>
</td>
<td width="3%">&nbsp;</td>
<td width="*" valign="top">
<table border="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%">
<tr>
<td bgcolor="<?print BGCOLOR;?>" class="labels" height="17">&nbsp;<font color="white"><?=$label[515] ?></font></TD>
</tr>
<tr>
<td>
<?php
$szQuery = "SELECT * FROM conf_user_folder LEFT JOIN conf_folders USING(folder_id) WHERE conf_user_folder.user_id = ".$userid." ORDER BY conf_user_folder.join_date ASC";
$resQuery = mysql_query($szQuery) or die(mysql_error());
if(mysql_num_rows($resQuery))
{
?>
<table cellpadding="0" cellspacing="0" width="100%" border="0">
<tr><td colspan="3" height="5"></td></tr>
<?php
while($arrQuery = mysql_fetch_array($resQuery))
{
?>
<tr>
<td width="10" valign="middle"><a target="mainFrame" href="leaveconference.php?nFolderId=<?=$arrQuery['folder_id']?>" title="<?=$label[522]?>"><img align="absmiddle" src="img/leave.gif" border="0" alt="<?=$label[522]?>" title="<?=$label[522]?>"></a></td></td>
		<td width="2"></td>
		<td width="*" valign="middle" height="15">
		<?php
		switch($arrQuery['folder_type'])
		{
			case 'A':{//alianta
				$szConfName = $arrQuery['folder_id'];
				}break;
			case 'L':{//cupe
				$szQueryName = "SELECT league_name FROM leagues WHERE league_id = '".$arrQuery['item_id']."'";
				$resQueryName = mysql_query($szQueryName) or die(mysql_error());
				$arrQueryName = mysql_fetch_array($resQueryName);
				$szConfName = $arrQueryName['name'];
				}break;
                        case 'N':{//countries
				$szConfName = $arrQuery['folder_id'];
		                }break;
			case 'G':{
				$szConfName = $arrQuery['folder_id'];
				}break;
			default :{die("Invalid folder type !");}break;
		}
		$szConfName = trim($szConfName);
		if(strlen($szConfName) > 22)
		{
			$szConfName = substr($szConfName, 0, 22)."...";
		}
		echo $szConfName;
		?>
	</td>
	</tr>
	<?php }?>
</table>
<?php }else {echo "<br/><em>".$label[517]."</em>";}?>
</td>
</tr>
</table>
</td>
</tr>
</table>