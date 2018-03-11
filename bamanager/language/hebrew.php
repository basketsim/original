<?
       $match_status['UPCOMING']   = 'בקרוב'; //what should be translated is 'Upcoming' (same goes for all cases below)
       $match_status['ONGOING']    = 'בתהליכים';
       $match_status['FINISHED']   = 'הסתיים'; //expression for completed match

       $training_intensity[0]	= 'רגוע(15ש/שבוע)';
       $training_intensity[1]	= 'רגיל(25ש/שבוע)';
       $training_intensity[2]	= 'לחוץ(30ש/שבוע)';
       $training_intensity[3]	= 'עצום(40ש/שבוע)';

	$training_types[1]	= 'שליטה בכדור';
	$training_types[2]	= 'מהירות';
	$training_types[3]	= 'מסירה';
	$training_types[4]	= 'כדרור';
	$training_types[5]	= 'ריבאונד';
	$training_types[6]	= 'מיקום';
	$training_types[7]	= 'קליעה';
	$training_types[8]	= "זר'עונשין";
	$training_types[9]	= 'הגנה';

	$match_label["W"]	= 'נצ'; //win
	$match_label["L"]	= 'הפ'; //lose
	$match_label["D"]	= 'ת'; //draw

	$nat_match_types[1]	= 'העפלה';
	$nat_match_types[2]	= 'ידידות';
	$nat_match_types[3]	= 'גביע העולם';
	$nat_match_types[4]	= 'גביע העולם';
	$nat_match_types[11]	= 'העפלה';
	$nat_match_types[12]	= 'ידידות';
	$nat_match_types[13]	= 'גביע העולם';
	$nat_match_types[14]	= 'גביע העולם';

	$match_types[0]	        = 'לא ידוע';
	$match_types[1]	        = 'ליגה';
	$match_types[2]	        = 'ידידות';
	$match_types[3]	        = 'גביע';
	$match_types[4]	        = 'פלייאוף';
	$match_types[5]	        = 'גביע ההגינות'; //you can keep original name
	$match_types[6]	        = 'בינלאומי';
	$match_types[7]	        = 'בינלאומי';
	$match_types[18]        = 'נוער';
	$match_types[19]        = 'גביע העולם לנוער'; //try not to use too long translation
	
	$def_strategy[0]	= 'נורמלי';
	$def_strategy[1]	= 'לחזור במהירות להגנה';
	$def_strategy[2]	= 'ניסיון חסימת כל זריקה';
	$def_strategy[3]	= 'חסימה וכדורים חוזרים';
	$def_strategy[4]	= 'שמירה על איזור הצבע';
	$def_strategy[5]	= 'עייף את היריב';
	$def_strategy[6]	= 'half court trap';

	$off_strategy[0]	= 'נורמלי';
	$off_strategy[1]	= 'קרא את ההגנה';
	$off_strategy[2]	= 'מתפרצות מהירות';
	$off_strategy[3]	= 'קליעות מרחוק';
	$off_strategy[4]	= 'לנסות לחדור';
	$off_strategy[5]	= 'מאבק על כדורים חוזרים';
	$off_strategy[6]	= 'inside shooting';

	$quarters[1]	        = 'הרבע הראשון הסתיים. התוצאה היא:';
	$quarters[2]	        = 'הרבע השני הסתיים. התוצאה היא:';
	$quarters[3]	        = 'הרבע השלישי הסתיים. התוצאה היא';
	$quarters[4]	        = 'המשחק נגמר. תוצאת הסיום היא:';

	$arch_match[ONEMONTH]		= 'חודש';
	$arch_match[TWOMONTHS]		= 'חודשיים';
	$arch_match[THREEMONTHS]	= 'שלושה חודשים';
	$arch_match[SIXMONTHS]		= 'שישה חודשים';
	$arch_match[NINEMONTHS]		= 'תשעה חודשים';
	$arch_match[ONEYEAR]		= 'שנה';

	$tlabels[BAMANAGER]		= "BAManager {$BAMVER}"; //don't translate this, just leave it as it is
	$tlabels[TEAM]			= $_SESSION["teamname"]; //don't translate this, just leave it as it is
	$tlabels[NTEAM]			= $_SESSION['natteam']; //don't translate this, just leave it as it is
	$tlabels[BASKETSIM]		= "Basketsim"; //don't translate this

	$tlabels[SCREENSHOOTS]		= 'תצלומי מסך';
	$tlabels[LOGIN]			= 'התחבר';
	$tlabels[REGISTER]		                = 'הרשם';
	$tlabels[BAMABOUT]		= 'אודות';
	$tlabels[BAMCONTACT]		= 'צור קשר';
	$tlabels[BAMNEWS]		= 'חדשות';
	$tlabels[LOGOUT]		                = 'התנתק';
	$tlabels[TEAMPLAYERS]		= 'שחקנים';
	$tlabels[TEAMMATCHES]		= 'משחקים';
	$tlabels[TEAMTRANSFERHISTORY]	= 'היסטוריית העברות';
	$tlabels[TEAMTRAININGHISTORY]	= 'היסטוריית אימונים';
	$tlabels[NTEAMPLAYERS]		= 'שחקנים';
	$tlabels[NTEAMMATCHES]		= 'משחקים';
	$tlabels[NTEAMDOWNLOAD]	= 'הורד';
	//$tlabels[NTEAMSUGGESTIONS]	= 'הצעות';
	$tlabels[SETTINGS]		                = 'הגדרות';
	$tlabels[SETGENERAL]		= 'כללי';
	$tlabels[SETCOLUMNS]		= 'עמודות';
	$tlabels[SETWEIGHTS]		= 'משקלים';
	$tlabels[TEAMDETAILS]		= 'דשבורד';
	$tlabels[TOOLS]			= 'כלים';
	$tlabels[TOOLS_B5]		= 'החמישיה הטובה ביותר';
	$tlabels[TOOLS_BPOS]		= 'העמדה הטובה ביותר';
	$tlabels[ONLINE]		                = 'הורד';
	$tlabels[ONLINETEAMDATA]	                = 'נתוני הקבוצה';
	$tlabels[ONLINETEAMMATCHES]	= 'משחקים';
	$tlabels[MSG]			= 'תיבת דואר';
	$tlabels[MSGINBOX]		= 'דואר נכנס';
	$tlabels[MSGOUTBOX]		= 'הודעות שנשלחו';
	$tlabels[MSGWRITE]		= 'כתוב הודעה';
	$tlabels[GM]			= 'מנהל';
	$tlabels[GMCOUNTRIES]		= 'ארצות';

	$tcolumns["name"]		= 'שם';
	$tcolumns["onsale"]		= 'למכירה';
	$tcolumns["injury"]		= 'פציעה';
	$tcolumns["country"]	= 'ארץ';
	$tcolumns["age"]		= 'גיל';
	$tcolumns["wage"]		= 'שכר';
	$tcolumns["rating_last"]	= 'רייטינג-אחרון';
	$tcolumns["rating_best"]	= 'רייטינג-הטוב ביותר';
	$tcolumns["rating_average"]	= 'רייטינג-ממוצע'; //make sure not to use too long expression!
	$tcolumns["ballhandling"]	= 'שליטה בכדור';
	$tcolumns["quickness"]	= 'מהירות';
	$tcolumns["passing"]	= 'מסירה';
	$tcolumns["dribbling"]	= 'כדרור';
	$tcolumns["rebounding"]	= 'ריבאונד';
	$tcolumns["positioning"]	= 'מיקום';
	$tcolumns["shooting"]	= 'קליעה';
	$tcolumns["freethrows"]	= "זר'עונשין";
	$tcolumns["defense"]	= 'הגנה';
	$tcolumns["workrate"]	= "ק'עבודה";
	$tcolumns["experience"]	= 'ניסיון';
	$tcolumns["tiredness"]	= 'עייפות';
	$tcolumns["coach"]		= 'מאמן';
	$tcolumns["characterr"]	= 'אישיות';
	$tcolumns["height"]		= 'גובה';
	$tcolumns["weight"]		= 'משקל';
	$tcolumns["2p"]		= '2נק';
	$tcolumns["3p"]		= '3נק';
	$tcolumns["ft"]		= 'זע';
	$tcolumns["reb"]		= 'ריב';
	$tcolumns["pf"]		= 'עב';
	$tcolumns["opf"]		= 'עה';
	$tcolumns["assists"]		= 'אס';
	$tcolumns["steals"]		= 'חט';
	$tcolumns["turnovers"]	= 'אכ';
	$tcolumns["sf_pos"]		= 'ספ';
	$tcolumns["pf_pos"]		= 'פפ';
	$tcolumns["c_pos"]		= 'ס';
	$tcolumns["pg_pos"]	= 'פג';
	$tcolumns["sg_pos"]	= 'שג';
	$tcolumns["playerid"]	= 'מספר שחקן';

//for some of the expressions below type again the same translations as above

	$tcolumnsdesc["name"]	= 'שם';
	$tcolumnsdesc["onsale"]	= 'למכירה';
	$tcolumnsdesc["injury"]	= 'פציעה';
	$tcolumnsdesc["country"]	= 'ארץ';
	$tcolumnsdesc["age"]	= 'גיל';
	$tcolumnsdesc["wage"]	= 'שכר';
	$tcolumnsdesc["rating_last"]	= 'רייטינג-אחרון';
	$tcolumnsdesc["rating_best"]	= 'רייטינג-הטוב ביותר';
	$tcolumnsdesc["rating_average"]= 'רייטינג-ממוצע';
	$tcolumnsdesc["ballhandling"]	= 'שליטה בכדור';
	$tcolumnsdesc["quickness"]	= 'מהירות';
	$tcolumnsdesc["passing"]	= 'מסירה';
	$tcolumnsdesc["dribbling"]	= 'כדרור';
	$tcolumnsdesc["rebounding"]	= 'ריבאונד';
	$tcolumnsdesc["positioning"]	= 'מיקום';
	$tcolumnsdesc["shooting"]	= 'קליעה';
	$tcolumnsdesc["freethrows"]	= "זר'עונשין"; //make sure not to use too long expression!
	$tcolumnsdesc["defense"]	= 'הגנה';
	$tcolumnsdesc["workrate"]	="ק'עבודה";
	$tcolumnsdesc["experience"]	= 'ניסיון';
	$tcolumnsdesc["tiredness"]	= 'עייפות';
	$tcolumnsdesc["coach"]	= 'מאמן';
	$tcolumnsdesc["characterr"]	= 'אישיות';
	$tcolumnsdesc["height"]	= 'גובה';
	$tcolumnsdesc["weight"]	= 'משקל';
	$tcolumnsdesc["c_pos"]	= 'סנטר';
	$tcolumnsdesc["pf_pos"]	= 'פאוור פורווארד';
	$tcolumnsdesc["sf_pos"]	= 'סמול פורווארד';
	$tcolumnsdesc["sg_pos"]	= 'שוטינג גארד';
	$tcolumnsdesc["pg_pos"]	= 'פוינט גארד';
	$tcolumnsdesc["2p"]		= '2 נקודות';
	$tcolumnsdesc["3p"]		= '3 נקודות';
	$tcolumnsdesc["ft"]		= 'זריקות עונשין';
	$tcolumnsdesc["reb"]	= 'ריבאונדים';
	$tcolumnsdesc["pf"]		= 'עבירות אישיות';
	$tcolumnsdesc["opf"]	= 'עבירות אישיות התקפיות';
	$tcolumnsdesc["assists"]	= 'אסיסטים';
	$tcolumnsdesc["steals"]	= 'חטיפות';
	$tcolumnsdesc["turnovers"]	= 'איבודי כדור';
	$tcolumnsdesc["playerid"]	= 'מספר שחקן';

//below are two letter acronyms presenting Basketsim skills, if you will translate them, do it according to how you've translated skill names above

	$tcolumnsshort["ballhandling"]	= 'שכ';
	$tcolumnsshort["quickness"]	= 'מ';
	$tcolumnsshort["passing"]	= 'מס';
	$tcolumnsshort["dribbling"]	= 'כד';
	$tcolumnsshort["rebounding"]	= 'ריב';
	$tcolumnsshort["positioning"]	= 'מיק';
	$tcolumnsshort["shooting"]	= 'ק';
	$tcolumnsshort["freethrows"]	= 'זר';
	$tcolumnsshort["defense"]	= 'הג';
	$tcolumnsshort["workrate"]	= 'קע';
	$tcolumnsshort["experience"]	= 'נ';
	$tcolumnsshort["characterr"]	= 'א';

/*

below use the same expressions as they are used in your local Basketsim translation
(if you think these translation should be improved, you can use improved version here, but contact me so I can update your translation file!)
*/
	$skills[0]	= 'לא קיים';
	$skills[1]	= 'גרוע';
	$skills[2]	= 'איום';
	$skills[3]	= 'עלוב';
	$skills[4]	= 'מתחת לממוצע';
	$skills[5]	= 'ממוצע';
	$skills[6]	= 'מעל הממוצע';
	$skills[7]	= 'טוב';
	$skills[8]	= 'טוב מאוד';
	$skills[9]	= 'מצוין';
	$skills[10]	= 'יוצא מן הכלל';
	$skills[11]	= 'פנטסטי';
	$skills[12]	= 'מדהים';
	$skills[13]	= 'בלתי יאומן';
	$skills[14]	= 'קסום';
	$skills[15]	= 'מושלם';

	$character[0]	= 'יציב';
	$character[1]	= 'מלהיב';
	$character[2]	= 'רגוע';
	$character[3]	= 'אגרסיבי';
	$character[4]	= 'שנוי במחלוקת';
	$character[5]	= 'אגואיסט';

	$tiredness[0]	= 'נמרץ';
	$tiredness[1]	= 'רענן';
	$tiredness[2]	= 'עייף';
	$tiredness[3]	= 'עייף מאוד';
	$tiredness[4]	= 'חלש';
	$tiredness[5]	= 'סחוט';
	$tiredness[6]	= 'מותש';

/*
in some of the expressions below you will notice links, just translate the text and leave links exactly as they are
in some of the expressions below you will notice markers like #COL# or <br/> - don't translate or change them, always translate text only!
*/
	$labels[1]	= 'ברוך הבא!';
	$labels[2]	= ' מה הוא Basketsim Assistant Manager?<br/>כלי חינמי שנועד לעזור לך לארגן את ניהול הקבוצה';
	$labels[3]	= 'איך אתה יכול להשתתף?';
	$labels[4]	= "פשוט מאוד. צריך להרשם ב <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a>.<br/>ומהרגע שיש לך קבוצה שם,אתה יכול, <a href=\"index.php?tab=register&mainpage=register\"><b> להרשם לBAM</b></a> ולהשתמש בו";
	$labels[5]	= "אתר זה משתמש במידע מהשרתים של משחק האונליין <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>השימוש הזה אושר על ידי המפתחים ובעלי זכויות היוצרים של המשחק<a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
	$labels[6]	= 'רשום קבוצה';
	$labels[7]	= 'ציין את הסיסמא בה תשתמש באתר זה:';
	$labels[8]	= 'סיסמא';
	$labels[9]	= ' * סיסמא זו חייבת להיות שונה מהסיסמא באתר באסקטסים';
	$labels[10]	= 'אימייל';
	$labels[11]	= 'אימות נתוני קבוצה';
	$labels[12]	='הליך זה נחוץ כדי למנוע ממישהו אחר שימוש בנתוני הקבוצה. הליך זה מאושר על ידי באסקטסים ונתוני ההתחברות שלך לא נשמרים באתר';
	$labels[13]	= 'שם משתמש בבאסקטסים';
	$labels[14]	= 'קוד CBPP';
	$labels[15]	= 'אזהרה! קוד זה הוא לא הסיסמא הרגילה שלך. אפשר לקבוע את הקוד באתר באסטקסים ולשנות אותו.';
	$labels[16]	= 'מלאו את כל השדות הנחוצים.';
	$labels[17]	= 'הסיסמא חייבת להיות באורך של לפחות 5 תווים.';
	$labels[18]	= 'בעיה בתקשורת עם שרתי באסקטסים';
	$labels[19]	= 'שגיאה באימות בשרת באסקטסים. אנא בדוק את נכונות הנתונים שנמסרו.';
	$labels[20]	= 'יש טעות בניתוח הנתונים שהורדו. אנא צור קשר עם מנהל האתר.';
	$labels[21]	= 'קבוצתך כבר רשומה.';
	$labels[22]	= 'לא קבעת את קוד הסי-בי-פי-פי שלך. כדי לעשות זאת,אנא התחבר לבאסקטסים ולך לעמוד הפרופיל שלך.';
	$labels[23]	= 'שגיאה';
	$labels[24]	= 'שם משתמש';
	$labels[25]	= 'סיסמא';
	$labels[26]	= 'שכחתי סיסמא';
	$labels[27]	= 'מספר קבוצה';
	$labels[28]	= 'שם הקבוצה';
	$labels[29]	= 'שם קבוצה מקוצר';
	$labels[30]	= 'ארץ';
	$labels[31]	= 'ליגה';
	$labels[32]	= 'לא הגדרת אף עמודה כגלויה. אנא בקר בדף ההגדרות כדי להגדיר עמודה כגלויה';
	$labels[33]	= 'עמודה';
	$labels[34]	= 'גלוי';
	$labels[35]	= 'רוחב';
	$labels[36]	= 'שמור הגדרות';
	$labels[37]	= 'לפחות אחת מהעמודות צריכה להיות גלויה';
	$labels[38]	= 'השינויים שנבחרו נשמרו';
	$labels[39]	= 'אפשר לקבוע את ערכי העמודות רק באמצעות ערכים מספריים';
	$labels[40]	= 'עליך לציין את הרוחב של העמודה הגלויה';
	$labels[41]	= 'הערך 0 אינו קביל עבור רוחב עמודה.';
	$labels[42]	= 'הודעות';
	$labels[43]	= 'חמישיה פותחת';
	$labels[44]	= 'עדיפות';
	$labels[45]	= 'מחליפים';
	$labels[46]	= 'חשב את הקבוצה הכי טובה שלי';
	$labels[47]	= 'הקלק פעמיים על שורה כדי להזיז שחקן מטבלה אחת לאחרת';
	$labels[48]	= 'כדי לעדכן את נתוני קבוצתך אנו זקוקים למידע הבא:';
	$labels[49]	= "אתה יכול לראות את השפעות המשקלים<a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><b>כאן</b></a>";
	$labels[50]	= "קבוצתך כבר רשומה. הקלק <a href='./index.php?tab=team&mainpage=teamplayers'><b>כאן</b></a>כדי לראות מידע";
	$labels[51]	= "אם אין לך עדיין חשבון אתה יכול להרשם<a href=\"index.php?tab=register&mainpage=register\"><b>כאן</b></a>!";
	$labels[52]	=  "שגיאה קרתה בתהליך ניתוח XML של שחקנים. <BR>בבקשה, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>צור קשר</b></a> עם מנהל האתר מיד.";
	$labels[53]	= 'מאמן';
	$labels[54]     = 'הקלק כדי למיין לפי #COL#';
	$labels[55]	= 'פרטי ההתחברות שלך יישלחו לכתובת האימייל הזו';
	$labels[56]     = 'אני רוצה להשתמש בברירת המחדל עבור #POSITION# ';
	$labels[57]     = "הקלק כאן אם אתה רוצה לשחזר את ברירת המחדל של המשקלים עבור כל העמדות";
	$labels[58]     = 'סקיל';
	$labels[59]     = 'משקל';
	$labels[60]     = 'פעיל';
	$labels[61]	= "אל תשכח לבדוק את ה<a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><b>חדשות האתר</b></a>כדי להיות מעודכן בחדשות האחרונות.";
	$labels[62]	= 'שפה';
	$labels[63]	= 'הצג סקילים כ';
	$labels[64]	= 'טקסט';
	$labels[65]	= 'ערכים מספריים';
	$labels[66]	= 'שגיאה בשמירת ההגדרות הכלליות שלך';
	$labels[67]	=  "קרתה שגיאה בתהליך ניתוח XML של המשחקים <BR>אנא, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>צור קשר</b></a>עם מנהל האתר מיד.";
	$labels[68]	= 'תאריך משחק';
	$labels[69]	= 'סוג משחק';
	$labels[70]	= 'קבוצות';
	$labels[71]	= 'תוצאה';
	$labels[72]	= 'מצב';
	$labels[73]	= "לא נמצאו אף משחקים ששוחקו. אתה יכול להוריד את רשימת המשחקים שלך<a href='index.php?tab=online&mainpage=onlteamdata'><b>כאן</b></a>";
	$labels[74]	= 'הקלק כאן לפרטים על המשחק';
	$labels[75]	= "הערה- תהליך זה יוריד מידע גם על המשחקים שלך מ3 השבועות הקודמים והבאים *<br><b>אם אתה רוצה להוריד את ארכיון המשחקים שלך הקלק<a href='index.php?tab=online&mainpage=onlteammatches'>כאן</a></b>";
	$labels[76]	= 'הורד משחקים של'; //referring to amount of time, for example "the last 6 months"
	$labels[77]	= 'רייטינג';
	$labels[78]	= 'אסטרטגיות';
	$labels[79]     = 'כרטיסים שנמכרו';
	$labels[80]     = 'יציע מרכזי';
	$labels[81]     = 'יציע קיצוני';
	$labels[82]     = 'יציע עליון';
	$labels[83]     = 'תאי כבוד';
	$labels[84]     = 'סך הכל';
	$labels[85]     = 'רבע';
	$labels[86]     = 'חזור';
	$labels[87]     = 'תוצאה';
	$labels[88]     = 'ריבאונדים';
	$labels[89]     = 'אסיסטים';
	$labels[90]     = 'עבירות';
	$labels[91]     = 'חטיפות';
	$labels[92]     = 'איבודי כדור';
	$labels[93]     = 'חסימות';
	$labels[94]     = 'שם שחקן';
	$labels[95]     = 'הקבוצה שלך לא רשומה לאתר. אנא,הרשם בדף ההרשמה.';
	$labels[96]	= 'אתה או מישהו אחר ביקש סיסמא שבה אתה משתמש כדי להתחבר ל www.bamanager.net.';
	$labels[97]     = 'bamanager.net שחזור סיסמא';
	$labels[98]	= 'הסיסמא נשלחה';
	$labels[99]	= 'שגיאה בשליחת הסיסמא. אנא נסה שנית';
	$labels[100]    = 'מוריד את נתוני הקבוצה שלך,התאזר בסבלנות...';
	$labels[101]    = 'שלח את הסיסמא שלי';
	$labels[102]    = "הקלק כדי לראות את פרטי השחקן";
	$labels[103]    = 'בן #age#שנים מ #country#. #height# ס"מ, #weight# ק"ג.';
	$labels[104]    = 'שחקן זה הוא #caracter#. הוא מרוויח #wage# יורו/שבוע.';
	$labels[105]    = 'התפתחות אימונים';
	$labels[106]    = 'רשימת שחקנים';
	$labels[107]    = 'הקודם';
	$labels[108]    = 'הבא';
	$labels[109]    = 'כללי';
	$labels[110]    = 'סקילים';
	$labels[111]    = 'מצטערים,לא מצאנו שום מידע על אימונים. אולי לא הורדת את המידע העדכני אתה יכול להוריד את המידע העדכני שלך בדף הורדות-מידע קבוצה';
	$labels[112]    = 'אימונים';
	$labels[113]    = "לשחקן זה אין עדיין אימונים שתועדו בבסיס הנתונים של האתר";
	$labels[114]    = 'תאריך אימון';
	$labels[115]    = 'סוג אימון';
	$labels[116]    = 'מיקום';
	$labels[117]    = 'כוכבים';
	$labels[118]    = "לשחקן זה אין עדיין משחקים בקבוצה שלך שתועדו.";
	$labels[119]    = 'גארדים';
	$labels[120]    = 'ביגמנים';
	$labels[121]    = 'עוצמה';
	$labels[122]    = 'אין מידע';
	$labels[123]    = 'פרטי קבוצה';
	$labels[124]    = 'פרטי אימונים';
	$labels[125]    = 'תודה שהשתמשת באתר,#USERNAME#.';
	$labels[126]    = 'סטטיסטיקות';
	$labels[127]    = 'משתמשים פעילים';
	$labels[128]    = 'שחקנים שעקבו אחריהם';
	$labels[129]    = 'משחקים שהורדו';
	$labels[130]    = 'משתמשים מחוברים';
	$labels[131]    = 'זה חינם';
	$labels[132]    = 'לא נמצאו הודעות';
	$labels[133]    = 'אל';
	$labels[134]    = 'נושא';
	$labels[135]    = 'הודעה';
	$labels[136]    = 'שלח';
	$labels[137]    = 'מלא את שם הנמען';
	$labels[138]    = 'מלא את הנושא';
	$labels[139]    = 'הוסף טקסט לגוף ההודעה';
	$labels[140]    = "שם משתמש לא קיים";
	$labels[141]    = 'מ';
	$labels[142]    = 'תאריך';
	$labels[143]    = 'קרא הודעה';
	$labels[144]    = 'השב';
	$labels[145]    = 'הגדרות';
	$labels[146]    = 'שנה סיסמא';
	$labels[147]    = 'סיסמא ישנה';
	$labels[148]    = 'סיסמא חדשה';
	$labels[149]    = 'אמת סיסמא חדשה';
	$labels[150]    = 'שנה את הסיסמא שלי';
	$labels[151]    = 'הסיסמא הישנה שנכתבה אינה הסיסמא הנוכחית שלך';
	$labels[152]    = 'הסיסמא החדשה שונה מהסיסמא באימות הסיסמא';
	$labels[153]    = 'הסיסמא החדשה חייבת להכיל לפחות 5 תווים';
	$labels[154]    = 'הסיסמא החדשה שלך נשמרה';
	$labels[155]    = 'אפס את כל העמדות';
	$labels[156]    = '#NUMBER# קומבינציות אפשריות נמצאו!';
	$labels[157]    = 'מוכר';
	$labels[158]    = 'קונה';
	$labels[159]    = 'מחיר';
	$labels[160]    = 'לא נמצאו העברות';
	$labels[161]    = 'שחקן שפרש';
	$labels[162]    = 'סך כל הקניות:';
	$labels[163]    = 'ממוצע(קניות):';
	$labels[164]    = 'סך כל המכירות:';
	$labels[165]    = 'ממוצע(מכירות):';
	$labels[166]    = 'הפרש:';
	$labels[167]    = 'ממוצע(קניות+מכירות):';
	$labels[168]    = 'מספר העברות:';
	$labels[169]    = 'הקלק כאן להיסטוריית אימונים';
	$labels[170]    = 'הערות';
	$labels[171]    = 'שמור הערה';
	$labels[172]    = 'הרשם בחינם!';
	$labels[173]    = 'הראה את השחקן הזה למאמן הלאומי!';
	$labels[174]    = 'הסתר את השחקן הזה מהמאמן הלאומי!';
	$labels[175]    = 'הורד את המידע של הנבחרת';
	$labels[176]    = 'מצטערים,אך אתה לא מאמן לאומי ולכן אתה לא מורשה להוריד את המידע הזה';
	$labels[177]    = 'התקדמות סקילים';
	$labels[178]    = 'התחברויות היום';
?>