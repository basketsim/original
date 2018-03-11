<?
/*
-------------------------
TRANSLATION INSTRUCTIONS:
-------------------------
1) work in notepad (don't use Word, because it will ruin foreign characters)
2) change your Basketsim language to a local one and try having translation as similar as possible to Basketsim translation
3) check English expressions on the actual BAM page, to see in what context they are used
4) whenever possible try to avoid translating very short expressions with very long ones
-
5) always leave variables as they are (for example $match_status['UPCOMING'] must remain as it is, don't change it!)
6) keep quotes as they are, for example when you translate word 'Handling', keep the single quotes as they are
7) if you use single quote (') within description, then expression must be double quoted (for example "You can't...")
-
If there's anything unclear let me know, you can also use local forum to discuss translations with other users from your country
Thanks for your efforts!
adiego
--------------------------------------------------
Additional info (not related to translations):
All BAM translators receive Language Admin (LA) status on Basketsim and can access Language forum on Basketsim as well. It is prefered that you post your final BAM translation there, because I will use that thread later on to let you know if there should be some new expressions added to translation file (not many, but some might be added, when new BAM features will be available).

All Language Admins are also listed as Basketsim helpers and they play Fair Play Cup even when they are not supporters. This is a thank you note for your efforts! In addition to this, all Language Admins can access special section on Basketsim, here is a link (http://www.basketsim.com/admin/laadmin.php), just please don't share it with anyone else! From that link you are able to check all names and surnames for your country. If you notice any names missing there, you can send them to me and also if you notice any names that should not be there, they can be removed. In most countries names are well sorted, but if you notice that names should be redone in your country that is an option as well.
--------------------------------------------------
*/

       $match_status['UPCOMING']   = 'Upcoming'; //what should be translated is 'Upcoming' (same goes for all cases below)
       $match_status['ONGOING']    = 'Ongoing';
       $match_status['FINISHED']   = 'Finished'; //expression for completed match

       $training_intensity[0]	= 'leisure (15h/week)';
       $training_intensity[1]	= 'normal (25h/week)';
       $training_intensity[2]	= 'intense (30h/week)';
       $training_intensity[3]	= 'immense (40h/week)';

	$training_types[1]	= 'Handling';
	$training_types[2]	= 'Quickness';
	$training_types[3]	= 'Passing';
	$training_types[4]	= 'Dribbling';
	$training_types[5]	= 'Rebounds';
	$training_types[6]	= 'Positioning';
	$training_types[7]	= 'Shooting';
	$training_types[8]	= 'Freethrows';
	$training_types[9]	= 'Defense';

	$match_label["W"]	= 'W'; //win
	$match_label["L"]	= 'L'; //lose
	$match_label["D"]	= 'D'; //draw

	$nat_match_types[1]	= 'Qualification';
	$nat_match_types[2]	= 'Friendly';
	$nat_match_types[3]	= 'World Cup';
	$nat_match_types[4]	= 'World Cup';
	$nat_match_types[11]	= 'Qualification';
	$nat_match_types[12]	= 'Friendly';
	$nat_match_types[13]	= 'World Cup';
	$nat_match_types[14]	= 'World Cup';

	$match_types[0]	        = 'Unknown';
	$match_types[1]	        = 'League';
	$match_types[2]	        = 'Friendly';
	$match_types[3]	        = 'Cup';
	$match_types[4]	        = 'Play Off';
	$match_types[5]	        = 'Fair Play Cup'; //you can keep original name
	$match_types[6]	        = 'International';
	$match_types[7]	        = 'International';
	$match_types[18]        = 'Youth';
	$match_types[19]        = 'Youth Club WC'; //try not to use too long translation
	
	$def_strategy[0]	= 'normal';
	$def_strategy[1]	= 'sprint back on defense';
	$def_strategy[2]	= 'contest every shot';
	$def_strategy[3]	= 'block out and rebound';
	$def_strategy[4]	= 'protect power zone';
	$def_strategy[5]	= 'wear out opponents';
	$def_strategy[6]	= 'half court trap';

	$off_strategy[0]	= 'normal';
	$off_strategy[1]	= 'read the defense';
	$off_strategy[2]	= 'fast early breaks';
	$off_strategy[3]	= 'distance shooting';
	$off_strategy[4]	= 'try to penetrate';
	$off_strategy[5]	= 'crash the boards';
	$off_strategy[6]	= 'inside shooting';

	$quarters[1]	        = 'The first quarter ends. The result is:';
	$quarters[2]	        = 'The second quarter ends. The result is:';
	$quarters[3]	        = 'The third quarter ends. The result is:';
	$quarters[4]	        = 'The match is over now. The final result is:';

	$arch_match[ONEMONTH]		= '1 month';
	$arch_match[TWOMONTHS]		= '2 months';
	$arch_match[THREEMONTHS]	= '3 months';
	$arch_match[SIXMONTHS]		= '6 months';
	$arch_match[NINEMONTHS]		= '9 months';
	$arch_match[ONEYEAR]		= '1 year';

	$tlabels[BAMANAGER]		= "BAManager {$BAMVER}"; //don't translate this, just leave it as it is
	$tlabels[TEAM]			= $_SESSION["teamname"]; //don't translate this, just leave it as it is
	$tlabels[NTEAM]			= $_SESSION['natteam']; //don't translate this, just leave it as it is
	$tlabels[BASKETSIM]		= "Basketsim"; //don't translate this

	$tlabels[SCREENSHOOTS]		= 'Screenshoots';
	$tlabels[LOGIN]			= 'Login';
	$tlabels[REGISTER]		= 'Register';
	$tlabels[BAMABOUT]		= 'About';
	$tlabels[BAMCONTACT]		= 'Contact';
	$tlabels[BAMNEWS]		= 'News';
	$tlabels[LOGOUT]		= 'Logout';
	$tlabels[TEAMPLAYERS]		= 'Players';
	$tlabels[TEAMMATCHES]		= 'Matches';
	$tlabels[TEAMTRANSFERHISTORY]	= 'Transfer history';
	$tlabels[TEAMTRAININGHISTORY]	= 'Training history';
	$tlabels[NTEAMPLAYERS]		= 'Players';
	$tlabels[NTEAMMATCHES]		= 'Matches';
	$tlabels[NTEAMDOWNLOAD]		= 'Download';
	//$tlabels[NTEAMSUGGESTIONS]	= 'Proposals';
	$tlabels[SETTINGS]		= 'Settings';
	$tlabels[SETGENERAL]		= 'General';
	$tlabels[SETCOLUMNS]		= 'Columns';
	$tlabels[SETWEIGHTS]		= 'Weights';
	$tlabels[TEAMDETAILS]		= 'Dashboard';
	$tlabels[TOOLS]			= 'Tools';
	$tlabels[TOOLS_B5]		= 'Best 5';
	$tlabels[TOOLS_BPOS]		= 'Best position';
	$tlabels[ONLINE]		= 'Download';
	$tlabels[ONLINETEAMDATA]	= 'Team data';
	$tlabels[ONLINETEAMMATCHES]	= 'Matches';
	$tlabels[MSG]			= 'Mailbox';
	$tlabels[MSGINBOX]		= 'Inbox';
	$tlabels[MSGOUTBOX]		= 'Sent messages';
	$tlabels[MSGWRITE]		= 'Write message';
	$tlabels[GM]			= 'Gamemaster';
	$tlabels[GMCOUNTRIES]		= 'Countries';

	$tcolumns["name"]		= 'Name';
	$tcolumns["onsale"]		= 'On sale';
	$tcolumns["injury"]		= 'Injury';
	$tcolumns["country"]		= 'Country';
	$tcolumns["age"]		= 'Age';
	$tcolumns["wage"]		= 'Wage';
	$tcolumns["rating_last"]	= 'Rating-last';
	$tcolumns["rating_best"]	= 'Rating-best';
	$tcolumns["rating_average"]	= 'Rating-average'; //make sure not to use too long expression!
	$tcolumns["ballhandling"]	= 'Handling';
	$tcolumns["quickness"]		= 'Quickness';
	$tcolumns["passing"]		= 'Passing';
	$tcolumns["dribbling"]		= 'Dribbling';
	$tcolumns["rebounding"]		= 'Rebounding';
	$tcolumns["positioning"]	= 'Positioning';
	$tcolumns["shooting"]		= 'Shooting';
	$tcolumns["freethrows"]		= 'Freethrows';
	$tcolumns["defense"]		= 'Defense';
	$tcolumns["workrate"]		= 'Workrate';
	$tcolumns["experience"]		= 'Experience';
	$tcolumns["tiredness"]		= 'Tiredness';
	$tcolumns["coach"]		= 'Coach';
	$tcolumns["characterr"]		= 'Character';
	$tcolumns["height"]		= 'Height';
	$tcolumns["weight"]		= 'Weight';
	$tcolumns["2p"]			= '2P';
	$tcolumns["3p"]			= '3P';
	$tcolumns["ft"]			= 'FT';
	$tcolumns["reb"]		= 'REB';
	$tcolumns["pf"]			= 'PF';
	$tcolumns["opf"]		= 'OPF';
	$tcolumns["assists"]		= 'AST';
	$tcolumns["steals"]		= 'STL';
	$tcolumns["turnovers"]		= 'TO';
	$tcolumns["sf_pos"]		= 'SF';
	$tcolumns["pf_pos"]		= 'PF';
	$tcolumns["c_pos"]		= 'C';
	$tcolumns["pg_pos"]		= 'PG';
	$tcolumns["sg_pos"]		= 'SG';
	$tcolumns["playerid"]		= 'Player ID';

//for some of the expressions below type again the same translations as above

	$tcolumnsdesc["name"]		= 'Name';
	$tcolumnsdesc["onsale"]		= 'On sale';
	$tcolumnsdesc["injury"]		= 'Injury';
	$tcolumnsdesc["country"]	= 'Country';
	$tcolumnsdesc["age"]		= 'Age';
	$tcolumnsdesc["wage"]		= 'Wage';
	$tcolumnsdesc["rating_last"]	= 'Rating-last';
	$tcolumnsdesc["rating_best"]	= 'Rating-best';
	$tcolumnsdesc["rating_average"]	= 'Rating-average';
	$tcolumnsdesc["ballhandling"]	= 'Handling';
	$tcolumnsdesc["quickness"]	= 'Quickness';
	$tcolumnsdesc["passing"]	= 'Passing';
	$tcolumnsdesc["dribbling"]	= 'Dribbling';
	$tcolumnsdesc["rebounding"]	= 'Rebounding';
	$tcolumnsdesc["positioning"]	= 'Positioning';
	$tcolumnsdesc["shooting"]	= 'Shooting';
	$tcolumnsdesc["freethrows"]	= 'Freethrows'; //make sure not to use too long expression!
	$tcolumnsdesc["defense"]	= 'Defense';
	$tcolumnsdesc["workrate"]	= 'Workrate';
	$tcolumnsdesc["experience"]	= 'Experience';
	$tcolumnsdesc["tiredness"]	= 'Tiredness';
	$tcolumnsdesc["coach"]		= 'Coach';
	$tcolumnsdesc["characterr"]	= 'Character';
	$tcolumnsdesc["height"]		= 'Height';
	$tcolumnsdesc["weight"]		= 'Weight';
	$tcolumnsdesc["c_pos"]		= 'Center';
	$tcolumnsdesc["pf_pos"]		= 'Power Forward';
	$tcolumnsdesc["sf_pos"]		= 'Small Forward';
	$tcolumnsdesc["sg_pos"]		= 'Shooting Guard';
	$tcolumnsdesc["pg_pos"]		= 'Point Guard';
	$tcolumnsdesc["2p"]		= '2 Points';
	$tcolumnsdesc["3p"]		= '3 Points';
	$tcolumnsdesc["ft"]		= 'Free throw';
	$tcolumnsdesc["reb"]		= 'Rebounding';
	$tcolumnsdesc["pf"]		= 'Personal fouls';
	$tcolumnsdesc["opf"]		= 'Offensive personal fouls';
	$tcolumnsdesc["assists"]	= 'Assists';
	$tcolumnsdesc["steals"]		= 'Steals';
	$tcolumnsdesc["turnovers"]	= 'Turnovers';
	$tcolumnsdesc["playerid"]	= 'Player ID';

//below are two letter acronyms presenting Basketsim skills, if you will translate them, do it according to how you've translated skill names above

	$tcolumnsshort["ballhandling"]	= 'BH';
	$tcolumnsshort["quickness"]	= 'QK';
	$tcolumnsshort["passing"]	= 'PS';
	$tcolumnsshort["dribbling"]	= 'DB';
	$tcolumnsshort["rebounding"]	= 'RB';
	$tcolumnsshort["positioning"]	= 'PO';
	$tcolumnsshort["shooting"]	= 'SH';
	$tcolumnsshort["freethrows"]	= 'FR';
	$tcolumnsshort["defense"]	= 'DF';
	$tcolumnsshort["workrate"]	= 'WR';
	$tcolumnsshort["experience"]	= 'XP';
	$tcolumnsshort["characterr"]	= 'CH';

/*
below use the same expressions as they are used in your local Basketsim translation
(if you think these translation should be improved, you can use improved version here, but contact me so I can update your translation file!)
*/
	$skills[0]	= 'none';
	$skills[1]	= 'pathetic';
	$skills[2]	= 'terrible';
	$skills[3]	= 'poor';
	$skills[4]	= 'below average';
	$skills[5]	= 'average';
	$skills[6]	= 'above average';
	$skills[7]	= 'good';
	$skills[8]	= 'very good';
	$skills[9]	= 'great';
	$skills[10]	= 'extremely great';
	$skills[11]	= 'fantastic';
	$skills[12]	= 'amazing';
	$skills[13]	= 'extra-ordinary';
	$skills[14]	= 'magical';
	$skills[15]	= 'perfect';

	$character[0]	= 'stable';
	$character[1]	= 'entertaining';
	$character[2]	= 'calm';
	$character[3]	= 'aggressive';
	$character[4]	= 'controversial';
	$character[5]	= 'selfish';

	$tiredness[0]	= 'energetic';
	$tiredness[1]	= 'fresh';
	$tiredness[2]	= 'tired';
	$tiredness[3]	= 'very tired';
	$tiredness[4]	= 'extremely tired';
	$tiredness[5]	= 'drained';
	$tiredness[6]	= 'exhausted';

/*
in some of the expressions below you will notice links, just translate the text and leave links exactly as they are
in some of the expressions below you will notice markers like #COL# or <br/> - don't translate or change them, always translate text only!
*/
	$labels[1]	= 'Welcome!';
	$labels[2]	= 'What is Basketsim Assistant Manager?<br/>A FREE tool designed to help you with your team administration!';
	$labels[3]	= 'How can you participate?';
	$labels[4]	= "Nothing easier. You just need to be registered on <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a>.<br/>Once you have a team there, you can <a href=\"index.php?tab=register&mainpage=register\"><b>register for BAM</b></a> and use it!";
	$labels[5]	= "This application uses information from the online game service <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>This use has been approved by the developers and copyright owners of <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
	$labels[6]	= 'Register team';
	$labels[7]	= 'Specify the password to be used on this website:';
	$labels[8]	= 'Password';
	$labels[9]	= ' * This password has to be different from the one used on the Basketsim.com site';
	$labels[10]	= 'Email address';
	$labels[11]	= 'Verifying team data';
	$labels[12]	= "This operation is necessary in order to prevent anyone else from using your team data. This operation is approved by Basketsim and your login data isn't stored on BAM!";
	$labels[13]	= 'Basketsim User';
	$labels[14]	= 'CBPP Code';
	$labels[15]	= 'Warning! CBPP code is not the same as your usual password. CBPP code can be set and changed on Basketsim in Profile section.';
	$labels[16]	= 'Fill in all the required fields.';
	$labels[17]	= 'The password has to consist of at least 5 characters';
	$labels[18]	= 'Error in communicating with the Basketsim server.';
	$labels[19]	= 'Error in authenticating on the Basketsim server. Please check the correctness of your submitted data.';
	$labels[20]	= 'There was an error on parsing the downloaded data. Please, contact the administrator of this site.';
	$labels[21]	= 'Your team is already registered.';
	$labels[22]	= 'You did not set your CBPP Code. To do that, please login to Basketsim and go to Profile section.';
	$labels[23]	= 'Error';
	$labels[24]	= 'Username';
	$labels[25]	= 'Password';
	$labels[26]	= 'Lost password';
	$labels[27]	= 'Team ID';
	$labels[28]	= 'Team name';
	$labels[29]	= 'Team short name';
	$labels[30]	= 'Country';
	$labels[31]	= 'League name';
	$labels[32]	= 'You did not set any column as being visible. Please, visit the Settings section to make a column visible.';
	$labels[33]	= 'Column';
	$labels[34]	= 'Visible';
	$labels[35]	= 'Width';
	$labels[36]	= 'Save changes';
	$labels[37]	= 'At least one of the columns should be visible';
	$labels[38]	= 'The selected changes were saved';
	$labels[39]	= 'Only numeric values are accepted for columns width';
	$labels[40]	= 'You have to specify the width for a visible column';
	$labels[41]	= 'The 0 value is not allowed for a column width';
	$labels[42]	= 'Messages';
	$labels[43]	= 'Starting 5';
	$labels[44]	= 'Priority';
	$labels[45]	= 'Reserves';
	$labels[46]	= 'Compute my best team!';
	$labels[47]	= 'Double click into a table row to move a player from one table to another';
	$labels[48]	= 'In order to update your team data we need the following informations';
	$labels[49]	= "You can see your weights effects right <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><b>here</b></a>";
	$labels[50]	= "Your team is already registered. Click <a href='./index.php?tab=team&mainpage=teamplayers'><b>here</b></a> to see details.";
	$labels[51]	= "In case you do not have an account yet, you can register <a href=\"index.php?tab=register&mainpage=register\"><b>here</b></a>!";
	$labels[52]	=  "An error has been encountered at the players XML parsing process. <BR>Please, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>contact</b></a> the site administrator immediately.";
	$labels[53]	= 'Coach';
	$labels[54]     = 'Click to sort by #COL#';
	$labels[55]	= 'Your login informations will be sent at this email address';
	$labels[56]     = 'I would like to use the defaults for : #POSITION#';
	$labels[57]     = "Click here if you want to restore the BAM default weights for all the positions";
	$labels[58]     = 'Skill';
	$labels[59]     = 'Weight';
	$labels[60]     = 'Is active';
	$labels[61]	= "Don't forget to check the <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><b>news</b></a> section to stay in touch with the latest news.";
	$labels[62]	= 'Language';
	$labels[63]	= 'Display skill levels as';
	$labels[64]	= 'Text';
	$labels[65]	= 'Numerical values';
	$labels[66]	= 'Error saving your general settings';
	$labels[67]	=  "An error has been encountered at the matches XML parsing process. <BR>Please, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>contact</b></a> the site administrator immediately.";
	$labels[68]	= 'Match date';
	$labels[69]	= 'Match type';
	$labels[70]	= 'Teams';
	$labels[71]	= 'Result';
	$labels[72]	= 'Status';
	$labels[73]	= "No matches were found played by your team. You can download your matches list right <a href='index.php?tab=online&mainpage=onlteamdata'><b>here</b></a>";
	$labels[74]	= 'Click here for match details';
	$labels[75]	= "* Note - This operation will also download information on your matches from last and next 3 weeks.<br><b>If you want to download your matches archive click <a href='index.php?tab=online&mainpage=onlteammatches'>here</a></b>";
	$labels[76]	= 'Download matches for the last'; //referring to amount of time, for example "the last 6 months"
	$labels[77]	= 'Rating';
	$labels[78]	= 'Strategies';
	$labels[79]     = 'Tickets sold';
	$labels[80]     = 'Court side';
	$labels[81]     = 'Court end';
	$labels[82]     = 'Balcony';
	$labels[83]     = 'VIP section';
	$labels[84]     = 'Total';
	$labels[85]     = 'Quarter';
	$labels[86]     = 'Back';
	$labels[87]     = 'Score';
	$labels[88]     = 'Rebounds';
	$labels[89]     = 'Assists';
	$labels[90]     = 'Fouls';
	$labels[91]     = 'Steals';
	$labels[92]     = 'Turnovers';
	$labels[93]     = 'Blocks';
	$labels[94]     = 'Player name';
	$labels[95]     = 'Your team seems not be registered. Please, use the register page.';
	$labels[96]	= 'You or somebody else have requested a password which you use for login to www.bamanager.net.';
	$labels[97]     = 'bamanager.net password recovery';
	$labels[98]	= 'Password has been sent';
	$labels[99]	= 'Error sending the password. Try again please.';
	$labels[100]    = 'Downloading your team data, please wait ...';
	$labels[101]    = 'Send my BAM password';
	$labels[102]    = "Click here to see player's details";
	$labels[103]    = '#age# years old from #country#. #height# cm, #weight# kg.';
	$labels[104]    = 'This player is #caracter#. He earns #wage# &euro; / week.';
	$labels[105]    = 'Training evolution';
	$labels[106]    = 'Players list';
	$labels[107]    = 'Previous';
	$labels[108]    = 'Next';
	$labels[109]    = 'General';
	$labels[110]    = 'Skills';
	$labels[111]    = 'Sorry, but I did not find any training data. Perhaps you did not download your latest data. You can download your latest data by visiting Download -> Team data section.';
	$labels[112]    = 'Training';
	$labels[113]    = "This player have no training recorded yet in BAM database.";
	$labels[114]    = 'Training date';
	$labels[115]    = 'Training type';
	$labels[116]    = 'Position';
	$labels[117]    = 'Stars';
	$labels[118]    = "This player don't have any matches recorded for your team yet.";
	$labels[119]    = 'Guards';
	$labels[120]    = 'Big men';
	$labels[121]    = 'Intensity';
	$labels[122]    = 'no information';
	$labels[123]    = 'Team details';
	$labels[124]    = 'Training informations';
	$labels[125]    = 'Thank you for using BAM, #USERNAME#.';
	$labels[126]    = 'STATISTICS';
	$labels[127]    = 'Active users';
	$labels[128]    = 'Tracked players';
	$labels[129]    = 'Downloaded matches';
	$labels[130]    = 'Online users';
	$labels[131]    = 'It is FREE';
	$labels[132]    = 'No messages were found';
	$labels[133]    = 'To';
	$labels[134]    = 'Subject';
	$labels[135]    = 'Message';
	$labels[136]    = 'Send';
	$labels[137]    = 'Fill in the receipient';
	$labels[138]    = 'Fill in the subject';
	$labels[139]    = 'Fill in the body text of the message';
	$labels[140]    = "The user doesn't exist";
	$labels[141]    = 'From';
	$labels[142]    = 'Date';
	$labels[143]    = 'Read message';
	$labels[144]    = 'Reply';
	$labels[145]    = 'Preferences';
	$labels[146]    = 'Change password';
	$labels[147]    = 'Old password';
	$labels[148]    = 'New password';
	$labels[149]    = 'Confirm new password';
	$labels[150]    = 'Change my password';
	$labels[151]    = 'The specified old password is not your current password';
	$labels[152]    = 'The new password is different then the Confirm new password';
	$labels[153]    = 'The new password has to consist of at least 5 characters';
	$labels[154]    = 'Your new password has been saved';
	$labels[155]    = 'Reset all positions';
	$labels[156]    = '#NUMBER# possible combinations were found!';
	$labels[157]    = 'Seller';
	$labels[158]    = 'Buyer';
	$labels[159]    = 'Price';
	$labels[160]    = 'No transfers has been found';
	$labels[161]    = 'retired player';
	$labels[162]    = 'Total purchases:';
	$labels[163]    = 'Average (bought):';
	$labels[164]    = 'Total sales:';
	$labels[165]    = 'Average (sold):';
	$labels[166]    = 'Difference:';
	$labels[167]    = 'Average (bought+sold):';
	$labels[168]    = 'Number of transfers:';
	$labels[169]    = 'Click here for training history';
	$labels[170]    = 'Notes';
	$labels[171]    = 'Save note';
	$labels[172]    = 'Sign up for free!';
	$labels[173]    = 'Show this player to your national coach !';
	$labels[174]    = 'Hide this player from your national coach !';
	$labels[175]    = 'Download national team data';
	$labels[176]    = 'Sorry, but you are not a national coach to be allowed to download this data';
	$labels[177]    = 'Skill progress';
	$labels[178]    = 'Logins today';
?>