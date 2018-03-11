<?
$match_status['UPCOMING'] = 'Programat'; //what should be translated is 'Upcoming' (same goes for all cases below)
$match_status['ONGOING'] = 'În desfășurare';
$match_status['FINISHED'] = 'Terminat'; //expression for completed match

$training_intensity[0] = 'lejer (15h/săptămână)';
$training_intensity[1] = 'normal (25h/săptămână)';
$training_intensity[2] = 'intens (30h/săptămână)';
$training_intensity[3] = 'imens (40h/săptămână)';

$training_types[1] = 'Posesie';
$training_types[2] = 'Viteză';
$training_types[3] = 'Pase';
$training_types[4] = 'Dribling';
$training_types[5] = 'Recuperări';
$training_types[6] = 'Poziționare';
$training_types[7] = 'Aruncare';
$training_types[8] = 'Aruncări libere';
$training_types[9] = 'Apărare';

$match_label["W"] = 'V'; //win
$match_label["L"] = 'Î'; //lose
$match_label["D"] = 'E'; //draw

$nat_match_types[1] = 'Calificări';
$nat_match_types[2] = 'Amical';
$nat_match_types[3] = 'Cupa Mondială';
$nat_match_types[4] = 'Cupa Mondială';
$nat_match_types[11] = 'Calificări';
$nat_match_types[12] = 'Amical';
$nat_match_types[13] = 'Cupa Mondială';
$nat_match_types[14] = 'Cupa Mondială';

$match_types[0] = 'Necunoscut';
$match_types[1] = 'Ligă';
$match_types[2] = 'Amical';
$match_types[3] = 'Cupă';
$match_types[4] = 'Baraj';
$match_types[5] = 'Fair Play Cup'; //you can keep original name
$match_types[6] = 'Internațional';
$match_types[7] = 'Internațional';
$match_types[18] = 'Tineret';
$match_types[19] = 'Youth Club WC'; //try not to use too long translation

$def_strategy[0] = 'normal';
$def_strategy[1] = 'replieri rapide';
$def_strategy[2] = 'blochează fiecare aruncare';
$def_strategy[3] = 'blochează și recuperează';
$def_strategy[4] = 'apărare pe semicerc';
$def_strategy[5] = 'obosește adversarul';
$def_strategy[6] = 'apărare om la om';

$off_strategy[0] = 'normal';
$off_strategy[1] = 'citește defensiva';
$off_strategy[2] = 'contraatacuri rapide';
$off_strategy[3] = 'aruncări de la distanță';
$off_strategy[4] = 'încearcă să pătrunzi';
$off_strategy[5] = 'recuperează ofensiv';
$off_strategy[6] = 'aruncări din semicerc';

$quarters[1] = 'Primul sfert se termină. Rezultatul este:';
$quarters[2] = 'Al doilea sfert se termină. Rezultatul este:';
$quarters[3] = 'Al treilea sfert se termină. Rezultatul este:';
$quarters[4] = 'Meciul s-a terminat. Rezultatul final este:';

$arch_match[ONEMONTH] = '1 lună';
$arch_match[TWOMONTHS] = '2 luni';
$arch_match[THREEMONTHS] = '3 luni';
$arch_match[SIXMONTHS] = '6 luni';
$arch_match[NINEMONTHS] = '9 luni';
$arch_match[ONEYEAR] = '1 an';

$tlabels[BAMANAGER] = "BAManager {$BAMVER}"; //don't translate this, just leave it as it is
$tlabels[TEAM] = $_SESSION["teamname"]; //don't translate this, just leave it as it is
$tlabels[NTEAM] = $_SESSION['natteam']; //don't translate this, just leave it as it is
$tlabels[BASKETSIM] = "Basketsim"; //don't translate this

$tlabels[SCREENSHOOTS] = 'Capturi de ecran';
$tlabels[LOGIN] = 'Logare';
$tlabels[REGISTER] = 'Înregistrare';
$tlabels[BAMABOUT] = 'Despre';
$tlabels[BAMCONTACT] = 'Contact';
$tlabels[BAMNEWS] = 'Știri';
$tlabels[LOGOUT] = 'Ieșire';
$tlabels[TEAMPLAYERS] = 'Jucători';
$tlabels[TEAMMATCHES] = 'Meciuri';
$tlabels[TEAMTRANSFERHISTORY] = 'Istoria transferurilor';
$tlabels[TEAMTRAININGHISTORY] = 'Istoria antrenamentului';
$tlabels[NTEAMPLAYERS] = 'Jucători';
$tlabels[NTEAMMATCHES] = 'Meciuri';
$tlabels[NTEAMDOWNLOAD] = 'Download';
//$tlabels[NTEAMSUGGESTIONS] = 'Propuneri';
$tlabels[SETTINGS] = 'Setări';
$tlabels[SETGENERAL] = 'General';
$tlabels[SETCOLUMNS] = 'Coloane';
$tlabels[SETWEIGHTS] = 'Greutate';
$tlabels[TEAMDETAILS] = 'Panou de control';
$tlabels[TOOLS] = 'Unelte';
$tlabels[TOOLS_B5] = 'Cel mai bun 5';
$tlabels[TOOLS_BPOS] = 'Cea mai bună poziție';
$tlabels[ONLINE] = 'Download';
$tlabels[ONLINETEAMDATA] = 'Date echipă';
$tlabels[ONLINETEAMMATCHES] = 'Meciuri';
$tlabels[MSG] = 'Mesaje';
$tlabels[MSGINBOX] = 'Inbox';
$tlabels[MSGOUTBOX] = 'Mesaje trimise';
$tlabels[MSGWRITE] = 'Mesaj nou';
$tlabels[GM] = 'Gamemaster';
$tlabels[GMCOUNTRIES] = 'Țări';

$tcolumns["name"] = 'Nume';
$tcolumns["onsale"] = 'De vânzare';
$tcolumns["injury"] = 'Accidentare';
$tcolumns["country"] = 'Țară';
$tcolumns["age"] = 'Vârstă';
$tcolumns["wage"] = 'Salariu';
$tcolumns["rating_last"] = 'Ultima performanță';
$tcolumns["rating_best"] = 'Cea mai bună performanță';
$tcolumns["rating_average"] = 'Medie performanță'; //make sure not to use too long expression!
$tcolumns["ballhandling"] = 'Posesie';
$tcolumns["quickness"] = 'Viteză';
$tcolumns["passing"] = 'Pase';
$tcolumns["dribbling"] = 'Dribling';
$tcolumns["rebounding"] = 'Recuperări';
$tcolumns["positioning"] = 'Poziționare';
$tcolumns["shooting"] = 'Aruncare';
$tcolumns["freethrows"] = 'Aruncări libere';
$tcolumns["defense"] = 'Apărare';
$tcolumns["workrate"] = 'Ritmul de lucru';
$tcolumns["experience"] = 'Experiență';
$tcolumns["tiredness"] = 'Extenuare';
$tcolumns["coach"] = 'Antrenor';
$tcolumns["characterr"] = 'Caracter';
$tcolumns["height"] = 'Înălțime';
$tcolumns["weight"] = 'Greutate';
$tcolumns["2p"] = '2P';
$tcolumns["3p"] = '3P';
$tcolumns["ft"] = 'AL';
$tcolumns["reb"] = 'REC';
$tcolumns["pf"] = 'GP';
$tcolumns["opf"] = 'GPO';
$tcolumns["assists"] = 'PD';
$tcolumns["steals"] = 'IT';
$tcolumns["turnovers"] = 'ER';
$tcolumns["sf_pos"] = 'SF';
$tcolumns["pf_pos"] = 'PF';
$tcolumns["c_pos"] = 'C';
$tcolumns["pg_pos"] = 'PG';
$tcolumns["sg_pos"] = 'SG';
$tcolumns["playerid"] = 'ID jucător';

//for some of the expressions below type again the same translations as above

$tcolumnsdesc["name"] = 'Nume';
$tcolumnsdesc["onsale"] = 'De vânzare';
$tcolumnsdesc["injury"] = 'Accidentare';
$tcolumnsdesc["country"] = 'Țară';
$tcolumnsdesc["age"] = 'Vârstă';
$tcolumnsdesc["wage"] = 'Salariu';
$tcolumnsdesc["rating_last"] = 'Ultima performanță';
$tcolumnsdesc["rating_best"] = 'Cea mai bună performanță';
$tcolumnsdesc["rating_average"] = 'Medie performanță';
$tcolumnsdesc["ballhandling"] = 'Posesie';
$tcolumnsdesc["quickness"] = 'Viteză';
$tcolumnsdesc["passing"] = 'Pase';
$tcolumnsdesc["dribbling"] = 'Dribling';
$tcolumnsdesc["rebounding"] = 'Recuperări';
$tcolumnsdesc["positioning"] = 'Poziționare';
$tcolumnsdesc["shooting"] = 'Aruncare';
$tcolumnsdesc["freethrows"] = 'Aruncări libere'; //make sure not to use too long expression!
$tcolumnsdesc["defense"] = 'Apărare';
$tcolumnsdesc["workrate"] = 'Ritmul de lucru';
$tcolumnsdesc["experience"] = 'Experiență';
$tcolumnsdesc["tiredness"] = 'Extenuare';
$tcolumnsdesc["coach"] = 'Antrenor';
$tcolumnsdesc["characterr"] = 'Caracter';
$tcolumnsdesc["height"] = 'Înălțime';
$tcolumnsdesc["weight"] = 'Greutate';
$tcolumnsdesc["c_pos"] = 'Center';
$tcolumnsdesc["pf_pos"] = 'Power Forward';
$tcolumnsdesc["sf_pos"] = 'Small Forward';
$tcolumnsdesc["sg_pos"] = 'Shooting Guard';
$tcolumnsdesc["pg_pos"] = 'Point Guard';
$tcolumnsdesc["2p"] = '2 Puncte';
$tcolumnsdesc["3p"] = '3 Puncte';
$tcolumnsdesc["ft"] = 'Aruncări libere';
$tcolumnsdesc["reb"] = 'Recuperări';
$tcolumnsdesc["pf"] = 'Greșeli personale';
$tcolumnsdesc["opf"] = 'Greșeli personale ofensive';
$tcolumnsdesc["assists"] = 'Pase decisive';
$tcolumnsdesc["steals"] = 'Intercepții';
$tcolumnsdesc["turnovers"] = 'Erori';
$tcolumnsdesc["playerid"] = 'ID jucător';

//below are two letter acronyms presenting Basketsim skills, if you will translate them, do it according to how you've translated skill names above

$tcolumnsshort["ballhandling"] = 'PO';
$tcolumnsshort["quickness"] = 'VI';
$tcolumnsshort["passing"] = 'PA';
$tcolumnsshort["dribbling"] = 'DB';
$tcolumnsshort["rebounding"] = 'REC';
$tcolumnsshort["positioning"] = 'POS';
$tcolumnsshort["shooting"] = 'AR';
$tcolumnsshort["freethrows"] = 'AL';
$tcolumnsshort["defense"] = 'AP';
$tcolumnsshort["workrate"] = 'RL';
$tcolumnsshort["experience"] = 'XP';
$tcolumnsshort["characterr"] = 'CA';

/*
below use the same expressions as they are used in your local Basketsim translation
(if you think these translation should be improved, you can use improved version here, but contact me so I can update your translation file!)
*/
$skills[0] = 'zero';
$skills[1] = 'patetic';
$skills[2] = 'teribil';
$skills[3] = 'jalnic';
$skills[4] = 'sub medie';
$skills[5] = 'mediu';
$skills[6] = 'peste medie';
$skills[7] = 'bun';
$skills[8] = 'foarte bun';
$skills[9] = 'excelent';
$skills[10] = 'impresionant';
$skills[11] = 'fantastic';
$skills[12] = 'uluitor';
$skills[13] = 'extraordinar';
$skills[14] = 'magic';
$skills[15] = 'perfect';

$character[0] = 'stabil';
$character[1] = 'amuzant';
$character[2] = 'calm';
$character[3] = 'agresiv';
$character[4] = 'controversat';
$character[5] = 'egoist';

$tiredness[0] = 'energic';
$tiredness[1] = 'proaspăt';
$tiredness[2] = 'obosit';
$tiredness[3] = 'foarte obosit';
$tiredness[4] = 'extrem de obosit';
$tiredness[5] = 'scurs';
$tiredness[6] = 'epuizat';

/*
in some of the expressions below you will notice links, just translate the text and leave links exactly as they are
in some of the expressions below you will notice markers like #COL# or <br/> - don't translate or change them, always translate text only!
*/
$labels[1] = 'Bine ați venit!';
$labels[2] = 'Ce este Basketsim Assistant Manager?<br/>Un software gratuit pentru a vă ajuta în administrarea echipei!';
$labels[3] = 'Cum vă puteți înscrie?';
$labels[4] = "Foarte simplu! Trebuie doar să vă înregistrați pe <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a>.<br/>După ce primiți o echipă acolo <a href=\"index.php?tab=register&mainpage=register\"><b>vă puteți înregistra pentru BAM </b></a> și îl puteți utiliza!";
$labels[5] = "Această aplicație utilizează informații din jocul online <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>Utilizarea ei a fost aprobată de către dezvoltatorii și deținătorii <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
$labels[6] = 'Înregistrare echipă';
$labels[7] = 'Setați parola ce va fi utilizată pe acest site:';
$labels[8] = 'Parola';
$labels[9] = ' * Parola trebuie sa fie diferită de cea utilizată pe site-ul basketsim.com';
$labels[10] = 'Adresa e-mail';
$labels[11] = 'Verificare date echipă';
$labels[12] = "Această operațiune este necesară pentru a preveni ca alții să utilizeze datele echipei voastre. Această operațiune este aprobată de Basketsim, iar datele voastre de logare nu sunt stocate pe BAM!";
$labels[13] = 'User Basketsim';
$labels[14] = 'Cod CBPP';
$labels[15] = 'Atenție! Codul CBPP este diferit de parola voastră. Codul CBPP poate fi setat și schimbat pe site-ul Basketsim, în secțiunea Profil.';
$labels[16] = 'Completați toate câmpurile solicitate.';
$labels[17] = 'Parola trebuie să aibă minim 5 caractere';
$labels[18] = 'Eroare în comunicarea cu serverul Basketsim.';
$labels[19] = 'Eroare în autentificarea pe serverul Basketsim. Vă rugăm verificați dacă datele introduse sunt corecte.';
$labels[20] = 'S-a înregistrat o eroare în procesarea datelor descărcate. Vă rugăm contactați administratorul acestui site.';
$labels[21] = 'Echipa dumneavoastră este deja înregistrată.';
$labels[22] = 'Nu ați setat codul CBPP. Pentru a face asta, logați-vă pe site-ul Basketsim și consultați secțiunea Profil.';
$labels[23] = 'Eroare';
$labels[24] = 'Nume utilizator';
$labels[25] = 'Parolă';
$labels[26] = 'Parolă pierdută';
$labels[27] = 'ID echipă';
$labels[28] = 'Nume echipă';
$labels[29] = 'Nume scurt echipă';
$labels[30] = 'Țară';
$labels[31] = 'Nume ligă';
$labels[32] = 'Nu ați setat nici o coloană ca fiind vizibilă. Vă rugăm să vizitați secțiunea Setări pentru a face o coloană vizibilă';
$labels[33] = 'Coloană';
$labels[34] = 'Vizibilă';
$labels[35] = 'Dimensiune';
$labels[36] = 'Salvați schimbările';
$labels[37] = 'Cel puțin o coloană trebuie să fie vizibilă';
$labels[38] = 'Schimbările selectate au fost salvate';
$labels[39] = 'Doar valori numerice sunt acceptate pentru dimensiunea coloanelor';
$labels[40] = 'Trebuie să specificați dimensiunea pentru o coloană vizibilă';
$labels[41] = 'Valoarea 0 nu este acceptată ca dimensiune a unei coloane';
$labels[42] = 'Mesaje';
$labels[43] = 'Primul 5';
$labels[44] = 'Prioritate';
$labels[45] = 'Rezerve';
$labels[46] = 'Calculează cea mai bună echipă!';
$labels[47] = 'Dublu-click într-un tabel pentru a muta un jucător dintr-un tabel în altul';
$labels[48] = 'Pentru a actualiza datele echipei dumneavoastră, avem nevoie de următoarele informații';
$labels[49] = "Puteți vedea efectele greutății chiar <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><b>aici</b></a>";
$labels[50] = "Echipa dumneavoastră este deja înregistrată. Click <a href='./index.php?tab=team&mainpage=teamplayers'><b>aici</b></a> pentru a vizualiza detaliile.";
$labels[51] = "Dacă nu aveți încă un cont, vă puteți înregistra <a href=\"index.php?tab=register&mainpage=register\"><b>aici</b></a>!";
$labels[52] = "O eroare a fost înregistrată la procesarea XML-ului cu jucători.<BR>Vă rugăm, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>contactați</b></a> administratorul site-ului imediat.";
$labels[53] = 'Antrenor';
$labels[54] = 'Click pentru a sorta după #COL#';
$labels[55] = 'Informațiile de logare vor fi trimise la această adresă e-mail';
$labels[56] = 'Aș dori să utilizez valorile standard pentru : #POSITION#';
$labels[57] = "Apăsați aici dacă doriți să resetați valorile standard BAM pentru toate pozițiile";
$labels[58] = 'Abilitate';
$labels[59] = 'Greutate';
$labels[60] = 'Este activ';
$labels[61] = "Nu uitați să verificați secțiunea <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><b>știri</b></a> pentru a putea vizualiza ultimele noutăți.";
$labels[62] = 'Limbă';
$labels[63] = 'Afișați nivelul de abilitate ca';
$labels[64] = 'Text';
$labels[65] = 'Valori numerice';
$labels[66] = 'Eroare în salvarea setărilor generale';
$labels[67] = "O eroare a fost înregistrată la procesarea XML-ului cu jucători. <BR>Vă rugăm, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>contactați</b></a> administratorul site-ului imediat.";
$labels[68] = 'Dată meci';
$labels[69] = 'Tip meci';
$labels[70] = 'Echipe';
$labels[71] = 'Rezultat';
$labels[72] = 'Status';
$labels[73] = "Nu au fost găsite meciuri jucate de echipa dumneavoastră. Puteți descărca lista meciurilor chiar <a href='index.php?tab=online&mainpage=onlteamdata'><b>aici</b></a>";
$labels[74] = 'Apăsați aici pentru detalii meci';
$labels[75] = "* Notă – această operațiune va descărca, de asemenea, informații despre meciurile dumneavoastră din ultimele și următoarele 3 săptămâni. <br><b> Dacă doriți să descărcați arhiva meciurilor dumneavoastră, apăsați <a href='index.php?tab=online&mainpage=onlteammatches'>aici</a></b>";
$labels[76] = 'Descărcați meciurile din ultimele'; //referring to amount of time, for example "the last 6 months"
$labels[77] = 'Rating';
$labels[78] = 'Strategii';
$labels[79] = 'Bilete vândute';
$labels[80] = 'Peluză';
$labels[81] = 'Tribună';
$labels[82] = 'Balcon';
$labels[83] = 'Secțiunea VIP';
$labels[84] = 'Total';
$labels[85] = 'Sfert';
$labels[86] = 'Înapoi';
$labels[87] = 'Scor';
$labels[88] = 'Recuperări';
$labels[89] = 'Pase decisive';
$labels[90] = 'Greșeli personale';
$labels[91] = 'Intercepții';
$labels[92] = 'Erori';
$labels[93] = 'Blocaje';
$labels[94] = 'Nume jucător';
$labels[95] = 'Echipa dumneavoastră nu pare a fi înregistrată. Vă rugăm, utilizați pagina de înregistrare.';
$labels[96] = 'Dumneavoastră (sau altcineva) ați solicitat o parolă pentru a o utiliza la conectarea pe www.bamanager.net .';
$labels[97] = 'Recuperare parolă bamanager.net';
$labels[98] = 'Parola a fost trimisă';
$labels[99] = 'Eroare la trimiterea parolei. Vă rugăm să încercați din nou.';
$labels[100] = 'Datele echipei dumneavoastră se descarcă, vă rugăm așteptați...';
$labels[101] = 'Trimite parola mea BAM';
$labels[102] = "Apăsați aici pentru a vedea detaliile jucătorului";
$labels[103] = '#age# ani din #country#. #height# cm, #weight# kg.';
$labels[104] = 'Acest jucător este #caracter#. Câștigă #wage# &euro; / săptămână.';
$labels[105] = 'Evoluție antrenament';
$labels[106] = 'Listă jucători';
$labels[107] = 'Anteriorul';
$labels[108] = 'Următorul';
$labels[109] = 'General';
$labels[110] = 'Abilități';
$labels[111] = 'Ne pare rău, dar nu am găsit date despre antrenament. Poate nu ați descărcat ultimele date. Puteți descărca ultimele date vizitând secțiunea Download -> Date echipă. ';
$labels[112] = 'Antrenament';
$labels[113] = "Acest jucător nu are antrenamente înregistrate în baza de date BAM.";
$labels[114] = 'Dată antrenament';
$labels[115] = 'Tip antrenament';
$labels[116] = 'Poziție';
$labels[117] = 'Stele';
$labels[118] = "Acest jucător nu are încă meciuri înregistrate pentru echipa dumneavoastră.";
$labels[119] = 'Guards';
$labels[120] = 'Big men';
$labels[121] = 'Intensitate';
$labels[122] = 'nici o informație';
$labels[123] = 'Detalii echipă';
$labels[124] = 'Informații antrenament';
$labels[125] = 'Vă mulțumim că ați utilizat BAM, #USERNAME#.';
$labels[126] = 'STATISTICI';
$labels[127] = 'Utilizatori activi';
$labels[128] = 'Jucători urmăriți';
$labels[129] = 'Meciuri descărcate';
$labels[130] = 'Utilizatori online';
$labels[131] = 'Este FREE';
$labels[132] = 'Nu am găsit nici un mesaj';
$labels[133] = 'Către';
$labels[134] = 'Subiect';
$labels[135] = 'Mesaj';
$labels[136] = 'Trimite';
$labels[137] = 'Introduceți destinatarul';
$labels[138] = 'Introduceți subiectul';
$labels[139] = 'Introduceți textul mesajului';
$labels[140] = "Utilizatorul nu există";
$labels[141] = 'De la';
$labels[142] = 'Dată';
$labels[143] = 'Citește mesaj';
$labels[144] = 'Răspuns';
$labels[145] = 'Preferințe';
$labels[146] = 'Schimbare parolă';
$labels[147] = 'Vechea parolă';
$labels[148] = 'Noua parolă';
$labels[149] = 'Confirmă noua parolă';
$labels[150] = 'Schimbă parola';
$labels[151] = 'Parola veche specificată nu este parola dumneavoastră curentă';
$labels[152] = 'Noua parolă este diferită de noua parolă confirmată';
$labels[153] = 'Noua parolă trebuie să aibă minim 5 caractere';
$labels[154] = 'Noua parolă a fost salvată';
$labels[155] = 'Resetați toate pozițiile';
$labels[156] = '#NUMBER# combinații posibile au fost găsite!';
$labels[157] = 'Vânzător';
$labels[158] = 'Cumpărător';
$labels[159] = 'Preț';
$labels[160] = 'Nu am găsit transferuri';
$labels[161] = 'Jucător retras';
$labels[162] = 'Total cumpărări:';
$labels[163] = 'Medie (cumpărări):';
$labels[164] = 'Total vânzări:';
$labels[165] = 'Medie (vânzări):';
$labels[166] = 'Diferență:';
$labels[167] = 'Medie (cumpărări+vânzări):';
$labels[168] = 'Număr transferuri:';
$labels[169] = 'Apăsați aici pentru istoria transferurilor';
$labels[170] = 'Note';
$labels[171] = 'Salvați notă';
$labels[172] = 'Înregistrați-vă gratis!';
$labels[173] = 'Arătați jucătorul antrenorului naționalei!';
$labels[174] = 'Ascundeți detaliile jucătorului pentru antrenorul naționalei!';
$labels[175] = 'Descărcați datele echipei naționale';
$labels[176] = 'Ne pare rău, nu sunteți antrenor de națională și nu puteți descărca aceste date';
$labels[177] = 'Progres abilități';
$labels[178] = 'Logări astăzi';
?>