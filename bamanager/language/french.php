<?
 $training_intensity[0] = 'léger (15h/semaine)';
 $training_intensity[1] = 'normal (25h/semaine)';
 $training_intensity[2] = 'intense (30h/semaine)';
 $training_intensity[3] = 'immense (40h/semaine)';
 
 $training_types[1] = 'Maniement';
 $training_types[2] = 'Vitesse';
 $training_types[3] = 'Passe';
 $training_types[4] = 'Dribble';
 $training_types[5] = 'Rebonds';
 $training_types[6] = 'Positionnement';
 $training_types[7] = 'Tirs';
 $training_types[8] = 'Lancers francs';
 $training_types[9] = 'Defense';
 $training_types[10] = 'Poids gagné';
 $training_types[11] = 'Poids perdu';
 
 $match_label["W"] = 'V'; //victoire
 $match_label["L"] = 'D'; //défaite
 $match_label["D"] = 'N'; //nul
 
 $nat_match_types[1] = 'Qualification';
 $nat_match_types[2] = 'Amical';
 
 $match_types[0] = 'Non défini';
 $match_types[1] = 'Ligue';
 $match_types[2] = 'Amical';
 $match_types[3] = 'Coupe';
 $match_types[4] = 'Play Off';
 $match_types[5] = 'Fair Play Coupe';
 $match_types[19] = 'Youth Club WC';
 
 $match_status['FINISHED'] = 'Fini';
 $match_status['UPCOMING'] = 'A venir';
 $match_status['ONGOING'] = 'En cours';
 
 $def_strategy[0] = 'normal';
 $def_strategy[1] = 'retour rapide en défense';
 $def_strategy[2] = 'contester chaque tir';
 $def_strategy[3] = 'blocs hors raquette et rebonds';
 $def_strategy[4] = 'proteger la raquette';
 $def_strategy[5] = 'presser les adversaires';
 $def_strategy[6] = 'half court trap';
 
 $off_strategy[0] = 'normal';
 $off_strategy[1] = 'comprendre la défense';
 $off_strategy[2] = 'contre attaques rapides';
 $off_strategy[3] = 'tirs à distance';
 $off_strategy[4] = 'pénétrer la raquette';
 $off_strategy[5] = 'jouer les rebonds offensifs';
 $off_strategy[6] = 'inside shooting';
 
 $quarters[1] = 'Le premier quart temps est terminé. Le résultat est:';
 $quarters[2] = 'Le second quart temps est terminé. Le résultat est:';
 $quarters[3] = 'Le troisième quart temps est terminé. Le résultat est:';
 $quarters[4] = 'Le match est fini maintenant. Le score final est:';
 
 $arch_match[ONEMONTH]    = '1 mois';
 $arch_match[TWOMONTHS]    = '2 mois';
 $arch_match[THREEMONTHS]   = '3 mois';
 $arch_match[SIXMONTHS]    = '6 mois';
 $arch_match[NINEMONTHS]    = '9 mois';
 $arch_match[ONEYEAR]    = '1 an';
 
 $tlabels[SCREENSHOOTS]   = "Captures d'écrans";
 $tlabels[LOGIN]     = 'Identification';
 $tlabels[REGISTER]    = 'Enregistrement';
 $tlabels[BASKETSIM]    = "Basketsim";
 $tlabels[BAMANAGER]    = "BAManager {$BAMVER}";
 $tlabels[BAMABOUT]    = 'A propos';
 $tlabels[BAMCONTACT]   = 'Contact';
 $tlabels[BAMNEWS]    = 'Nouvelles';
 $tlabels[LOGOUT]    = 'Logout';
 $tlabels[TEAM]     = $_SESSION["teamname"];
 $tlabels[TEAMPLAYERS]   = 'Joueurs';
 $tlabels[TEAMMATCHES]   = 'Matchs';
 $tlabels[TEAMTRANSFERHISTORY] = 'Historique des transferts';
 $tlabels[TEAMTRAININGHISTORY] = "Historique d'entrainement";
 $tlabels[NTEAM]     = $_SESSION['Equipe nationale'];
 $tlabels[NTEAMPLAYERS]   = 'Joueurs';
 $tlabels[NTEAMMATCHES]   = 'Matchs';
 $tlabels[NTEAMDOWNLOAD]   = 'Mise à jour';
 //$tlabels[NTEAMSUGGESTIONS]  = 'Propositions';
 $tlabels[SETTINGS]    = 'Préférences';
 $tlabels[SETGENERAL]   = 'Général';
 $tlabels[SETCOLUMNS]   = 'Colonnes';
 $tlabels[SETWEIGHTS]   = 'Poids';
 $tlabels[TEAMDETAILS]   = 'Tableau de bord';
 $tlabels[TOOLS]     = 'Outils';
 $tlabels[TOOLS_B5]    = 'Top 5';
 $tlabels[TOOLS_BPOS]   = 'Meilleure position';
 $tlabels[ONLINE]    = 'Mise à jour';
 $tlabels[ONLINETEAMDATA]  = "Données de l'équipe";
 $tlabels[ONLINETEAMMATCHES]  = 'Matchs';
 $tlabels[MSG]     = 'Boîte aux lettres';
 $tlabels[MSGINBOX]    = 'Messages reçus';
 $tlabels[MSGOUTBOX]    = 'Messages envoyés';
 $tlabels[MSGWRITE]    = 'Ecrire un message';
 $tlabels[GM]     = 'Game master';
 $tlabels[GMCOUNTRIES]   = 'Pays';
 
 $tcolumns["name"]    = 'Nom';
 $tcolumns["onsale"]    = 'A vendre'; //
 $tcolumns["injury"]    = 'Blessure'; //
 $tcolumns["country"]   = 'Pays'; //
 $tcolumns["age"]    = 'Age';
 $tcolumns["wage"]    = 'Salaire';
 $tcolumns["rating_last"]  = 'Performance (dernière)';
 $tcolumns["rating_best"]  = 'Performance (meilleure)';
 $tcolumns["rating_average"]  = 'Performance (Moyenne)';
 $tcolumns["ballhandling"]  = 'Maniement';
 $tcolumns["quickness"]   = 'Vitesse';
 $tcolumns["passing"]   = 'Passe';
 $tcolumns["dribbling"]   = 'Dribble';
 $tcolumns["rebounding"]   = 'Rebond';
 $tcolumns["positioning"]  = 'Positionnement';
 $tcolumns["shooting"]   = 'Tirs';
 $tcolumns["freethrows"]   = 'Lancers francs';
 $tcolumns["defense"]   = 'Défense';
 $tcolumns["workrate"]   = 'Capacité de travail';
 $tcolumns["experience"]   = 'Expérience';
 $tcolumns["tiredness"]   = 'Fatigue';
 $tcolumns["coach"]    = 'Coach'; //
 $tcolumns["characterr"]   = 'Caractère';
 $tcolumns["height"]    = 'Taille';
 $tcolumns["weight"]    = 'Poids';
 $tcolumns["2p"]     = '2P';
 $tcolumns["3p"]     = '3P';
 $tcolumns["ft"]     = 'LF';
 $tcolumns["reb"]    = 'REB';
 $tcolumns["pf"]     = 'FP';
 $tcolumns["opf"]    = 'FPO';
 $tcolumns["assists"]   = 'PD';
 $tcolumns["steals"]    = 'INT';
 $tcolumns["turnovers"]   = 'BP';
 $tcolumns["sf_pos"]    = 'SF';
 $tcolumns["pf_pos"]    = 'PF';
 $tcolumns["c_pos"]    = 'C';
 $tcolumns["pg_pos"]    = 'PG';
 $tcolumns["sg_pos"]    = 'SG';
 $tcolumns["playerid"]   = 'Player ID';
 
 $tcolumnsshort["ballhandling"]  = 'MB';
 $tcolumnsshort["quickness"]   = 'VI';
 $tcolumnsshort["passing"]   = 'PS';
 $tcolumnsshort["dribbling"]   = 'DB';
 $tcolumnsshort["rebounding"]  = 'RB';
 $tcolumnsshort["positioning"]  = 'PO';
 $tcolumnsshort["shooting"]   = 'TI';
 $tcolumnsshort["freethrows"]  = 'LF';
 $tcolumnsshort["defense"]   = 'DF';
 $tcolumnsshort["workrate"]   = 'CT';
 $tcolumnsshort["experience"]  = 'XP';
 $tcolumnsshort["characterr"]  = 'CAR';
 
 ////////////////////////
 $tcolumnsdesc["name"]    = 'Nom';
 $tcolumnsdesc["onsale"]    = 'A vendre'; //
 $tcolumnsdesc["injury"]    = 'Blessure'; //
 $tcolumnsdesc["country"]   = 'Pays'; //
 $tcolumnsdesc["age"]    = 'Age';
 $tcolumnsdesc["wage"]    = 'Salaire';
 $tcolumnsdesc["rating_last"]  = 'Performance (dernière)';
 $tcolumnsdesc["rating_best"]  = 'Performance (meilleure)';
 $tcolumnsdesc["rating_average"]  = 'PerformanceRating (Moyenne)';
 $tcolumnsdesc["ballhandling"]  = 'Maniement';
 $tcolumnsdesc["quickness"]   = 'Vitesse';
 $tcolumnsdesc["passing"]   = 'Passe';
 $tcolumnsdesc["dribbling"]   = 'Dribble';
 $tcolumnsdesc["rebounding"]   = 'Rebond';
 $tcolumnsdesc["positioning"]  = 'Positionnement';
 $tcolumnsdesc["shooting"]   = 'Tirs';
 $tcolumnsdesc["freethrows"]   = 'Lancer Francs';
 $tcolumnsdesc["defense"]   = 'Défense';
 $tcolumnsdesc["workrate"]   = 'Capacité de travail';
 $tcolumnsdesc["experience"]   = 'Expérience';
 $tcolumnsdesc["tiredness"]   = 'Fatigue';
 $tcolumnsdesc["coach"]    = 'Coach'; //
 $tcolumnsdesc["characterr"]   = 'Caractère';
 $tcolumnsdesc["height"]    = 'Taille';
 $tcolumnsdesc["weight"]    = 'Poids';
 $tcolumnsdesc["c_pos"]    = 'Center';
 $tcolumnsdesc["pf_pos"]    = 'Power Forward';
 $tcolumnsdesc["sf_pos"]    = 'Small Forward';
 $tcolumnsdesc["sg_pos"]    = 'Shooting Guard';
 $tcolumnsdesc["pg_pos"]    = 'Point Guard';
 $tcolumnsdesc["2p"]     = '2 Points';
 $tcolumnsdesc["3p"]     = '3 Points';
 $tcolumnsdesc["ft"]     = 'Lancers Francs';
 $tcolumnsdesc["reb"]    = 'Rebond';
 $tcolumnsdesc["pf"]     = 'Fautes personnelles';
 $tcolumnsdesc["opf"]    = 'Fautes personnelles offensives';
 $tcolumnsdesc["assists"]   = 'Passes décisives';
 $tcolumnsdesc["steals"]    = 'Interceptions';
 $tcolumnsdesc["turnovers"]   = 'Balles perdues';
 $tcolumnsdesc["playerid"]   = 'Player ID';
//////////////////////
 
 $skills[0] = 'nul';
 $skills[1] = 'pathétique';
 $skills[2] = 'mauvais';
 $skills[3] = 'médiocre';
 $skills[4] = 'faible';
 $skills[5] = 'moyen';
 $skills[6] = 'correct';
 $skills[7] = 'bon';
 $skills[8] = 'très bon';
 $skills[9] = 'super';
 $skills[10] = 'excellent';
 $skills[11] = 'fantastique';
 $skills[12] = 'phénoménal';
 $skills[13] = 'extra-ordinaire';
 $skills[14] = 'magique';
 $skills[15] = 'parfait';
 
 $tiredness[0] = 'énergique';
 $tiredness[1] = 'frais';
 $tiredness[2] = 'fatigué';
 $tiredness[3] = 'très fatigué';
 $tiredness[4] = 'extrêmement fatigué';
 $tiredness[5] = 'épuisé';
 $tiredness[6] = 'exténué';
 
 $character[0] = 'stable';
 $character[1] = 'motivant';
 $character[2] = 'calme';
 $character[3] = 'aggressif';
 $character[4] = 'controversé';
 $character[5] = 'égoïste';
 
 $labels[1] = 'Bienvenue !';
 $labels[2] = "Qu'est ce que c'est Basketsim Assistant Manager ? Un outil GRATUIT destiné à vous aider dans la gestion de votre équipe.";
 $labels[3] = 'Comment faire pour participer ?';
 $labels[4] =  "Rien de plus facile. Tout ce que vous devez faire est de vous enregistrer sur le site de <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a> . Une fois que vous aurez reçu votre équipe vous pourrez vous <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>enregistrer</b></font></a>.";
 $labels[5] = "Cette application utilise des informations du jeu en ligne <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br> Cette utilisation a été approuvée et référencée par les créateurs de <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
 $labels[6] = "Enregistrement de l'équipe";
 $labels[7] = 'Spécifier le mot de passe utilisé sur le site de Basket Assistant Manager site';
 $labels[8] = 'Mot de passe';
 $labels[9] = ' * Ce mot de passe doit être différent de celui utilisé sur le site de Basketsim.com';
 $labels[10] = 'Votre email';
 $labels[11] = "Verification des données d'équipe";
 $labels[12] = "Cette vérification est nécessaire afin de contrôler que personne d'autre n'utilise votre équipe. Nous vous rappelons que, selon les règles de CBPP, cette information ne sera pas conservée. Ceci est approuvé par Basketsim.";
 $labels[13] = 'Utilisateur Basketsim';
 $labels[14] = 'CBPP Code';
 $labels[15] = "Attention ! Le code CBPP n'est pas le même que votre mot de passe habituel. Le code CBPP code peut être changé dans la section Profile de BS. Si vous utilisez plusiseurs fois une fausse identification et code CBPP, votre compte sera bloqué pendant un moment.";
 $labels[16] = 'Complétez tous les champs requis.';
 $labels[17] = "Le mot de passe doit se composer d'au moins de 5 caractères";
 $labels[18] = 'Erreur en communiquant avec le serveur de Basketsim.';
 $labels[19] = "Erreur de l'authentification sur le serveur de Basketsim. Veuillez vérifier l'exactitude des données que vous avez introduites.";
 $labels[20] = "Il y avait une erreur sur l'analyse des données téléchargées. Svp, contactez l'administrateur de ce site.";
 $labels[21] = 'Votre équipe est déjà enregistrée.';
 $labels[22] = "Vous n'avez pas enregistré le code CBPP. Pour le faire, veuillez le compléter dans la section Profile sur le site de Basketsim.";
 $labels[23] = 'Erreur';
 $labels[24] = "Nom d'utilisateur";
 $labels[25] = 'Mot de passe';
 $labels[26] = 'Dernier mot de passe';
 $labels[27] = 'Equipe ID';
 $labels[28] = "Nom d'équipe";
 $labels[29] = "Abbréviation du nom d'équipe";
 $labels[30] = 'Pays';
 $labels[31] = 'Nom de la Ligue';
 $labels[32] = "Vous n'avez placé aucune colonne en tant que visible. Svp, visitez la section des préférences afin de rendre une colonne visible.";
 $labels[33] = 'Colonne';
 $labels[34] = 'Visible';
 $labels[35] = 'Largeur';
 $labels[36] = 'Sauvegarder les changements';
 $labels[37] = 'Au moins une des colonnes devrait être visible';
 $labels[38] = 'Les changements sélectionnés sont sauvegardés';
 $labels[39] = 'Seules les valeurs numériques sont acceptées pour la largeur des colonnes';
 $labels[40] = "Vous devez spécifier la largeur d'une colonne pour la voir";
 $labels[41] = "La valeur 0 n'est pas une largeur de colonne autorisée";
 $labels[42] = 'Messages';
 $labels[43] = '5 de départ';
 $labels[44] = 'Priorité';
 $labels[45] = 'Remplaçants';
 $labels[46] = 'Proposition du meilleur 5 majeur !';
 $labels[47] = "Faites un double clic dans une rangée de table pour déplacer un joueur d'une table à l'autre";
 $labels[48] = "Afin de mettre à jour vos données d'équipe nous avons besoin des informations demandées ci-dessous.";
 $labels[49] = "Vous pouvez voir les effets du poids <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><font size='+1'>ici</font></font></a>";
 $labels[50] = "Votre équipe est déjà enregistrée. Cliquer <a href='./index.php?tab=team&mainpage=teamplayers'><font size='+1'>ici</font></font></a> to see the details.";
 $labels[51] =  "Au cas où vous n'avez pas encore un compte, vous pouvez <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>enregistrer</b></font></a> votre équipe.";
 $labels[52] =  "Une erreur a été produite lors du processus d'analyse XML des joueurs. <BR>Veuillez, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><font size=\"+1\"><b>contacter</b></font></a> l'administrateur du site rapidement.";
 $labels[53] = 'Coach';
 $labels[54] = 'Cliquer pour trier par #COL#';
 $labels[55] = "Vos informations d'identification seront envoyées à cette adresse email";
 $labels[56] = "J'aimerai utiliser les réglages par défaut pour : #POSITION#";
 $labels[57] = "Cliquez ici si vous voulez restaurer les poids BAM par défaut pour toutes les positions";
 $labels[58] = 'Compétences';
 $labels[59] = 'Poids';
 $labels[60] = 'Est actif';
 $labels[61] =  "Ne pas oublier de vérifier les <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><font size=\"+1\"><b>nouvelles</b></font></a> pour rester au courant des dernières nouveautés.";
 $labels[62] = 'Langue';
 $labels[63] = 'Affichage des compétences sous forme de';
 $labels[64] = 'Texte';
 $labels[65] = 'Valeurs numériques';
 $labels[66] = 'Echec de la sauvegarde de vos préférences générales';
 $labels[67] =  "Une erreur a été produite lors du processus d'analyse XML des matchs. <BR>Veuillez, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><font size=\"+1\"><b>contacter</b></font></a> l'administrateur du site rapidement.";
 $labels[68] = 'Date du match';
 $labels[69] = 'Type de match';
 $labels[70] = 'Equipes';
 $labels[71] = 'Résultat';
 $labels[72] = 'Statut';
 $labels[73] = "Aucun match joué par votre équipe n'a été trouvé. Vous pouvez télécharger votre liste de matchs <a href='index.php?tab=online&mainpage=onlteamdata'><font size=\"+1\"><b>ici</b></font></a>";
 $labels[74] = 'Cliquer ici pour les détails du match';
 $labels[75] = "* Note - Cette opération téléchargera également des informations sur vos matchs joués par votre équipe lors des 3 dernières semaines. En outre, les matchs des 3 semaines suivantes seront enregistrés. Si vous voulez télécharger les archives de vos matchs cliquer <a href='index.php?tab=online&mainpage=onlteammatches'><font size=\"+1\"><b>ici</b></font></a>";
 $labels[76] = 'Télécharger les derniers matchs';
 $labels[77] = 'Performance';
 $labels[78] = 'Stratégies';
 $labels[79] = 'Places vendues';
 $labels[80] = 'Tribunes latérales';
 $labels[81] = 'Tribunes Centrales';
 $labels[82] = 'Balcons';
 $labels[83] = 'Loges VIP';
 $labels[84] = 'Total';
 $labels[85] = 'Quart temps';
 $labels[86] = 'Retour';
 $labels[87] = 'Score';
 $labels[88] = 'Rebonds';
 $labels[89] = 'Passes décisives';
 $labels[90] = 'Fautes';
 $labels[91] = 'Interceptions';
 $labels[92] = 'Balles perdues';
 $labels[93] = 'Contres';
 $labels[94] = 'Nom du joueur';
 $labels[95] = "Votre équipe semble ne pas être enregistrée. Veuillez utiliser la page d'inscription.";
 $labels[96] = "Vous ou quelqu'un d'autre a déjà utilisé votre mot de passe sur le site http://www.bamanager.org site.";
 $labels[97] = 'Rétablissement du mot de passe BAManager.org';
 $labels[98] = 'Le mot de passe a été envoyé';
 $labels[99] = "Erreur d'envoi du mot de passe. Veuillez réessayer svp.";
 $labels[100]= 'Téléchargement des données de votre équipe en cours, veuillez patienter ...';
 $labels[101]= 'Envoi de mon mot de passe BAM';
 $labels[102]= "Cliquer ici pour voir les détails des joueurs";
 $labels[103]= '#age# ans de #country#. #height# cm, #weight# kg.';
 $labels[104]= 'Ce joueur est #caracter#. Il gagne #wage# &euro; / semaine.';
 $labels[105]= "Evolution d'entraînement";
 $labels[106]= 'Liste des joueurs';
 $labels[107]= 'Précédent';
 $labels[108]= 'Suivant';
 $labels[109]= 'General';
 $labels[110]= 'Compétences';
 $labels[111]= "Désolé, mais je n'ai pas trouvé d'informations d'entraînement. Vous n'avez peut être pas télécharger les dernières données. Vous pouvez les obtenir en allant les Télécharger dans -> Section données d'équipe.";
 $labels[112]= 'Entraînement';
 $labels[113]= "Ce joueur n'a suivi aucun entraînement jusque là.";
 $labels[114]= "Date d'entraînement";
 $labels[115]= "Type d'entraînement";
 $labels[116]= 'Position';
 $labels[117]= 'Etoiles';
 $labels[118]= "Ce joueur n'a joué aucun match pour votre équipe.";
 $labels[119]= 'Arrières';
 $labels[120]= 'Ailiers et pivot';
 $labels[121]= 'Intensité';
 $labels[122]= "pas d'informations";
 $labels[123]= "Détails d'équipe";
 $labels[124]= "Informations d'entraînement";
 $labels[125]= "Merci d'utiliser BAM, #USERNAME#.";
 $labels[126]= 'STATISTIQUES';
 $labels[127]= 'Utilisateurs actifs';
 $labels[128]= 'Joueurs suivis';
 $labels[129]= 'Matchs enregistrés';
 $labels[130]= 'Utilisateurs en ligne';
 $labels[131]= "C'est GRATUIT";
 $labels[132]= 'Aucun message trouvé';
 $labels[133]= 'A';
 $labels[134]= 'Sujet';
 $labels[135]= 'Message';
 $labels[136]= 'Envoi';
 $labels[137] = 'Complétez le destinataire';
 $labels[138] = 'Complétez le sujet';
 $labels[139] = 'Complétes le corps du message';
 $labels[140] = "L'utilisateur n'existe pas";
 $labels[141] = 'De';
 $labels[142] = 'Date';
 $labels[143] = 'Lire le message';
 $labels[144] = 'Répondre';
 $labels[145] = 'Préférences';
 $labels[146] = 'Changer le mot de passe';
 $labels[147] = 'Ancien mot de passe';
 $labels[148] = 'Nouveau mot de passe';
 $labels[149] = 'Confirmer le nouveau mot de passe';
 $labels[150] = 'Changer mon mot de passe';
 $labels[151] = "L'ancien mot de passe cité n'est pas votre mot de passe actuel";
 $labels[152] = 'Le mot de passe est différent confirmer le nouveau mot de passe';
 $labels[153] = 'Le nouveau mot de passe doit contenir au moins 5 caractères';
 $labels[154] = 'Votre nouveau mot de passe est enregistré';
 $labels[155] = 'Remise à zéro des positions';
 $labels[156] = '#NUMBER# combinaisons possibles trouvées !';
 $labels[157] = 'Vendeur';
 $labels[158] = 'Acheteur';
 $labels[159] = 'Prix';
 $labels[160] = 'Aucun transferts trouvés';
 $labels[161] = 'Joueur issu du club';
 $labels[162] = 'Total des achats:';
 $labels[163] = 'Moyenne (achats):';
 $labels[164] = 'Total des ventes:';
 $labels[165] = 'Moyenne (ventes):';
 $labels[166] = 'Difference:';
 $labels[167] = 'Moyenne (achats+ventes):';
 $labels[168] = 'Nombres de transferts:';
 $labels[169] = "Cliquer ici pour l'historique des entraînements";
 $labels[170] = 'Notes';
 $labels[171] = 'Sauvegarder la note';
 $labels[172] = 'Inscrivez vous gratuitement!';
 $labels[173] = 'Montrer ce joueur à votre coach national !';
 $labels[174] = 'Cacher ce joueur à votre coach national !';
 $labels[175] = "Mise à jour des données de l'équipe nationale";
 $labels[176] = 'Désolé, mais seul le coach national est autorisé à mettre à jour ces données';
?>