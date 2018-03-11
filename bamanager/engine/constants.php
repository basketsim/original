<?
	$BAMVER	= " 1.1";

	$training_columns[1]	= 'ballhandling';
	$training_columns[2]	= 'quickness';
	$training_columns[3]	= 'passing';
	$training_columns[4]	= 'dribbling';
	$training_columns[5]	= 'rebounding';
	$training_columns[6]	= 'positioning';
	$training_columns[7]	= 'shooting';
	$training_columns[8]	= 'freethrows';
	$training_columns[9]	= 'defense';
	$training_columns[50]= 'height';
	$training_columns[51]= 'experience';
	$training_columns[52]= 'age';
	$training_columns[53]= 'wage';
	$training_columns[54]= 'tiredness';

	$training_columns_reversed['ballhandling']	= 1;
	$training_columns_reversed['quickness']		= 2;
	$training_columns_reversed['passing']		= 3;
	$training_columns_reversed['dribbling']		= 4;
	$training_columns_reversed['rebounding']	       = 5;
	$training_columns_reversed['positioning']	       = 6;
	$training_columns_reversed['shooting']		= 7;
	$training_columns_reversed['freethrows']	       = 8;
	$training_columns_reversed['defense']		= 9;
	$training_columns_reversed['height']		= 50;
	$training_columns_reversed['experience']	       = 51;
	$training_columns_reversed['age']			= 52;
	$training_columns_reversed['wage']			= 53;
	$training_columns_reversed['tiredness']		= 54;

	$columns["name"]			= 1;
	$columns["onsale"]			= 1;
	$columns["injury"]			= 1;
	$columns["country"]			= 1;
	$columns["age"]			= 1;
	$columns["wage"]			= 1;
	$columns["rating_last"]		= 1;
	$columns["rating_best"]		= 1;
	$columns["rating_average"]	       = 1;
	$columns["ballhandling"]	       = 1;
	$columns["quickness"]		= 1;
	$columns["passing"]			= 1;
	$columns["dribbling"]		= 1;
	$columns["rebounding"]		= 1;
	$columns["positioning"]		= 1;
	$columns["shooting"]		       = 1;
	$columns["freethrows"]		= 1;
	$columns["defense"]			= 1;
	$columns["workrate"]		       = 1;
	$columns["experience"]		= 1;
	$columns["tiredness"]		= 1;
	//$columns["coach"]			= 1;
	$columns["characterr"]		= 1;
	$columns["height"]			= 1;
	$columns["weight"]			= 1;
	$columns["2p"]			= 1;
	$columns["3p"]			= 1;
	$columns["ft"]			= 1;
	$columns["reb"]			= 1;
	$columns["pf"]			= 1;
	$columns["opf"]			= 1;
	$columns["assists"]			= 1;
	$columns["steals"]			= 1;
	$columns["turnovers"]		= 1;
	$columns["sf_pos"]			= 1;
	$columns["pf_pos"]			= 1;
	$columns["c_pos"]			= 1;
	$columns["pg_pos"]			= 1;
	$columns["sg_pos"]			= 1;
	$columns["playerid"]		       = 1;

	//each column width
	$columnsw["name"]			= 165;
	$columnsw["onsale"]			= 18;
	$columnsw["injury"]			= 22;
	$columnsw["country"]		       = 20;
	$columnsw["age"]			= 30;
	$columnsw["wage"]			= 60;
	$columnsw["rating_last"]	       = 102;
	$columnsw["rating_best"]	       = 102;
	$columnsw["rating_average"] 	= 111;
	$columnsw["ballhandling"]	       = 135;
	$columnsw["quickness"]		= 135;
	$columnsw["passing"]		       = 135;
	$columnsw["dribbling"]		= 135;
	$columnsw["rebounding"]		= 135;
	$columnsw["positioning"]	       = 135;
	$columnsw["shooting"]		= 135;
	$columnsw["freethrows"]		= 135;
	$columnsw["defense"]		       = 135;
	$columnsw["workrate"]		= 135;
	$columnsw["experience"]		= 135;
	$columnsw["tiredness"]		= 80;
	$columnsw["coach"]			= 18;
	$columnsw["characterr"]		= 80;
	$columnsw["height"]			= 58;
	$columnsw["weight"]			= 66;
	$columnsw["2p"]			= 40;
	$columnsw["3p"]			= 40;
	$columnsw["ft"]			= 40;
	$columnsw["reb"]			= 40;
	$columnsw["pf"]			= 40;
	$columnsw["opf"]			= 40;
	$columnsw["assists"]		       = 40;
	$columnsw["steals"]			= 40;
	$columnsw["turnovers"]		= 40;
	$columnsw["sf_pos"]			= 40;
	$columnsw["pf_pos"]			= 40;
	$columnsw["c_pos"]			= 40;
	$columnsw["pg_pos"]			= 40;
	$columnsw["sg_pos"]			= 40;
	$columnsw["playerid"]		= 80;

	//which columns are visible and which not
	$columnsv["name"]			= 1;
	$columnsv["onsale"]			= 1;
	$columnsv["injury"]			= 1;
	$columnsv["country"]		       = 1;
	$columnsv["age"]			= 0;
	$columnsv["wage"]			= 0;
	$columnsv["rating_last"]	       = 0;
	$columnsv["rating_best"]	       = 0;
	$columnsv["rating_average"]	       = 1;
	$columnsv["ballhandling"]	       = 0;
	$columnsv["quickness"]		= 0;
	$columnsv["passing"]		       = 0;
	$columnsv["dribbling"]		= 0;
	$columnsv["rebounding"]		= 0;
	$columnsv["positioning"]	       = 0;
	$columnsv["shooting"]		= 0;
	$columnsv["freethrows"]		= 0;
	$columnsv["defense"]		       = 0;
	$columnsv["workrate"]		= 0;
	$columnsv["experience"]		= 0;
	$columnsv["tiredness"]		= 0;
	$columnsv["coach"]			= 0;
	$columnsv["characterr"]		= 0;
	$columnsv["height"]			= 1;
	$columnsv["weight"]			= 1;
	$columnsv["2p"]			= 1;
	$columnsv["3p"]			= 1;
	$columnsv["ft"]			= 1;
	$columnsv["reb"]			= 1;
	$columnsv["pf"]			= 1;
	$columnsv["opf"]			= 1;
	$columnsv["assists"]		       = 1;
	$columnsv["steals"]			= 1;
	$columnsv["turnovers"]		= 1;
	$columnsv["sf_pos"]			= 1;
	$columnsv["pf_pos"]			= 1;
	$columnsv["c_pos"]			= 1;
	$columnsv["pg_pos"]			= 1;
	$columnsv["sg_pos"]			= 1;
	$columnsv["playerid"]		= 0;

	$isimage["onsale"]			= ".gif";
	$isimage["injury"]			= ".gif";
	$isimage["country"]			= ".png";
	$isimage["coach"]			= ".gif";
	$isimage["rating_last"]		= '.gif';
	$isimage["rating_best"]		= '.gif';
	$isimage["rating_average"]	       = '.gif';

	$align["name"]			= 'left';
	$align["onsale"]			= 'middle';
	$align["injury"]			= 'middle';
	$align["country"]			= 'middle';
	$align["age"]				= 'right';
	$align["wage"]			= 'right';
	$align["rating_last"]		= 'left';
	$align["rating_best"]		= 'left';
	$align["rating_average"]	       = 'left';
	$align["ballhandling"]		= 'left';
	$align["quickness"]			= 'left';
	$align["passing"]			= 'left';
	$align["dribbling"]			= 'left';
	$align["rebounding"]		       = 'left';
	$align["positioning"]		= 'left';
	$align["shooting"]			= 'left';
	$align["freethrows"]	       	= 'left';
	$align["defense"]			= 'left';
	$align["workrate"]			= 'left';
	$align["experience"]		       = 'left';
	$align["tiredness"]			= 'right';
	$align["coach"]			= 'middle';
	$align["characterr"]		       = 'left';
	$align["height"]			= 'right';
	$align["weight"]			= 'right';
	$align["2p"]				= 'right';
	$align["3p"]				= 'right';
	$align["ft"]				= 'right';
	$align["reb"]				= 'right';
	$align["pf"]				= 'right';
	$align["opf"]				= 'right';
	$align["assists"]			= 'right';
	$align["steals"]			= 'right';
	$align["turnovers"]			= 'right';
	$align["sf_pos"]			= 'right';
	$align["pf_pos"]			= 'right';
	$align["c_pos"]			= 'right';
	$align["pg_pos"]			= 'right';
	$align["sg_pos"]			= 'right';
	$align["playerid"]			= 'right';

	$weights_skills["ballhandling"]	= 1;
	$weights_skills["passing"]		= 1;
	$weights_skills["rebounding"]	= 1;
	$weights_skills["shooting"]		= 1;
	$weights_skills["defense"]		= 1;
	$weights_skills["quickness"]	= 1;
	$weights_skills["dribbling"]	= 1;
	$weights_skills["positioning"]	= 1;
	$weights_skills["freethrows"]	= 1;
	$weights_skills["experience"]	= 1;

	$weights["2p"]["shooting"]			= '$_skill';
	$weights["2p"]["quickness"]			= '$_skill';
	$weights["2p"]["dribbling"]			= '$_skill';
	$weights["2p"]["positioning"]		= '$_skill';

	$weights["3p"]["shooting"]			= '$_skill';
	$weights["3p"]["positioning"]		= '$_skill';
	$weights["3p"]["quickness"]			= '$_skill';
	$weights["3p"]["freethrows"]		= '$_skill';

	$weights["ft"]["freethrows"]		= '$_skill';

	$weights["reb"]["rebounding"]		= '$_skill';
	$weights["reb"]["positioning"]		= '$_skill';
	$weights["reb"]["quickness"]		= '$_skill';

	$weights["pf"]["defense"]			= '$_skill';
	$weights["pf"]["positioning"]		= '$_skill';
	$weights["pf"]["quickness"]			= '$_skill';

	$weights["opf"]["dribbling"]		= '$_skill';
	$weights["opf"]["positioning"]		= '$_skill';

	$weights["assists"]["passing"]		= '$_skill';

	$weights["steals"]["defense"]		= '$_skill';
	$weights["steals"]["quickness"]		= '$_skill';

	$weights["turnovers"]["dribbling"]		= '$_skill';
	$weights["turnovers"]["passing"]		= '$_skill';
	$weights["turnovers"]["ballhandling"]	= '$_skill';

	$weights["c_pos"]["positioning"]	       = '$_skill';
	$weights["c_pos"]["rebounding"]		= '$_skill';
	$weights["c_pos"]["quickness"]		= '$_skill';
	$weights["c_pos"]["defense"]		= '$_skill';

	$weights["pf_pos"]["positioning"]	       = '$_skill';
	$weights["pf_pos"]["rebounding"]	       = '$_skill';
	$weights["pf_pos"]["passing"]		= '$_skill';
	$weights["pf_pos"]["defense"]		= '$_skill';

	$weights["sf_pos"]["shooting"]		= '$_skill';
	$weights["sf_pos"]["rebounding"]	       = '$_skill';
	$weights["sf_pos"]["passing"]		= '$_skill';
	$weights["sf_pos"]["defense"]		= '$_skill';

	$weights["sg_pos"]["shooting"]		= '$_skill';
	$weights["sg_pos"]["dribbling"]		= '$_skill';
	$weights["sg_pos"]["quickness"]		= '$_skill';
	$weights["sg_pos"]["defense"]		= '$_skill';

	$weights["pg_pos"]["ballhandling"]	       = '$_skill';
	$weights["pg_pos"]["quickness"]		= '$_skill';
	$weights["pg_pos"]["passing"]		= '$_skill';
	$weights["pg_pos"]["defense"]		= '$_skill';

	//GLOBAL CONSTANTS
	define("CALLED_FROM_APPLICATION",	'bamanager');
	define("DEFAULT_LANGUAGE",			'english');
	define("DEFAULT_LEVEL",				0);
	define("SESSION_EXPIRE_IN_MIN",		30);
	define("REGISTERED_USER_LEVEL",		1);
	define("NATIONAL_COACH_USER_LEVEL", 2);
	define("GAME_MASTER_USER_LEVEL", 	3);
	define("POWER_COLOR",				"#F76118");
	define("HEADER_COLOR",				"#FFEBE1");
	define("WIN_COLOR",					"#026E32");
	define("LOOSE_COLOR",				"#FF0000");
	define("DEUCE_COLOR",				"#C8C8C8");
	define("UNTRAINED_COPLOR",			       "#C0DCC0");

	// Match archive constant
	define("ONEMONTH",								0);
	define("TWOMONTHS",								1);
	define("THREEMONTHS",							2);
	define("SIXMONTHS",								3);
	define("NINEMONTHS",							       4);
	define("ONEYEAR",								5);

	// ====== USERS STATUS =========================================================
	define("USER_STATUS_AVAILABLE",						0);
	define("USER_STATUS_DELETED",						1);

	// ====== MESSAGES STATUS ======================================================
	define("MSG_READ",                                          0);
	define("MSG_NOT_READ",                                      1);

	define("LOGIN",					"login");
	define("REGISTER",					"register");
	define("SCREENSHOOTS",				"screenshoots");
	define("BASKETSIM",					"basketsim");
	define("GM",						"gm");
	define("GMCOUNTRIES",				"gmcountries");
	define("BAMANAGER",					"bam");
	define("BAMABOUT",					"about");
	define("BAMCONTACT",				       "contact");
	define("BAMNEWS",					"news");
	define("LOGOUT",					"logout");
	define("TEAM",					"team");
	define("NTEAM",					"nteam");
	define("NTEAMPLAYERS",				"nteamplayers");
	define("NTEAMMATCHES",				"nteammatches");
	define("NTEAMDOWNLOAD",				"nteamdownload");
	define("NTEAMSUGGESTIONS",			"nteamsuggestions");
	define("SETTINGS",					"settings");
	define("SETGENERAL",				"general");
	define("SETCOLUMNS",				"columns");
	define("SETWEIGHTS",				"weights");
	define("TEAMDETAILS",				"teamdetails");
	define("TEAMPLAYERS",				"teamplayers");
	define("TEAMMATCHES",				"teammatches");
	define("TEAMTRANSFERHISTORY",		"teamtransferhistory");
	define("TEAMTRAININGHISTORY",		"teamtraininghistory");
	define("TOOLS",						"tools");
	define("TOOLS_B5",					"best5");
	define("TOOLS_BPOS",				       "bestpos");
	define("MSG",						"msg");
	define("MSGINBOX",					"msginbox");
	define("MSGOUTBOX",					"msgoutbox");
	define("MSGWRITE",					"msgwrite");
	define("ONLINE",					"online");
	define("ONLINETEAMDATA",			"onlinetdata");
	define("ONLINETEAMMATCHES",			"onlinetmatches");

	$arch_compute[ONEMONTH]			= 30;
	$arch_compute[TWOMONTHS]			= 60;
	$arch_compute[THREEMONTHS]			= 90;
	$arch_compute[SIXMONTHS]			= 180;
	$arch_compute[NINEMONTHS]			= 270;
	$arch_compute[ONEYEAR]			= 365;

	$languages['Czech']	= '&#268;e&#353;tina';
	$languages['danish']	= 'Dansk';
	$languages['english']   = 'English';
	$languages['spanish']   = 'Espa&ntilde;ol';
	$languages['french']	= 'Fran&ccedil;ais';
	$languages['hebrew']	= 'עִבְרִית';
        $languages['italian']   = 'Italiano';
	$languages['polish']	= 'Polski';
	$languages['portuguese']= 'Portugu&ecirc;s';
	$languages['portugese'] = 'Portugu&ecirc;s brasileiro';
	$languages['romanian']  = 'Rom&acirc;n&#259;';
	$languages['serbian']   = 'Srpski';
	$languages['turkish']   = 'T&uuml;rk&ccedil;e';
?>