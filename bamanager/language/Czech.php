<?
       $match_status['UPCOMING']   = 'Budoucí'; //what should be translated is 'Upcoming' (same goes for all cases below)
       $match_status['ONGOING']    = 'Právě se hraje';
       $match_status['FINISHED']   = 'Odehráno'; //expression for completed match

       $training_intensity[0]	= 'volnější (15h/týden)';
       $training_intensity[1]	= 'normální (25h/týden)';
       $training_intensity[2]	= 'intensivní (30h/týden)';
       $training_intensity[3]	= 'enormní (40h/týden)';

	$training_types[1]	= 'Ovládání míče';
	$training_types[2]	= 'Rychlost';
	$training_types[3]	= 'Přihrávky';
	$training_types[4]	= 'Dribling';
	$training_types[5]	= 'Doskoky';
	$training_types[6]	= 'Výběr místa';
	$training_types[7]	= 'Střelba';
	$training_types[8]	= 'Trestné hody';
	$training_types[9]	= 'Obrana';

	$match_label["W"]	= 'V'; //win
	$match_label["L"]	= 'P'; //lose
	$match_label["D"]	= 'R'; //draw

	$nat_match_types[1]	= 'Kvalifikace';
	$nat_match_types[2]	= 'Přátelák';
	$nat_match_types[3]	= 'Mistrovství';
	$nat_match_types[4]	= 'Mistrovství';
	$nat_match_types[11]	= 'Kvalifikace';
	$nat_match_types[12]	= 'Přátelák';
	$nat_match_types[13]	= 'Mistrovství';
	$nat_match_types[14]	= 'Mistrovství';

	$match_types[0]	        = 'Neznámý';
	$match_types[1]	        = 'Liga';
	$match_types[2]	        = 'Přátelák';
	$match_types[3]	        = 'Pohár';
	$match_types[4]	        = 'Baráž';
	$match_types[5]	        = 'Fair Play Cup'; //you can keep original name
	$match_types[6]	        = 'Mezinárodní';
	$match_types[7]	        = 'Mezinárodní';
	$match_types[18]        = 'Juniorský';
	$match_types[19]        = 'Juniorské mistrovství'; //try not to use too long translation
	
	$def_strategy[0]	= 'normální';
	$def_strategy[1]	= 'sprintovat zpět do obrany';
	$def_strategy[2]	= 'bránit ve střelbě';
	$def_strategy[3]	= 'blokovat a doskakovat';
	$def_strategy[4]	= 'chránit silnou zónu';
	$def_strategy[5]	= 'unavit soupeře';
	$def_strategy[6]	= 'zdvojení na půlce';

	$off_strategy[0]	= 'normální';
	$off_strategy[1]	= 'přečíst obranu';
	$off_strategy[2]	= 'rychlé protiútoky';
	$off_strategy[3]	= 'střelba z dálky';
	$off_strategy[4]	= 'probít se skrz';
	$off_strategy[5]	= 'doskakovat';
	$off_strategy[6]	= 'střelba zblízka';

	$quarters[1]	        = 'Konec první čtvrtiny. Průběžný výsledek:';
	$quarters[2]	        = 'Konec druhé čtvrtiny. Průběžný výsledek:';
	$quarters[3]	        = 'Konec třetí čtvrtiny. Průběžný výsledek:';
	$quarters[4]	        = 'Zápas skončil. Konečný výsledek:';

	$arch_match[ONEMONTH]		= '1 měsíc';
	$arch_match[TWOMONTHS]		= '2 měsíce';
	$arch_match[THREEMONTHS]	= '3 měsíce';
	$arch_match[SIXMONTHS]		= '6 měsíců';
	$arch_match[NINEMONTHS]		= '9 měsíců';
	$arch_match[ONEYEAR]		= '1 rok';

	$tlabels[BAMANAGER]		= "BAManager {$BAMVER}"; //don't translate this, just leave it as it is
	$tlabels[TEAM]			= $_SESSION["teamname"]; //don't translate this, just leave it as it is
	$tlabels[NTEAM]			= $_SESSION['natteam']; //don't translate this, just leave it as it is
	$tlabels[BASKETSIM]		= "Basketsim"; //don't translate this

	$tlabels[SCREENSHOOTS]		= 'Ukázky';
	$tlabels[LOGIN]			= 'Přihlásit se';
	$tlabels[REGISTER]		= 'Registrace';
	$tlabels[BAMABOUT]		= 'O apliakci';
	$tlabels[BAMCONTACT]		= 'Kontakt';
	$tlabels[BAMNEWS]		= 'Novinky';
	$tlabels[LOGOUT]		= 'Odhlásit';
	$tlabels[TEAMPLAYERS]		= 'Hráči';
	$tlabels[TEAMMATCHES]		= 'Zápasy';
	$tlabels[TEAMTRANSFERHISTORY]	= 'Historie přestupů';
	$tlabels[TEAMTRAININGHISTORY]	= 'Historie tréninků';
	$tlabels[NTEAMPLAYERS]		= 'Hráči';
	$tlabels[NTEAMMATCHES]		= 'Zápasy';
	$tlabels[NTEAMDOWNLOAD]		= 'Stáhnout';
	//$tlabels[NTEAMSUGGESTIONS]	= 'Nabídky';
	$tlabels[SETTINGS]		= 'Nastavení';
	$tlabels[SETGENERAL]		= 'Hlavní nastavení';
	$tlabels[SETCOLUMNS]		= 'Sloupce';
	$tlabels[SETWEIGHTS]		= 'Váhy';
	$tlabels[TEAMDETAILS]		= 'Přehled';
	$tlabels[TOOLS]			= 'Nástroje';
	$tlabels[TOOLS_B5]		= 'Nejlepší sestava';
	$tlabels[TOOLS_BPOS]		= 'Nejvhodnější pozice';
	$tlabels[ONLINE]		= 'Stáhnout';
	$tlabels[ONLINETEAMDATA]	= 'Týmová data';
	$tlabels[ONLINETEAMMATCHES]	= 'Zápasy';
	$tlabels[MSG]			= 'Zprávy';
	$tlabels[MSGINBOX]		= 'Doručené';
	$tlabels[MSGOUTBOX]		= 'Odeslané';
	$tlabels[MSGWRITE]		= 'Napsat zprávu';
	$tlabels[GM]			= 'Gamemaster';
	$tlabels[GMCOUNTRIES]		= 'Země';

	$tcolumns["name"]		= 'Jméno';
	$tcolumns["onsale"]		= 'Na prodej';
	$tcolumns["injury"]		= 'Zranění';
	$tcolumns["country"]		= 'Země';
	$tcolumns["age"]		= 'Věk';
	$tcolumns["wage"]		= 'Plat';
	$tcolumns["rating_last"]	= 'Poslední výkon';
	$tcolumns["rating_best"]	= 'Nejlepší výkon';
	$tcolumns["rating_average"]	= 'Hodnocení'; //make sure not to use too long expression!
	$tcolumns["ballhandling"]	= 'Ovládání míče';
	$tcolumns["quickness"]		= 'Rychlost';
	$tcolumns["passing"]		= 'Přihrávky';
	$tcolumns["dribbling"]		= 'Dribling';
	$tcolumns["rebounding"]		= 'Doskoky';
	$tcolumns["positioning"]	= 'Výběr místa';
	$tcolumns["shooting"]		= 'Střelba';
	$tcolumns["freethrows"]		= 'Trestné hody';
	$tcolumns["defense"]		= 'Obrana';
	$tcolumns["workrate"]		= 'Pracovitost';
	$tcolumns["experience"]		= 'Zkušenosti';
	$tcolumns["tiredness"]		= 'Únava';
	$tcolumns["coach"]		= 'Trenér';
	$tcolumns["characterr"]		= 'Charakter';
	$tcolumns["height"]		= 'Výška';
	$tcolumns["weight"]		= 'Váha';
	$tcolumns["2p"]			= '2B';
	$tcolumns["3p"]			= '3B';
	$tcolumns["ft"]			= 'TH';
	$tcolumns["reb"]		= 'DOS';
	$tcolumns["pf"]			= 'FA';
	$tcolumns["opf"]		= 'ÚF';
	$tcolumns["assists"]		= 'AS';
	$tcolumns["steals"]		= 'ZM';
	$tcolumns["turnovers"]		= 'ZT';
	$tcolumns["sf_pos"]		= 'SF';
	$tcolumns["pf_pos"]		= 'PF';
	$tcolumns["c_pos"]		= 'C';
	$tcolumns["pg_pos"]		= 'PG';
	$tcolumns["sg_pos"]		= 'SG';
	$tcolumns["playerid"]		= 'ID hráče';

//for some of the expressions below type again the same translations as above

	$tcolumnsdesc["name"]		= 'Jméno';
	$tcolumnsdesc["onsale"]		= 'Na prodej';
	$tcolumnsdesc["injury"]		= 'Zranění';
	$tcolumnsdesc["country"]	= 'Země';
	$tcolumnsdesc["age"]		= 'Věk';
	$tcolumnsdesc["wage"]		= 'Plat';
	$tcolumnsdesc["rating_last"]	= 'Poslední výkon';
	$tcolumnsdesc["rating_best"]	= 'Nejlepší výkon';
	$tcolumnsdesc["rating_average"]	= 'Hodnocení';
	$tcolumnsdesc["ballhandling"]	= 'Ovládání míče';
	$tcolumnsdesc["quickness"]	= 'Rychlost';
	$tcolumnsdesc["passing"]	= 'Přihrávky';
	$tcolumnsdesc["dribbling"]	= 'Dribling';
	$tcolumnsdesc["rebounding"]	= 'Doskoky';
	$tcolumnsdesc["positioning"]	= 'Výběr místa';
	$tcolumnsdesc["shooting"]	= 'Střelba';
	$tcolumnsdesc["freethrows"]	= 'Trestné hody'; //make sure not to use too long expression!
	$tcolumnsdesc["defense"]	= 'Obrana';
	$tcolumnsdesc["workrate"]	= 'Pracovitost';
	$tcolumnsdesc["experience"]	= 'Zkušenosti';
	$tcolumnsdesc["tiredness"]	= 'Únava';
	$tcolumnsdesc["coach"]		= 'Trenér';
	$tcolumnsdesc["characterr"]	= 'Charakter';
	$tcolumnsdesc["height"]		= 'Výška';
	$tcolumnsdesc["weight"]		= 'Váha';
	$tcolumnsdesc["c_pos"]		= 'Center';
	$tcolumnsdesc["pf_pos"]		= 'Power Forward';
	$tcolumnsdesc["sf_pos"]		= 'Small Forward';
	$tcolumnsdesc["sg_pos"]		= 'Shooting Guard';
	$tcolumnsdesc["pg_pos"]		= 'Point Guard';
	$tcolumnsdesc["2p"]		= '2 body';
	$tcolumnsdesc["3p"]		= '3 body';
	$tcolumnsdesc["ft"]		= 'Trestné hody';
	$tcolumnsdesc["reb"]		= 'Doskoky';
	$tcolumnsdesc["pf"]		= 'Fauly';
	$tcolumnsdesc["opf"]		= 'Útočné fauly';
	$tcolumnsdesc["assists"]	= 'Asistence';
	$tcolumnsdesc["steals"]		= 'Získané míče';
	$tcolumnsdesc["turnovers"]	= 'Ztráty';
	$tcolumnsdesc["playerid"]	= 'ID hráče';

//below are two letter acronyms presenting Basketsim skills, if you will translate them, do it according to how you've translated skill names above

	$tcolumnsshort["ballhandling"]	= 'OM';
	$tcolumnsshort["quickness"]	= 'R';
	$tcolumnsshort["passing"]	= 'P';
	$tcolumnsshort["dribbling"]	= 'D';
	$tcolumnsshort["rebounding"]	= 'DO';
	$tcolumnsshort["positioning"]	= 'VM';
	$tcolumnsshort["shooting"]	= 'S';
	$tcolumnsshort["freethrows"]	= 'TH';
	$tcolumnsshort["defense"]	= 'O';
	$tcolumnsshort["workrate"]	= 'PRAC';
	$tcolumnsshort["experience"]	= 'ZK';
	$tcolumnsshort["characterr"]	= 'CH';

/*
below use the same expressions as they are used in your local Basketsim translation
(if you think these translation should be improved, you can use improved version here, but contact me so I can update your translation file!)
*/
	$skills[0]	= 'neexistující';
	$skills[1]	= 'odstrašující';
	$skills[2]	= 'katastrofální';
	$skills[3]	= 'tristní';
	$skills[4]	= 'nedostačující';
	$skills[5]	= 'ucházející';
	$skills[6]	= 'solidní';
	$skills[7]	= 'excelentní';
	$skills[8]	= 'vynikající';
	$skills[9]	= 'brilantní';
	$skills[10]	= 'famózní';
	$skills[11]	= 'prvotřídní';
	$skills[12]	= 'okouzlující';
	$skills[13]	= 'kolosální';
	$skills[14]	= 'dechberoucí';
	$skills[15]	= 'bezkonkurenční';

	$character[0]	= 'stálý';
	$character[1]	= 'zábavný';
	$character[2]	= 'klidný';
	$character[3]	= 'agresivní';
	$character[4]	= 'kontroverzní';
	$character[5]	= 'sobecký';

	$tiredness[0]	= 'plný energie';
	$tiredness[1]	= 'svěží';
	$tiredness[2]	= 'aktivní';
	$tiredness[3]	= 'lehce unavený';
	$tiredness[4]	= 'unavený';
	$tiredness[5]	= 'vyčerpaný';
	$tiredness[6]	= 'polomrtvý';

/*
in some of the expressions below you will notice links, just translate the text and leave links exactly as they are
in some of the expressions below you will notice markers like #COL# or <br/> - don't translate or change them, always translate text only!
*/
	$labels[1]	= 'Vítejte!';
	$labels[2]	= 'Co je Basketsim Assistant Manager (BAM)?<br/>Nástroj ZDARMA, který vám pomůže se správou vašeho týmu!';
	$labels[3]	= 'Jak se připojit?';
	$labels[4]	= 'Není nic snazšího. Stačí být zaregistrovaný na <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a>.<br/>Jakmile jste tam již zaregistrovaný, můžete se ihned <a href=\"index.php?tab=register&mainpage=register\"><b>zaregistrovat na BAM</b></a> a využívat ho!';
	$labels[5]	= 'Aplikace využívá data z online manažeru  <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>Použití bylo schváleno vývojáři a vlastníky <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.';
	$labels[6]	= 'Registrace týmu';
	$labels[7]	= 'Nastavit heslo pro tento web:';
	$labels[8]	= 'Heslo';
	$labels[9]	= ' * Heslo nesmí být stejné jako na basketsim.com';
	$labels[10]	= 'Emailová adresa';
	$labels[11]	= 'Ověření týmových dat';
	$labels[12]	= "Tato operace je nutná pro ochranu dat vašeho týmu proti zneužítí neoprávněnými uživateli. Tato operace je schválena Basketsim a vaše přístupové údaje nejsou ukládána v rámci BAM!"; 
  	$labels[13]	= 'Uživatelské jméno z Basketsim';
	$labels[14]	= 'CBPP kód';
	$labels[15]	= 'Upozornění! CBPP kód není heslo do Basketsim. CBPP kód je možné nastavit a změnit přímo v Basketsim v nastavení profilu.';
	$labels[16]	= 'Vyplňte všechna povinná pole.';
	$labels[17]	= 'Heslo musí obsahovat alespoň 5 znaků.';
	$labels[18]	= 'Chyba při komunikaci s Basketsim serverem.';
	$labels[19]	= 'Chyba při ověření na Basketsim serveru. Zkontrolujte zadaná data.';
	$labels[20]	= 'Vyskytla se chyba při analýze stahovaných dat. Kontaktujte administrátora.';
	$labels[21]	= 'Tým už je zaregistrován.';
	$labels[22]	= 'Není nastaven CBPP kód. Kód je možné vyplnit v Basketsim, v sekci nastavení profilu.';
	$labels[23]	= 'Chyba';
	$labels[24]	= 'Uživatelské jméno';
	$labels[25]	= 'Heslo';
	$labels[26]	= 'Ztracené heslo';
	$labels[27]	= 'ID týmu';
	$labels[28]	= 'Jméno týmu';
	$labels[29]	= 'Zkrácené jméno týmu';
	$labels[30]	= 'Země';
	$labels[31]	= 'Liga';
	$labels[32]	= 'Není nastaven žádný sloupec pro zobrazení. Pro výběr zobrazovaných sloupců použijte prosím záložku Nastavení';
	$labels[33]	= 'Sloupec';
	$labels[34]	= 'Zobrazit';
	$labels[35]	= 'Šířka';
	$labels[36]	= 'Uložit změny';
	$labels[37]	= 'Měli byste vybrat alespoň jeden sloupec k zobrazení.';
	$labels[38]	= 'Změny byly uloženy';
	$labels[39]	= 'Šířka sloupce musí být zadána číselnou hodnotou';
	$labels[40]	= 'Pro sloupce, které se mají zobrazovat, je nutné zadat šířku';
	$labels[41]	= 'Šířka sloupce nesmí být 0';
	$labels[42]	= 'Zprávy';
	$labels[43]	= 'Základní pětka';
	$labels[44]	= 'Priorita';
	$labels[45]	= 'Náhradníci';
	$labels[46]	= 'Spočítat nejlepší sestavu!';
	$labels[47]	= 'Dvojklikem přesunete hráče z jedné tabulky do druhé';
	$labels[48]	= 'Pro aktualizaci týmových dat jsou nutné následující údaje';
	$labels[49]	= "Vliv nastavených váhových kritérií můžete zkontrolovat <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><b>zde</b></a>";
	$labels[50]	= "Tým je už zaregistrován. Klikněte <a href='./index.php?tab=team&mainpage=teamplayers'><b>zde</b></a> pro další informace.";
	$labels[51]	= 'Pokud nemáte účet, můžete se zaregistrovat <a href=\"index.php?tab=register&mainpage=register\"><b>zde</b></a>!';
	$labels[52]	= 'Objevila se chyba při zpracování XML s údaji hráčů. <BR>Prosím, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>kontaktujte</b></a> administrátora.';
        $labels[53]	= 'Trenér';
	$labels[54]     = 'Kliknutím seřadit podle #COL#';
	$labels[55]	= 'Přihlašovací údaje budou zaslány na tuto emailovou adresu';
	$labels[56]     = 'Použít standardní nastavení pro : #POSITION#';
	$labels[57]     = "Klikněte zde pro obnovení standardních BAM vah pro všechny pozice";
	$labels[58]     = 'Atribut';
	$labels[59]     = 'Váha';
	$labels[60]     = 'Aktivní';
	$labels[61]	= 'Nezapomeňte sledovat sekci <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><b>novinky</b></a> pro nejnovější informace';
	$labels[62]	= 'Jazyk';
	$labels[63]	= 'Zobrazit atributy hráče jako';
	$labels[64]	= 'Text';
	$labels[65]	= 'Číselné hodnoty';
	$labels[66]	= 'Chyba při ukládání nastavení';
	$labels[67]	= 'Objevila se chyba při zpracování XML s údaji o zápasech. <BR>Prosím, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>kontaktujte</b></a> administrátora.';
        $labels[68]	= 'Datum';
	$labels[69]	= 'Typ zápasu';
	$labels[70]	= 'Soupeři';
	$labels[71]	= 'Výsledek';
	$labels[72]	= 'Stav';
	$labels[73]	= 'Nebyly nalezeny žádné zápasy. Můžete je stáhnout <a href=\"index.php?tab=online&mainpage=onlteamdata\"><b>zde</b></a>';
	$labels[74]	= 'Klikněte pro detaily zápasu';
	$labels[75]	= '* Poznámka - Současně se stáhnou informace o zápasech za poslední 3 týdny.<br><b>Pokud chcete stáhnout více zápasů, klikněte <a href=\"index.php?tab=online&mainpage=onlteammatches\">zde</a></b>';
	$labels[76]	= 'Stáhnout zápasy za poslední'; //referring to amount of time, for example "the last 6 months"
	$labels[77]	= 'Hodnocení';
	$labels[78]	= 'Taktika';
	$labels[79]     = 'Počet diváků';
	$labels[80]     = 'Sedadla nižší kategorie';
	$labels[81]     = 'Sedadla za koši';
	$labels[82]     = 'Sedadla vyšší kategorie';
	$labels[83]     = 'VIP boxy';
	$labels[84]     = 'Celkem';
	$labels[85]     = 'Čtvrtina';
	$labels[86]     = 'Zpět';
	$labels[87]     = 'Výsledek';
	$labels[88]     = 'Doskoky';
	$labels[89]     = 'Asistence';
	$labels[90]     = 'Fauly';
	$labels[91]     = 'Získané míče';
	$labels[92]     = 'Ztráty';
	$labels[93]     = 'Bloky';
	$labels[94]     = 'Jméno';
	$labels[95]     = 'Váš tým ještě není registrován. Zaregistrujte se.';
	$labels[96]	= 'Vy nebo někdo jiný zažádal o zaslání hesla pro přihlášení na www.bamanager.net.';
	$labels[97]     = 'bamanager.net - obnova hesla';
	$labels[98]	= 'Heslo bylo odesláno';
	$labels[99]	= 'Chyba v odeslání hesla. Zkuste to znovu.';
	$labels[100]    = 'Stahuji týmová data, okamžik prosím ...';
	$labels[101]    = 'Zaslat heslo pro BAM';
	$labels[102]    = "Klikněte pro detaily zvoleného hráče";
	$labels[103]    = '#age# let, země původu - #country#. #height# cm, #weight# kg.';
	$labels[104]    = 'Tento hráč je #caracter#. Plat #wage# &euro; týdně.';
	$labels[105]    = 'Tréninkový vývoj';
	$labels[106]    = 'Hráči';
	$labels[107]    = 'Předchozí';
	$labels[108]    = 'Následující';
	$labels[109]    = 'Přehled';
	$labels[110]    = 'Atributy';
	$labels[111]    = 'Nebyla nalezena tréninková data. Pravděpodobně nemáte stažená poslední data. Stáhnout je můžete v sekci Stáhnout -> Týmová data.';
	$labels[112]    = 'Trénink';
	$labels[113]    = "Hráč nemá uložen žádný trénink v databázi BAM.";
	$labels[114]    = 'Datum tréninku';
	$labels[115]    = 'Zvolený trénink';
	$labels[116]    = 'Pozice';
	$labels[117]    = 'Hodnocení';
	$labels[118]    = "Hráč nemá uložené žádné zápasy odehrané za tvůj tým.";
	$labels[119]    = 'Rozehrávači';
	$labels[120]    = 'Podkošoví hráči';
	$labels[121]    = 'Intenzita';
	$labels[122]    = 'nejsou data';
	$labels[123]    = 'Detaily týmu';
	$labels[124]    = 'Informace o tréninku';
	$labels[125]    = 'Děkuji že využíváte BAM, #USERNAME#.';
	$labels[126]    = 'STATISTIKY';
	$labels[127]    = 'Aktivní uživatelé';
	$labels[128]    = 'Sledovaní hráči';
	$labels[129]    = 'Stažené zápasy';
	$labels[130]    = 'Uživatelé online';
	$labels[131]    = 'Vše je ZDARMA';
	$labels[132]    = 'Žádné zprávy nenalezeny';
	$labels[133]    = 'Komu';
	$labels[134]    = 'Předmět';
	$labels[135]    = 'Zpráva';
	$labels[136]    = 'Odeslat';
	$labels[137]    = 'Vyplňte příjemce zprávy';
	$labels[138]    = 'Vyplňte předmět zprávy';
	$labels[139]    = 'Napište zprávu';
	$labels[140]    = "Uživatel neexistuje";
	$labels[141]    = 'Od';
	$labels[142]    = 'Datum';
	$labels[143]    = 'Přečíst zprávu';
	$labels[144]    = 'Odpovědět';
	$labels[145]    = 'Předvolby';
	$labels[146]    = 'Změnit heslo';
	$labels[147]    = 'Původní heslo';
	$labels[148]    = 'Nové heslo';
	$labels[149]    = 'Potvrdit nové heslo';
	$labels[150]    = 'Změnit heslo';
	$labels[151]    = 'Špatně zadané původní heslo';
	$labels[152]    = 'Nové heslo a potvrzené nové heslo se neshodují';
	$labels[153]    = 'Nové heslo musí obsahovat alespoň 5 znaků';
	$labels[154]    = 'Nové heslo bylo uloženo';
	$labels[155]    = 'Vymazat všechny pozice';
	$labels[156]    = 'Nalezeno #NUMBER# možných kombinací!';
	$labels[157]    = 'Prodávající';
	$labels[158]    = 'Kupující';
	$labels[159]    = 'Cena';
	$labels[160]    = 'Žádné přestupy nenalezeny';
	$labels[161]    = 'hráč ukončil kariéru';
	$labels[162]    = 'Celkem zaplaceno:';
	$labels[163]    = 'Průměr (nákup):';
	$labels[164]    = 'Celkem obdrženo:';
	$labels[165]    = 'Průměr (prodej):';
	$labels[166]    = 'Rozdíl:';
	$labels[167]    = 'Průměr (nákup+prodej):';
	$labels[168]    = 'Celkem přestupů:';
	$labels[169]    = 'Klikněte pro historii tréninků';
	$labels[170]    = 'Poznámky';
	$labels[171]    = 'Uložit poznámku';
	$labels[172]    = 'Zaregistrujte se zdarma!';
	$labels[173]    = 'Zpřístupnit hráče trenérovi národního týmu !';
	$labels[174]    = 'Skrýt hráče trenérovi národního týmu !';
	$labels[175]    = 'Stáhnout data národního týmu';
	$labels[176]    = 'Pouze trenér národního týmu může stahovat tato data';
	$labels[177]    = 'Vývoj atributů';
	$labels[178]    = 'Dnes přihlášeno';
?>