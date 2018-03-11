<?
	$training_intensity[0]	= 'lazer (15h/semana)';
	$training_intensity[1]	= 'normal (25h/semana)';
	$training_intensity[2]	= 'intenso (30h/semana)';
	$training_intensity[3]	= 'imenso (40h/semana)';

	$training_types[1]	= 'Domínio de bola';
	$training_types[2]	= 'Rapidez';
	$training_types[3]	= 'Passe';
	$training_types[4]	= 'Drible';
	$training_types[5]	= 'Ressaltos';
	$training_types[6]	= 'Posicionamento';
	$training_types[7]	= 'Lançamento';
	$training_types[8]	= 'Lances Livres';
	$training_types[9]	= 'Defesa';
	$training_types[10]	= 'Ganhar peso';
	$training_types[11]	= 'Perder peso';

	$match_label["W"]	= 'W'; //ganho : win // no need to change this, its equal everywhere in the world
	$match_label["L"]	= 'L'; //perdido : loose // no need to change this, its equal everywhere in the world
	$match_label["D"]	= 'D'; //empatado : deuce // no need to change this, its equal everywhere in the world

	$nat_match_types[1]	= 'Qualificação';
	$nat_match_types[2]	= 'Amigável';

	$match_types[0]	= 'Desconhecido';
	$match_types[1]	= 'Campeonato';
	$match_types[2]	= 'Amigável';
	$match_types[3]	= 'Taça';
	$match_types[4]	= 'Play Off'; // no need to change this, its equal everywhere in the world
	$match_types[5]	= 'Taça Fair Play';
	$match_types[6]	= 'Youth Club WC';

	$match_status['FINISHED']	= 'Acabado';
	$match_status['UPCOMING']	= 'Próximo';
	$match_status['ONGOING']	= 'A decorrer';
	
	$def_strategy[0]	= 'normal';
	$def_strategy[1]	= 'sprint rápido para a defesa';
	$def_strategy[2]	= 'disputar todos os lances';
	$def_strategy[3]	= 'bloquear e ressalto';
	$def_strategy[4]	= 'proteger power zone'; // power zone is equal, only changed the protect word
	$def_strategy[5]	= 'afastar adversários do cesto';
	$def_strategy[6]	= 'half court trap';

	$off_strategy[0]	= 'normal';
	$off_strategy[1]	= 'ler a defesa';
	$off_strategy[2]	= 'contra-ataque rápido';
	$off_strategy[3]	= 'lançamentos de fora';
	$off_strategy[4]	= 'tentar penetração';
	$off_strategy[5]	= 'lançar á tabela';
	$off_strategy[6]	= 'inside shooting';

	$quarters[1]	= 'Termina a primeira parte. O resultado é:';
	$quarters[2]	= 'Termina a segunda parte. O resultado é:';
	$quarters[3]	= 'Termina a terceira parte. O resultado é:';
	$quarters[4]	= 'Acabou o jogo. O resultado final é:';

	$arch_match[ONEMONTH]				= '1 mês';
	$arch_match[TWOMONTHS]				= '2 meses';
	$arch_match[THREEMONTHS]			= '3 meses';
	$arch_match[SIXMONTHS]				= '6 meses';
	$arch_match[NINEMONTHS]				= '9 meses';
	$arch_match[ONEYEAR]				= '1 ano';

	$tlabels[SCREENSHOOTS]			= 'Imagens';
	$tlabels[LOGIN]					= 'Entrar';
	$tlabels[REGISTER]				= 'Registar';
	$tlabels[BASKETSIM]				= "Basketsim";
	$tlabels[BAMANAGER]				= "BAManager {$BAMVER}";
	$tlabels[BAMABOUT]				= 'Acerca';
	$tlabels[BAMCONTACT]			= 'Contacto';
	$tlabels[BAMNEWS]				= 'Noticias';
	$tlabels[LOGOUT]				= 'Saír';
	$tlabels[TEAM]					= $_SESSION["teamname"];
	$tlabels[TEAMPLAYERS]			= 'Jogadores';
	$tlabels[TEAMMATCHES]			= 'Jogos';
	$tlabels[TEAMTRANSFERHISTORY]	= 'Histórico de transferências';
	$tlabels[TEAMTRAININGHISTORY]	= 'Histórico de treinos';
	$tlabels[NTEAM]					= $_SESSION['natteam'];
	$tlabels[NTEAMPLAYERS]			= 'Jogadores';
	$tlabels[NTEAMMATCHES]			= 'Jogos';
	$tlabels[NTEAMDOWNLOAD]			= 'Download';// no need to change this, its equal everywhere in the world
	//$tlabels[NTEAMSUGGESTIONS]		= 'Proposals';
	$tlabels[SETTINGS]				= 'Definições';
	$tlabels[SETGENERAL]			= 'Geral';
	$tlabels[SETCOLUMNS]			= 'Colunas';
	$tlabels[SETWEIGHTS]			= 'Altura';
	$tlabels[TEAMDETAILS]			= 'Detalhes';
	$tlabels[TOOLS]					= 'Ferramentas';
	$tlabels[TOOLS_B5]				= 'Melhor 5';
	$tlabels[TOOLS_BPOS]			= 'Melhor posição';
	$tlabels[ONLINE]				= 'Download';
	$tlabels[ONLINETEAMDATA]		= 'Dados da equipa';
	$tlabels[ONLINETEAMMATCHES]		= 'Jogos';
	$tlabels[MSG]					= 'Caixa de correio';
	$tlabels[MSGINBOX]				= 'Entrada';
	$tlabels[MSGOUTBOX]				= 'Mensagens enviadas';
	$tlabels[MSGWRITE]				= 'Escrever mensagem';
	$tlabels[GM]					= 'Game master';
	$tlabels[GMCOUNTRIES]			= 'Países';

	$tcolumns["name"]				= 'Nome';
	$tcolumns["onsale"]				= 'Á venda'; //
	$tcolumns["injury"]				= 'Lesão'; //
	$tcolumns["country"]			= 'País'; //
	$tcolumns["age"]				= 'Idade';
	$tcolumns["wage"]				= 'Peso';
	$tcolumns["rating_last"]		= 'Rácio (último)';
	$tcolumns["rating_best"]		= 'Rácio (melhor)';
	$tcolumns["rating_average"]		= 'Rácio (média)';
	$tcolumns["ballhandling"]		= 'Domínio de bola';
	$tcolumns["quickness"]			= 'Rapidez';
	$tcolumns["passing"]			= 'Passe';
	$tcolumns["dribbling"]			= 'Drible';
	$tcolumns["rebounding"]			= 'Ressaltos';
	$tcolumns["positioning"]		= 'Posicionamento';
	$tcolumns["shooting"]			= 'Lançamento';
	$tcolumns["freethrows"]			= 'Lances Livres';
	$tcolumns["defense"]			= 'Defesa';
	$tcolumns["workrate"]			= 'Trabalho de equipa';
	$tcolumns["experience"]			= 'Experiência';
	$tcolumns["tiredness"]			= 'Cansasso';
	$tcolumns["coach"]				= 'Treinador'; //
	$tcolumns["characterr"]			= 'Perfil';
	$tcolumns["height"]				= 'Altura';
	$tcolumns["weight"]				= 'Peso';
	$tcolumns["2p"]					= '2P';// no need to change this, its equal everywhere in the world
	$tcolumns["3p"]					= '3P';// no need to change this, its equal everywhere in the world
	$tcolumns["ft"]					= 'FT';// no need to change this, its equal everywhere in the world
	$tcolumns["reb"]				= 'REB';// no need to change this, its equal everywhere in the world
	$tcolumns["pf"]					= 'PF';// no need to change this, its equal everywhere in the world
	$tcolumns["opf"]				= 'OPF';// no need to change this, its equal everywhere in the world
	$tcolumns["assists"]			= 'AST';// no need to change this, its equal everywhere in the world
	$tcolumns["steals"]				= 'STL';// no need to change this, its equal everywhere in the world
	$tcolumns["turnovers"]			= 'TO';// no need to change this, its equal everywhere in the world
	$tcolumns["sf_pos"]				= 'SF';// no need to change this, its equal everywhere in the world
	$tcolumns["pf_pos"]				= 'PF';// no need to change this, its equal everywhere in the world
	$tcolumns["c_pos"]				= 'C';// no need to change this, its equal everywhere in the world
	$tcolumns["pg_pos"]				= 'PG';// no need to change this, its equal everywhere in the world
	$tcolumns["sg_pos"]				= 'SG';// no need to change this, its equal everywhere in the world
	$tcolumns["playerid"]			= 'ID jogador';

	$tcolumnsshort["ballhandling"]		= 'BH'; // dont change this at this time, have to see it after published
	$tcolumnsshort["quickness"]			= 'QK'; // dont change this at this time, have to see it after published
	$tcolumnsshort["passing"]			= 'PS'; // dont change this at this time, have to see it after published
	$tcolumnsshort["dribbling"]			= 'DB'; // dont change this at this time, have to see it after published
	$tcolumnsshort["rebounding"]		= 'RB'; // dont change this at this time, have to see it after published
	$tcolumnsshort["positioning"]		= 'PO'; // dont change this at this time, have to see it after published
	$tcolumnsshort["shooting"]			= 'SH'; // dont change this at this time, have to see it after published
	$tcolumnsshort["freethrows"]		= 'FR'; // dont change this at this time, have to see it after published
	$tcolumnsshort["defense"]			= 'DF'; // dont change this at this time, have to see it after published
	$tcolumnsshort["workrate"]			= 'WR'; // dont change this at this time, have to see it after published
	$tcolumnsshort["experience"]		= 'XP'; // dont change this at this time, have to see it after published
	$tcolumnsshort["characterr"]		= 'CH'; // dont change this at this time, have to see it after published

	////////////////////////
	$tcolumnsdesc["name"]				= 'Nome';
	$tcolumnsdesc["onsale"]				= 'Á venda'; //
	$tcolumnsdesc["injury"]				= 'Lesão'; //
	$tcolumnsdesc["country"]			= 'País'; //
	$tcolumnsdesc["age"]				= 'Idade';
	$tcolumnsdesc["wage"]				= 'Ordenado';
	$tcolumnsdesc["rating_last"]		= 'Rácio (último)';
	$tcolumnsdesc["rating_best"]		= 'Rácio (melhor)';
	$tcolumnsdesc["rating_average"]		= 'Rácio (média)';
	$tcolumnsdesc["ballhandling"]		= 'Domínio de bola';
	$tcolumnsdesc["quickness"]			= 'Rapidez';
	$tcolumnsdesc["passing"]			= 'Passe';
	$tcolumnsdesc["dribbling"]			= 'Drible';
	$tcolumnsdesc["rebounding"]			= 'Ressalto';
	$tcolumnsdesc["positioning"]		= 'Posicionamento';
	$tcolumnsdesc["shooting"]			= 'Lançamento';
	$tcolumnsdesc["freethrows"]			= 'Lances Livres';
	$tcolumnsdesc["defense"]			= 'Defesa';
	$tcolumnsdesc["workrate"]			= 'Trabalho de equipa';
	$tcolumnsdesc["experience"]			= 'Experiência';
	$tcolumnsdesc["tiredness"]			= 'Cansasso';
	$tcolumnsdesc["coach"]				= 'Treinador'; 
	$tcolumnsdesc["characterr"]			= 'Perfil';
	$tcolumnsdesc["height"]				= 'Altura';
	$tcolumnsdesc["weight"]				= 'Peso';
	$tcolumnsdesc["c_pos"]				= 'Center'; //still thinking if its worth to change; the picture in basketsim.com ( http://www.basketsim.com/img/posit.jpg ) is in english
	$tcolumnsdesc["pf_pos"]				= 'Power Forward'; //still thinking if its worth to change; the picture in basketsim.com ( http://www.basketsim.com/img/posit.jpg ) is in english
	$tcolumnsdesc["sf_pos"]				= 'Small Forward'; //still thinking if its worth to change; the picture in basketsim.com ( http://www.basketsim.com/img/posit.jpg ) is in english
	$tcolumnsdesc["sg_pos"]				= 'Shooting Guard'; //still thinking if its worth to change; the picture in basketsim.com ( http://www.basketsim.com/img/posit.jpg ) is in english
	$tcolumnsdesc["pg_pos"]				= 'Point Guard'; //still thinking if its worth to change; the picture in basketsim.com ( http://www.basketsim.com/img/posit.jpg ) is in english
	$tcolumnsdesc["2p"]					= '2 Pontos';
	$tcolumnsdesc["3p"]					= '3 Pontos';
	$tcolumnsdesc["ft"]					= 'Lances livres';
	$tcolumnsdesc["reb"]				= 'Ressaltos';
	$tcolumnsdesc["pf"]					= 'Faltas sofridas';
	$tcolumnsdesc["opf"]				= 'Faltas ofensivas';
	$tcolumnsdesc["assists"]			= 'Assistências';
	$tcolumnsdesc["steals"]				= 'Roubos de bola';
	$tcolumnsdesc["turnovers"]			= 'Turnovers';
	$tcolumnsdesc["playerid"]			= 'ID de jogador';
//////////////////////

	$skills[0]	= 'nenhum';
	$skills[1]	= 'patetico';
	$skills[2]	= 'terrivel';
	$skills[3]	= 'fraco';
	$skills[4]	= 'inadequado';
	$skills[5]	= 'normal';
	$skills[6]	= 'adequado';
	$skills[7]	= 'bom';
	$skills[8]	= 'muito bom';
	$skills[9]	= 'génio';
	$skills[10]	= 'óptimo';
	$skills[11]	= 'fantastico';
	$skills[12]	= 'fabuloso';
	$skills[13]	= 'extraordinário';
	$skills[14]	= 'mágico';
	$skills[15]	= 'perfeito';

	$tiredness[0]	= 'enérgico';
	$tiredness[1]	= 'normal';
	$tiredness[2]	= 'cansado';
	$tiredness[3]	= 'muito cansado';
	$tiredness[4]	= 'extremamente cansado';
	$tiredness[5]	= 'sem força';
	$tiredness[6]	= 'exausto';
	
	$character[0]	= 'estável';
	$character[1]	= 'divertido';
	$character[2]	= 'calmo';
	$character[3]	= 'agressivo';
	$character[4]	= 'controverso';
	$character[5]	= 'egoísta';

	$labels[1]	= 'Bem vindo !';
	$labels[2]	= 'O que é o Basketsim Assistant Manager ? É uma ferramenta GRÁTIS para te ajudar na administração da tua equipa!';
	$labels[3]	= 'Como podes participar?';
	$labels[4]	=  "Nada mais fácil.Só tens de te registar no site de <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a>. Assim que te atribuírem a tua equipa podes <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>registar-te aqui</b></font></a>.";
	$labels[5]	= "Esta aplicação utiliza informação do jogo online <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>Esta aplicação é aprovada pelos desenvolvedores e autores de <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
	$labels[6]	= 'Registar equipa';
	$labels[7]	= 'Escolha uma password para utilizar no site de Basket Assistant Manager';
	$labels[8]	= 'Password';
	$labels[9]	= ' * Esta password deverá ser diferente da que utiliza no site de Basketsim.com';
	$labels[10]	= 'Endereço de email';
	$labels[11]	= 'Verificar dados da equipa';
	$labels[12]	= 'Esta operação é necessária para precaver que alguém utilize a sua equipa indevidamente. Necessitamos de relembrar que, de acordo com as regras da CBPP, esta informação não ficará guardada. Esta operação é aprovada por Basketsim.';
	$labels[13]	= 'Utilizador Basketsim';
	$labels[14]	= 'Código CBPP';
	$labels[15]	= 'Aviso ! O código CBPP não deve ser o mesmo que a sua password de jogo. O código CBPP pode ser alterado na secção Perfil. Caso tente usar um login e ou a CBPP password errada consecutivamente a sua conta poderá ficar desactivada por breves momentos.';
	$labels[16]	= 'Preencha todos os campos necessários.';
	$labels[17]	= 'A password deverá ter no mínimo 5 dígitos';
	$labels[18]	= 'Erro ao comunicar com o servidor de Basketsim.';
	$labels[19]	= 'Erro ao autenticar com o servidor de Basketsim. Por favor verifique os dados introduzidos.';
	$labels[20]	= 'Aconteceu um erro ao converter os dados recebidos. Por favor contacte o administrador do site.';
	$labels[21]	= 'A sua equipa já se encontra registada.';
	$labels[22]	= "Não definiu o seu código CBPP. Para o fazer por favor faça login no site de Basketsim e vá á secção Perfil.";
	$labels[23]	= 'Erro';
	$labels[24]	= 'Utilizador';
	$labels[25]	= 'Password';
	$labels[26]	= 'Perdi a password';
	$labels[27]	= 'ID da equipa';
	$labels[28]	= 'Nome da equipa';
	$labels[29]	= 'Diminuitivo do nome de equipa';
	$labels[30]	= 'País';
	$labels[31]	= 'Nome da Liga';
	$labels[32]	= 'Não definiu nenhuma coluna como visível. Por favor vá a Definições e escolha uma coluna para ficar visível.';
	$labels[33]	= 'Coluna';
	$labels[34]	= 'Visível';
	$labels[35]	= 'Tamanho';
	$labels[36]	= 'Guardar modificações';
	$labels[37]	= 'Pelo menos uma das colunas deve estar visível';
	$labels[38]	= 'As alterações efectuadas foram guardadas';
	$labels[39]	= 'Apenas valores numéricos são aceites para as colunas tamanho';
	$labels[40]	= 'Tem de especificar o tamanho da coluna visível';
	$labels[41]	= 'O valor 0 não é permitido para uma coluna tamanho';
	$labels[42]	= 'Mensagens';
	$labels[43]	= '5 Inicial';
	$labels[44]	= 'Prioridade';
	$labels[45]	= 'Suplentes';
	$labels[46]	= 'Calcular o melhor 5 !';
	$labels[47]	= 'Faça duplo click numa linha da tabela para mover um jogadorde uma tabela para outra';
	$labels[48]	= 'Para actualizar os dados da sua equipa necessitamos das seguintes informações';
	$labels[49]	= "Poderá ver os efeitos de peso <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><font size='+1'>aqui</font></font></a>";
	$labels[50]	= "A sua equipa já se encontra registada. Click <a href='./index.php?tab=team&mainpage=teamplayers'><font size='+1'>aqui</font></font></a> para ver os detalhes.";
	$labels[51]	=  "Caso ainda não tenha uma conta, pode <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>registar</b></font></a> a sua equipa .";
	$labels[52]	=  "Aconteceu um erro ao processar os jogadores no ficheiro XML. <BR>Por favor, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><font size=\"+1\"><b>contacte</b></font></a> o administrador do site urgentemente.";
	$labels[53]	= 'Treinador';
	$labels[54] = 'Click para escolher por #COL#';
	$labels[55]	= 'As informações do seu login serão enviadas para este endereço de email';
	$labels[56] = 'Eu quero usar as definições por defeito para : #POSITION#';
	$labels[57] = "Click aqui para restaurar os pesos por defeito de BAM para todas as posições.";
	$labels[58] = 'Skill';
	$labels[59] = 'Peso';
	$labels[60] = 'Está activo';
	$labels[61]	=  "Não se esqueça de verificar a secção de <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><font size=\"+1\"><b>novidades</b></font></a> para ficar a saber das últimas notícias.";
	$labels[62]	= 'Linguagem';
	$labels[63]	= 'Mostras níveis de skill como';
	$labels[64]	= 'Texto';
	$labels[65]	= 'Valores numéricos';
	$labels[66]	= 'Erro ao guardar definições gerais';
	$labels[67]	=  "Aconteceu um erro ao processar o ficheiro XML com os jogos. <BR>Por favor, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><font size=\"+1\"><b>contacte</b></font></a> o administrador do site urgentemente.";
	$labels[68]	= 'Data do jogo';
	$labels[69]	= 'Tipo de jogo';
	$labels[70]	= 'Equipas';
	$labels[71]	= 'Resultado';
	$labels[72]	= 'Estado';
	$labels[73]	= "Não foram encontrados jogos disputados pela sua equipa. Pode fazer o download dos seus jogos <a href='index.php?tab=online&mainpage=onlteamdata'><font size=\"+1\"><b>aqui</b></font></a>";
	$labels[74]	= 'Click aqui para ver os detalhes do jogo';
	$labels[75]	= "* Nota - Esta opção também irá fazer o download de informações relativas os jogos efectuados pela sua equipa nas últimas 3 semanas. Também é feito o download dos jogos a efectuar nas próximas 3 semanas. Se quizer fazer o download de jogos antigos click <a href='index.php?tab=online&mainpage=onlteammatches'><font size=\"+1\"><b>aqui</b></font></a>";
	$labels[76]	= 'Download dos jogos do(s) último(s)';
	$labels[77]	= 'Rácio';
	$labels[78]	= 'Estratégias';
	$labels[79] = 'Lugares vendidos';
	$labels[80] = 'Lateral';
	$labels[81] = 'Fundo';
	$labels[82] = 'Balcão';
	$labels[83] = 'Secção VIP ';
	$labels[84] = 'Total';
	$labels[85] = 'Quarto';
	$labels[86] = 'Back';
	$labels[87] = 'Resultado';
	$labels[88] = 'Ressaltos';
	$labels[89] = 'Assistências';
	$labels[90] = 'Faltas';
	$labels[91] = 'Roubo de bolas';
	$labels[92] = 'Turnovers';
	$labels[93] = 'Bloqueios';
	$labels[94] = 'Nome de jogador';
	$labels[95] = 'A sua equipa parece não estar registada. Por favor use a página de registo.';
	$labels[96]	= 'Você ou alguém pediu nova password para usar no site http://www.bamanager.org .';
	$labels[97] = 'Recuperar password de BAManager.org';
	$labels[98]	= 'A password foi enviada';
	$labels[99]	= 'Erro ao enviar a password. Tente novamente por favor.';
	$labels[100]= 'A receber os dados da sua equipa, por favor espere ...';
	$labels[101]= 'Envie-me a minha password de BAM';
	$labels[102]= "Click aqui para ver os detalhes do jogador";
	$labels[103]= '#age# anos é de(o) #country#. #height# cm, #weight# kg.';
	$labels[104]= 'Este jogador é #caracter#. Ele ganha #wage# &euro; / week.';
	$labels[105]= 'Evolução nos treinos';
	$labels[106]= 'Lista de jogadores';
	$labels[107]= 'Anterior';
	$labels[108]= 'Próximo';
	$labels[109]= 'General';
	$labels[110]= 'Características';
	$labels[111]= 'Desculpe, mas não encontrei dados relativos aos treinos. Talvez não tenha feito o download dos dados mais recentes. Pode fazê-lo indo a Download -> secção Dados de equipa.';
	$labels[112]= 'Treino';
	$labels[113]= "Este jogador ainda não teve nenhum tipo de treino até agora.";
	$labels[114]= 'Data do treino';
	$labels[115]= 'Tipo de treino';
	$labels[116]= 'Posição';
	$labels[117]= 'Estrelas';
	$labels[118]= "Este jogador ainda não jogou nenhum jogo pela sua equipa.";
	$labels[119]= 'Bases';
	$labels[120]= 'Extremos e Postes';
	$labels[121]= 'Intensidade';
	$labels[122]= 'sem informações';
	$labels[123]= 'Detalhes da equipa';
	$labels[124]= 'Informações dos treinos';
	$labels[125]= 'Obrigado por usar o BAM, #USERNAME#.';
	$labels[126]= 'ESTATÍSTICAS';
	$labels[127]= 'Utilizadores activos';
	$labels[128]= 'Jogadores seguidos';
	$labels[129]= 'Jogos recebidos';
	$labels[130]= 'Jogadores online';
	$labels[131]= 'É GRÁTIS';
	$labels[132]= 'Não foram encontradas mensagens';
	$labels[133]= 'Para';
	$labels[134]= 'Título';
	$labels[135]= 'Mensagem';
	$labels[136]= 'Enviar';
	$labels[137] = 'Preencher o recipiente';
	$labels[138] = 'Preencher o título';
	$labels[139] = 'Preencher o corpo da mensagem';
	$labels[140] = "O utilizador não existe";
	$labels[141] = 'De';
	$labels[142] = 'Data';
	$labels[143] = 'Ler mensagem';
	$labels[144] = 'Responder';
	$labels[145] = 'Preferências';
	$labels[146] = 'Alterar password';
	$labels[147] = 'Password antiga';
	$labels[148] = 'Nova password';
	$labels[149] = 'Confirmar nova password';
	$labels[150] = 'Alterar a minha password';
	$labels[151] = 'A password escrita não é a sua password actual';
	$labels[152] = 'A nova password é diferente da confirmação da nova password';
	$labels[153] = 'A nova password tem de ter no mínimo 5 dígitos';
	$labels[154] = 'A sua nova password foi guardada';
	$labels[155] = 'Limpar todas as posições';
	$labels[156] = '#NUMBER# posições possíveis foram calculadas !';
	$labels[157] = 'Vendedor';
	$labels[158] = 'Comprador';
	$labels[159] = 'Preço';
	$labels[160] = 'Não foram encontradas transferências';
	$labels[161] = 'antigo jogador';
	$labels[162] = 'Compras totais:';
	$labels[163] = 'Média (compra):';
	$labels[164] = 'Vendas totais:';
	$labels[165] = 'Média (venda):';
	$labels[166] = 'Diferença:';
	$labels[167] = 'Média (compra+venda):';
	$labels[168] = 'Número de transferências:';
	$labels[169] = 'Click aqui para ver o histórico dos treinos';
	$labels[170] = 'Notas';
	$labels[171] = 'Salvar nota';
	$labels[172] = 'Inscrever grátis!';
	$labels[173] = 'Mostrar este jogador ao seleccionador nacional !';
	$labels[174] = 'Esconder este jogador do seleccionador nacional !';
	$labels[175] = 'Download de dados da selecção nacional';
	$labels[176] = 'Desculpe, mas não é um seleccionador nacional autorizado para receber este tipo de dados';
?>