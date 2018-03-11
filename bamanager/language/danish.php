<?
	$training_intensity[0]	= 'afslapning (15t/uge)';
	$training_intensity[1]	= 'normal (25t/uge)';
	$training_intensity[2]	= 'intens (30t/uge)';
	$training_intensity[3]	= 'enorm (40t/uge)';

	$training_types[1]	= 'Boldhåndtering';
	$training_types[2]	= 'Hurtighed';
	$training_types[3]	= 'Pasning';
	$training_types[4]	= 'Dribling';
	$training_types[5]	= 'Rebounds';
	$training_types[6]	= 'Positionering';
	$training_types[7]	= 'Skud';
	$training_types[8]	= 'Straffekast';
	$training_types[9]	= 'Forsvar';
	$training_types[10]	= 'Vægtforøgelse';
	$training_types[11]	= 'Vægttab';

	$match_label["W"]	= 'V'; //win
	$match_label["L"]	= 'T'; //loose
	$match_label["D"]	= 'U'; //deuce

	$match_types[0]	= 'Ukendt';
	$match_types[1]	= 'Liga';
	$match_types[2]	= 'Venskabskamp';
	$match_types[3]	= 'Cup';
	$match_types[4]	= 'Slutspil';
	$match_types[5]	= 'Fair Play Cup';
	$match_types[19]	= 'Youth Club WC';

	$match_status['FINISHED']	= 'Afsluttet';
	$match_status['UPCOMING']	= 'kommende';
	$match_status['ONGOING']	= 'I gang';
	
	$def_strategy[0]	= 'normal';
	$def_strategy[1]	= 'sprint tilbage i forsvar';
	$def_strategy[2]	= 'blokér alle skud';
	$def_strategy[3]	= 'fokuser på rebounds';
	$def_strategy[4]	= 'beskyt 3-sekundsfelt';
	$def_strategy[5]	= 'kør modstander træt';
	$def_strategy[6]	= 'half court trap';

	$off_strategy[0]	= 'normal';
	$off_strategy[1]	= 'læs forsvaret';
	$off_strategy[2]	= 'kontraløb';
	$off_strategy[3]	= 'skyd fra afstand';
	$off_strategy[4]	= 'bryd igennem';
	$off_strategy[5]	= 'kæmp for rebounds';
	$off_strategy[6]	= 'inside shooting';

	$quarters[1]	= '1. quarter ender. Stillingen er:';
	$quarters[2]	= '2. quarter ender. Stillingen er:';
	$quarters[3]	= '3. quarter ender. Stillingen er:';
	$quarters[4]	= 'Kampen er slut. Resultatet blev:';

	$arch_match[ONEMONTH]				= '1 måned';
	$arch_match[TWOMONTHS]				= '2 måneder';
	$arch_match[THREEMONTHS]			= '3 måneder';
	$arch_match[SIXMONTHS]				= '6 måneder';
	$arch_match[NINEMONTHS]				= '9 måneder';
	$arch_match[ONEYEAR]				= '1 år';

	$tlabels[LOGIN]					= 'Log ind';
	$tlabels[REGISTER]				= 'Registrer';
	$tlabels[BASKETSIM]				= "Basketsim";
	$tlabels[BAMANAGER]				= "BAManager {$BAMVER}";
	$tlabels[BAMABOUT]				= 'Om';
	$tlabels[BAMCONTACT]			= 'Kontakt';
	$tlabels[BAMNEWS]				= 'Nyheder';
	$tlabels[LOGOUT]				= 'Log af';
	$tlabels[TEAM]					= $_SESSION["teamname"];
	$tlabels[TEAMPLAYERS]			= 'Spillere';
	$tlabels[TEAMMATCHES]			= 'Kampe';
	$tlabels[TEAMTRANSFERHISTORY]	= 'Transferhistorik';
	$tlabels[TEAMTRAININGHISTORY]	= 'Træningshistorik';
	$tlabels[NTEAM]					= $_SESSION['natteam'];
	$tlabels[NTEAMPLAYERS]			= 'Spillere';
	$tlabels[NTEAMMATCHES]			= 'Kampe';
	$tlabels[NTEAMDOWNLOAD]			= 'Download';
	$tlabels[NTEAMSUGGESTIONS]		= 'Forslag';
	$tlabels[SETTINGS]				= 'Indstillinger';
	$tlabels[SETGENERAL]			= 'Generelt';
	$tlabels[SETCOLUMNS]			= 'Kolonner';
	$tlabels[SETWEIGHTS]			= 'Vægte';
	$tlabels[TEAMDETAILS]			= 'Forside';
	$tlabels[TOOLS]					= 'Værktøjer';
	$tlabels[TOOLS_B5]				= 'Bedste 5';
	$tlabels[TOOLS_BPOS]			= 'Bedste position';
	$tlabels[ONLINE]				= 'Download';
	$tlabels[ONLINETEAMDATA]		= 'Holddata';
	$tlabels[ONLINETEAMMATCHES]		= 'Kampe';
	$tlabels[MSG]					= 'Beskeder';
	$tlabels[MSGINBOX]				= 'Modtagne';
	$tlabels[MSGOUTBOX]				= 'Sendte';
	$tlabels[MSGWRITE]				= 'Skriv besked';

	$tcolumns["name"]				= 'Navn';
	$tcolumns["onsale"]				= 'Til salg'; //
	$tcolumns["injury"]				= 'Skade'; //
	$tcolumns["country"]			= 'Land'; //
	$tcolumns["age"]				= 'Alder';
	$tcolumns["wage"]				= 'Løn';
	$tcolumns["rating_last"]		= 'Rating (seneste)';
	$tcolumns["rating_best"]		= 'Rating (bedste)';
	$tcolumns["rating_average"]		= 'Rating (gennemsnit)';
	$tcolumns["ballhandling"]		= 'Boldhåndtering';
	$tcolumns["quickness"]			= 'Hurtighed';
	$tcolumns["passing"]			= 'Pasning';
	$tcolumns["dribbling"]			= 'Dribling';
	$tcolumns["rebounding"]			= 'Rebounding';
	$tcolumns["positioning"]		= 'Positionering';
	$tcolumns["shooting"]			= 'Skud';
	$tcolumns["freethrows"]			= 'Straffekast';
	$tcolumns["defense"]			= 'Forsvar';
	$tcolumns["workrate"]			= 'Lære-evne';
	$tcolumns["experience"]			= 'Rutine';
	$tcolumns["tiredness"]			= 'Træthed';
	$tcolumns["coach"]				= 'Træner'; //
	$tcolumns["characterr"]			= 'Personlighed';
	$tcolumns["height"]				= 'Højde';
	$tcolumns["weight"]				= 'Vægt';
	$tcolumns["2p"]					= '2P';
	$tcolumns["3p"]					= '3P';
	$tcolumns["ft"]					= 'STR';
	$tcolumns["reb"]				= 'REB';
	$tcolumns["pf"]					= 'PF';
	$tcolumns["opf"]				= 'OPF';
	$tcolumns["assists"]			= 'AS';
	$tcolumns["steals"]				= 'ER';
	$tcolumns["turnovers"]			= 'BT';
	$tcolumns["sf_pos"]				= 'SF';
	$tcolumns["pf_pos"]				= 'PF';
	$tcolumns["c_pos"]				= 'C';
	$tcolumns["pg_pos"]				= 'PG';
	$tcolumns["sg_pos"]				= 'SG';
	$tcolumns["playerid"]			= 'Spiller ID';

	$tcolumnsshort["ballhandling"]		= 'BH';
	$tcolumnsshort["quickness"]			= 'HU';
	$tcolumnsshort["passing"]			= 'PAS';
	$tcolumnsshort["dribbling"]			= 'DB';
	$tcolumnsshort["rebounding"]		= 'RB';
	$tcolumnsshort["positioning"]		= 'POS';
	$tcolumnsshort["shooting"]			= 'SKU';
	$tcolumnsshort["freethrows"]		= 'STR';
	$tcolumnsshort["defense"]			= 'FOR';
	$tcolumnsshort["workrate"]			= 'L-E';
	$tcolumnsshort["experience"]		= 'RUT';
	$tcolumnsshort["characterr"]		= 'PER';

	////////////////////////
	$tcolumnsdesc["name"]				= 'Navn';
	$tcolumnsdesc["onsale"]				= 'Til salg'; //
	$tcolumnsdesc["injury"]				= 'Skade'; //
	$tcolumnsdesc["country"]			= 'Land'; //
	$tcolumnsdesc["age"]				= 'Alder';
	$tcolumnsdesc["wage"]				= 'Løn';
	$tcolumnsdesc["rating_last"]		= 'Rating (Seneste)';
	$tcolumnsdesc["rating_best"]		= 'Rating (Bedste)';
	$tcolumnsdesc["rating_average"]		= 'Rating (Gennemsnit)';
	$tcolumnsdesc["ballhandling"]		= 'Boldhåndtering';
	$tcolumnsdesc["quickness"]			= 'Hurtighed';
	$tcolumnsdesc["passing"]			= 'Pasning';
	$tcolumnsdesc["dribbling"]			= 'Dribling';
	$tcolumnsdesc["rebounding"]			= 'Rebounding';
	$tcolumnsdesc["positioning"]		= 'Positionering';
	$tcolumnsdesc["shooting"]			= 'Skud';
	$tcolumnsdesc["freethrows"]			= 'Straffekast';
	$tcolumnsdesc["defense"]			= 'Forsvar';
	$tcolumnsdesc["workrate"]			= 'Lære-evne';
	$tcolumnsdesc["experience"]			= 'Rutine';
	$tcolumnsdesc["tiredness"]			= 'Træthed';
	$tcolumnsdesc["coach"]				= 'Træner'; //
	$tcolumnsdesc["characterr"]			= 'Personlighed';
	$tcolumnsdesc["height"]				= 'Højde';
	$tcolumnsdesc["weight"]				= 'Vægt';
	$tcolumnsdesc["c_pos"]				= 'Center';
	$tcolumnsdesc["pf_pos"]				= 'Power Forward';
	$tcolumnsdesc["sf_pos"]				= 'Small Forward';
	$tcolumnsdesc["sg_pos"]				= 'Shooting Guard';
	$tcolumnsdesc["pg_pos"]				= 'Point Guard';
	$tcolumnsdesc["2p"]					= '2 Point';
	$tcolumnsdesc["3p"]					= '3 Point';
	$tcolumnsdesc["ft"]					= 'Straffekast';
	$tcolumnsdesc["reb"]				= 'Rebounding';
	$tcolumnsdesc["pf"]					= 'Personlige fejl';
	$tcolumnsdesc["opf"]				= 'Offensive, personlige fejl';
	$tcolumnsdesc["assists"]			= 'Assists';
	$tcolumnsdesc["steals"]				= 'Erobringer';
	$tcolumnsdesc["turnovers"]			= 'Boldtab';
	$tcolumnsdesc["playerid"]			= 'Spiller ID';
//////////////////////

	$skills[0]	= 'ingen';
	$skills[1]	= 'katastrofal';
	$skills[2]	= 'elendig';
	$skills[3]	= 'dårlig';
	$skills[4]	= 'under middel';
	$skills[5]	= 'middel';
	$skills[6]	= 'over middel';
	$skills[7]	= 'god';
	$skills[8]	= 'meget god';
	$skills[9]	= 'udmærket';
	$skills[10]	= 'høj udmærket';
	$skills[11]	= 'fantastisk';
	$skills[12]	= 'storslået';
	$skills[13]	= 'ekstraordinær';
	$skills[14]	= 'magisk';
	$skills[15]	= 'perfekt';

	$tiredness[0]	= 'energisk';
	$tiredness[1]	= 'frisk';
	$tiredness[2]	= 'træt';
	$tiredness[3]	= 'meget træt';
	$tiredness[4]	= 'ekstremt træt';
	$tiredness[5]	= 'udmattet';
	$tiredness[6]	= 'fuldstændigt udmattet';
	
	$character[0]	= 'stabil';
	$character[1]	= 'underholdende';
	$character[2]	= 'rolig';
	$character[3]	= 'aggressiv';
	$character[4]	= 'kontroversiel';
	$character[5]	= 'selvisk';

	$labels[1]	= 'Velkommen !';
	$labels[2]	= 'Hvad er Basketsim Assistant Manager ? Et GRATIS værktøj udviklet til at hjælpe med at administrere dit hold';
	$labels[3]	= 'Hvordan deltager du ?';
	$labels[4]	=  "Det er simpelt. Alt du behøver er at registrere dig på <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a> . Når du har modtaget holdet kan du <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>registrere</b></font></a>.";
	$labels[5]	= "Dette værktøj bruger informationer fra online-spillet <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>Dette er godkendt af udviklerne og rettighedshaverne af <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
	$labels[6]	= 'Registrer hold';
	$labels[7]	= 'Specifer kodeordet brugt i Basket Assistant Manager';
	$labels[8]	= 'Kodeord';
	$labels[9]	= ' * Dette kodeord skal adskille sig fra det, der benyttes i Basketsim.com';
	$labels[10]	= 'Email adresse';
	$labels[11]	= 'Verificerer holddata';
	$labels[12]	= 'Denne handling er nødvendig for at forhindre, at andre brugere benytter dit hold. Vi skal minde om, at i følge CBPP reglerne vil denne information ikke blive gemt. Dette er godkendt af Basketsim.';
	$labels[13]	= 'Basketsim bruger';
	$labels[14]	= 'CBPP Kode';
	$labels[15]	= 'Advarsel ! CBPP koden er ikke den samme som dit Basketsim kodeord. CBPP koden kan ændres under din profil. Ved gentagne gange at benytte forkert login- og CBPP kode, kan din konto blive midlertidigt lukket.';
	$labels[16]	= 'Udfyld alle påkrævede felter.';
	$labels[17]	= 'Dette kodeord skal være på mindst 5 karakterer';
	$labels[18]	= 'Fejl i kommunikation med Basketsim serveren.';
	$labels[19]	= 'Fejl i autentificering på Basketsim serveren. Venligst kontroller rigtigheden af de oplyste data.';
	$labels[20]	= 'Der opstod en fejl i de downloadede data. Venligst kontakt administratoren af denne hjemmeside.';
	$labels[21]	= 'Dit hold er allerede registreret.';
	$labels[22]	= "Du indtastede ikke din CBPP kode. For at gøre dette skal du logge ind på Basketsim.com og gå til din Profil.";
	$labels[23]	= 'Fejl';
	$labels[24]	= 'Brugernavn';
	$labels[25]	= 'Kodeord';
	$labels[26]	= 'Glemt Kodeord';
	$labels[27]	= 'Hold ID';
	$labels[28]	= 'Holdnavn';
	$labels[29]	= 'Forkortet holdnavn';
	$labels[30]	= 'Land';
	$labels[31]	= 'Liganavn';
	$labels[32]	= 'Du har ikke valgt nogen synlig kolonne. Venligst gå til indstillinger og vælg.';
	$labels[33]	= 'Kolonne';
	$labels[34]	= 'Synlig';
	$labels[35]	= 'Bredde';
	$labels[36]	= 'Gem ændringer';
	$labels[37]	= 'Minimum 1 af kolonnerne skal være synlig';
	$labels[38]	= 'De valgte ændringer blev gemt';
	$labels[39]	= 'Kolonnebredde skal være en numerisk værdi';
	$labels[40]	= 'Du skal indstille bredden for en synlig kolonne';
	$labels[41]	= 'Du kan ikke vælge 0 som kolonnebredde';
	$labels[42]	= 'Beskeder';
	$labels[43]	= 'Startende 5';
	$labels[44]	= 'Prioritet';
	$labels[45]	= 'Reserver';
	$labels[46]	= 'Udregn mine bedste 5 !';
	$labels[47]	= 'Dobbeltklik på en tabelrække for at flytte en spiller fra én tabel til en anden';
	$labels[48]	= 'For at kunne opdatere dine holddata har vi brug for følgende informationer';
	$labels[49]	= "Du kan se effekten af dine vægte <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><font size='+1'>her</font></font></a>";
	$labels[50]	= "Dit hold er allerede registreret. Klik <a href='./index.php?tab=team&mainpage=teamplayers'><font size='+1'>her</font></font></a> for at se detaljerne.";
	$labels[51]	=  "Hvis du endnu ikke har en konto, kan du <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>registrere</b></font></a> dit hold.";
	$labels[52]	=  "En fejl er opstået ved spillernes XML parsing proces. <BR>Venligst, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><font size=\"+1\"><b>kontakt</b></font></a> sidens administrator omgående.";
	$labels[53]	= 'Træner';
	$labels[54] = 'Klik for at sortere efter #COL#';
	$labels[55]	= 'Dine login informationer bliver sendt til denne email adresse';
	$labels[56] = 'Jeg vil benytte standardindstillinger for : #POSITION#';
	$labels[57] = "Klik her, hvis du vil genoprette BAM standardvægte for alle positioner";
	$labels[58] = 'Færdighed';
	$labels[59] = 'Vægt';
	$labels[60] = 'Er aktiv';
	$labels[61]	=  "Husk at tjekke <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><font size=\"+1\"><b>nyheder</b></font></a> sektionen for at holde dig up-to-date.";
	$labels[62]	= 'Sprog';
	$labels[63]	= 'Vis færdigheder som';
	$labels[64]	= 'Tekst';
	$labels[65]	= 'Numerisk værdi';
	$labels[66]	= 'Fejl ved at gemme dine generelle indstillinger';
	$labels[67]	=  "En fejl opstod under kampenes XML parsing proces. <BR>Venligst, <a href=\"index.php?tab=bam&subtab=contact&mainpage=kontakt\"><font size=\"+1\"><b>contact</b></font></a> sidens administrator omgående.";
	$labels[68]	= 'Kampdato';
	$labels[69]	= 'Kamptype';
	$labels[70]	= 'Hold';
	$labels[71]	= 'Resultat';
	$labels[72]	= 'Status';
	$labels[73]	= "Ingen kampe blev fundet for dit hold. Du kan hente din kampliste <a href='index.php?tab=online&mainpage=onlteamdata'><font size=\"+1\"><b>her</b></font></a>";
	$labels[74]	= 'Klik her for kampdetaljer';
	$labels[75]	= "* Bemærk - Denne handling henter også detaljer om de seneste 3 ugers kampe. Desuden hentes de næste 3 ugers kampe. Hvis du vil hente dit kamparkiv, klik <a href='index.php?tab=online&mainpage=onlteammatches'><font size=\"+1\"><b>her</b></font></a>";
	$labels[76]	= 'Hent kampe fra de seneste';
	$labels[77]	= 'Rating';
	$labels[78]	= 'Strategier';
	$labels[79] = 'Solgte pladser';
	$labels[80] = 'Langside';
	$labels[81] = 'Endetribune';
	$labels[82] = 'Balkon';
	$labels[83] = 'VIP pladser';
	$labels[84] = 'Total';
	$labels[85] = 'Quarter';
	$labels[86] = 'Tilbage';
	$labels[87] = 'Stilling';
	$labels[88] = 'Rebounds';
	$labels[89] = 'Assists';
	$labels[90] = 'Fejl';
	$labels[91] = 'Erobringer';
	$labels[92] = 'Boldtab';
	$labels[93] = 'Blokeringer';
	$labels[94] = 'Spillernavn';
	$labels[95] = 'Dit hold ser ikke ud til at være registreret. Benyt venligst registreringssiden.';
	$labels[96]	= 'Du eller en anden blev afkrævet dit kodeord brugt på http://www.bamanager.org.';
	$labels[97] = 'BAManager.org genoprettelse af kodeord';
	$labels[98]	= 'Kodeord blev sendt';
	$labels[99]	= 'Fejl ved afsendelse af kodeord. Venligst prøv igen.';
	$labels[100]= 'Henter holddata, vent venligst ...';
	$labels[101]= 'Send mit BAM kodeord';
	$labels[102]= "Klik her for at se spillers detaljer";
	$labels[103]= '#age# år gammel fra #country#. #height# cm, #weight# kg.';
	$labels[104]= 'Denne spiller er #caracter#. Han tjener #wage# &euro; / uge.';
	$labels[105]= 'Træningsudvikling';
	$labels[106]= 'Spillerliste';
	$labels[107]= 'Tilbage';
	$labels[108]= 'Frem';
	$labels[109]= 'Generelt';
	$labels[110]= 'Færdigheder';
	$labels[111]= 'Desværre, ingen træningsdata blev fundet. Måske har du ikke opdateret dine data. Du kan hente de seneste data i download -> Holddata sektionen.';
	$labels[112]= 'Træning';
	$labels[113]= "Denne spiller har endnu ikke modtaget træning.";
	$labels[114]= 'Træningsdato';
	$labels[115]= 'Træningstype';
	$labels[116]= 'Position';
	$labels[117]= 'Stjerner';
	$labels[118]= "Denne spiller har ikke spillet nogen kampe for dit hold.";
	$labels[119]= 'Guards';
	$labels[120]= 'Store fyre';
	$labels[121]= 'Intensitet';
	$labels[122]= 'ingen informationer';
	$labels[123]= 'Holddetaljer';
	$labels[124]= 'Træningsinformationer';
	$labels[125]= 'Tak fordi du brugte BAM, #USERNAME#.';
	$labels[126]= 'STATISTIKKER';
	$labels[127]= 'Aktive brugere';
	$labels[128]= 'Bogmærkede spillere';
	$labels[129]= 'Downloadede kampe';
	$labels[130]= 'Online brugere';
	$labels[131]= 'Det er GRATIS';
	$labels[132]= 'Ingen beskeder fundet';
	$labels[133]= 'Til';
	$labels[134]= 'Emne';
	$labels[135]= 'Besked';
	$labels[136]= 'Send';
	$labels[137] = 'Indtast modtager';
	$labels[138] = 'Indtast emne';
	$labels[139] = 'Skriv besked';
	$labels[140] = "Brugeren eksisterer ikke";
	$labels[141] = 'Fra';
	$labels[142] = 'Dato';
	$labels[143] = 'Læs besked';
	$labels[144] = 'Svar';
	$labels[145] = 'Præferencer';
	$labels[146] = 'Ændre kodeord';
	$labels[147] = 'Gammelt kodeord';
	$labels[148] = 'Nyt kodeord';
	$labels[149] = 'Bekræft nyt kodeord';
	$labels[150] = 'Ændre mit kodeord';
	$labels[151] = 'Det indtastede gamle kodeord er ikke dit nuværende kodeord';
	$labels[152] = 'Det nye kodeord er forskelligt fra bekræft nyt kodeord';
	$labels[153] = 'Det nye kodeord skal være på mindst 5 karakterer';
	$labels[154] = 'Dit nye kodeord er gemt';
	$labels[155] = 'Nulstil alle positioner';
	$labels[156] = '#NUMBER# mulige kombinationer blev fundet !';
	$labels[157] = 'Sælger';
	$labels[158] = 'Køber';
	$labels[159] = 'Pris';
	$labels[160] = 'Ingen transfere blev fundet';
	$labels[161] = 'tidligere spiller';
	$labels[162] = 'Totalt køb:';
	$labels[163] = 'Gennemsnit (købt):';
	$labels[164] = 'Totalt salg:';
	$labels[165] = 'Gennemsnit (solgt):';
	$labels[166] = 'Forskel:';
	$labels[167] = 'Gennemsnit (købt+solgt):';
	$labels[168] = 'Antal transfere:';
	$labels[169] = 'Klik her for træningshistorik';
	$labels[170] = 'Noter';
	$labels[171] = 'Gem noter';
	$labels[172] = 'Tilmeld gratis!';
	$labels[173] = 'Vis denne spiller til landstræneren !';
	$labels[174] = 'Skjul denne spiller for landstræneren !';

	$nat_match_types[1]	= 'Kvalifikation';
	$nat_match_types[2]	= 'Venskabskamp';
	$tlabels[NTEAM]					= $_SESSION['natteam'];
	$tlabels[SCREENSHOOTS]			= 'Skærmprint';
	$tlabels[NTEAMPLAYERS]			= 'Spillere';
	$tlabels[NTEAMMATCHES]			= 'Kampe';
	$tlabels[NTEAMDOWNLOAD]			= 'Download';
	$tlabels[GM]					= 'Game master';
	$tlabels[GMCOUNTRIES]			= 'Lande';

	$labels[175] = 'Hent landsholdsdata';
	$labels[176] = 'Desværre, kun landstrænere kan hente disse data';
?>