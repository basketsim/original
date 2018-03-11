<?
       $match_status['UPCOMING']   = 'A disputar'; //what should be translated is 'Upcoming' (same goes for all cases below)
       $match_status['ONGOING']    = 'Em andamento';
       $match_status['FINISHED']   = 'Encerrado'; //expression for completed match

       $training_intensity[0]	= 'recreativo (15h/week)';
       $training_intensity[1]	= 'normal (25h/week)';
       $training_intensity[2]	= 'intensivo (30h/week)';
       $training_intensity[3]	= 'exaustivo (40h/week)';

	$training_types[1]	= 'Controle';
	$training_types[2]	= 'Agilidade';
	$training_types[3]	= 'Passe';
	$training_types[4]	= 'Drible';
	$training_types[5]	= 'Rebote';
	$training_types[6]	= 'Posicionamento';
	$training_types[7]	= 'Arremesso';
	$training_types[8]	= 'Lance Livre';
	$training_types[9]	= 'Defesa';

	$match_label["W"]	= 'V'; //win
	$match_label["L"]	= 'D'; //lose
	$match_label["D"]	= 'E'; //draw

	$nat_match_types[1]	= 'Eliminatórias';
	$nat_match_types[2]	= 'Amistoso';
	$nat_match_types[3]	= 'Copa do Mundo';
	$nat_match_types[4]	= 'Copa do Mundo';
	$nat_match_types[11]	= 'Eliminatórias';
	$nat_match_types[12]	= 'Amistoso';
	$nat_match_types[13]	= 'Copa do Mundo';
	$nat_match_types[14]	= 'Copa do Mundo';

	$match_types[0]	        = 'Desconhecido';
	$match_types[1]	        = 'Liga';
	$match_types[2]	        = 'Amistoso';
	$match_types[3]	        = 'Copa';
	$match_types[4]	        = 'Finais';
	$match_types[5]	        = 'Fair Play Cup'; //you can keep original name
	$match_types[6]	        = 'Internacional';
	$match_types[7]	        = 'Internacional';
	$match_types[18]        = 'Juvenil';
	$match_types[19]        = 'CM Juvenil de Clubes'; //try not to use too long translation
	
	$def_strategy[0]	= 'normal';
	$def_strategy[1]	= 'reorganizar defesa rapidamente';
	$def_strategy[2]	= 'disputar cada arremesso';
	$def_strategy[3]	= 'toco e rebote';
	$def_strategy[4]	= 'proteger garrafão';
	$def_strategy[5]	= 'marcação individual';
	$def_strategy[6]	= 'armadilha defensiva';

	$off_strategy[0]	= 'normal';
	$off_strategy[1]	= 'observar a defesa';
	$off_strategy[2]	= 'contra-ataque rápido';
	$off_strategy[3]	= 'arremessar de longe';
	$off_strategy[4]	= 'penetrar no garrafão';
	$off_strategy[5]	= 'demolir a tabela';
	$off_strategy[6]	= 'arremessar de perto';

	$quarters[1]	        = 'Primeiro quarto encerrado. O placar é:';
	$quarters[2]	        = 'Segundo quarto encerrado. O placar é:';
	$quarters[3]	        = 'Terceiro quarto encerrado. O placar é:';
	$quarters[4]	        = 'A partida terminou. O placar final é:';

	$arch_match[ONEMONTH]		= '1 mês';
	$arch_match[TWOMONTHS]		= '2 meses';
	$arch_match[THREEMONTHS]	= '3 meses';
	$arch_match[SIXMONTHS]		= '6 meses';
	$arch_match[NINEMONTHS]		= '9 meses';
	$arch_match[ONEYEAR]		= '1 ano';

	$tlabels[BAMANAGER]		= "BAManager {$BAMVER}"; //don't translate this, just leave it as it is
	$tlabels[TEAM]			= $_SESSION["teamname"]; //don't translate this, just leave it as it is
	$tlabels[NTEAM]			= $_SESSION['natteam']; //don't translate this, just leave it as it is
	$tlabels[BASKETSIM]		= "Basketsim"; //don't translate this

	$tlabels[SCREENSHOOTS]		= 'Imagens';
	$tlabels[LOGIN]			= 'Login';
	$tlabels[REGISTER]		= 'Cadastro';
	$tlabels[BAMABOUT]		= 'Sobre';
	$tlabels[BAMCONTACT]		= 'Contato';
	$tlabels[BAMNEWS]		= 'Notícias';
	$tlabels[LOGOUT]		= 'Logout';
	$tlabels[TEAMPLAYERS]		= 'Jogadores';
	$tlabels[TEAMMATCHES]		= 'Partidas';
	$tlabels[TEAMTRANSFERHISTORY]	= 'Histórico de Transferências';
	$tlabels[TEAMTRAININGHISTORY]	= 'Histórico de Treino';
	$tlabels[NTEAMPLAYERS]		= 'Jogadores';
	$tlabels[NTEAMMATCHES]		= 'Partidas';
	$tlabels[NTEAMDOWNLOAD]		= 'Download';
	//$tlabels[NTEAMSUGGESTIONS]	= 'Proposals';
	$tlabels[SETTINGS]		= 'Configurações';
	$tlabels[SETGENERAL]		= 'Geral';
	$tlabels[SETCOLUMNS]		= 'Colunas';
	$tlabels[SETWEIGHTS]		= 'Importância';
	$tlabels[TEAMDETAILS]		= 'Painel';
	$tlabels[TOOLS]			= 'Ferramentas';
	$tlabels[TOOLS_B5]		= 'Titulares';
	$tlabels[TOOLS_BPOS]		= 'Melhor posição';
	$tlabels[ONLINE]		= 'Baixar';
	$tlabels[ONLINETEAMDATA]	= 'Dados do time';
	$tlabels[ONLINETEAMMATCHES]	= 'Partidas';
	$tlabels[MSG]			= 'Caixa de mensagens';
	$tlabels[MSGINBOX]		= 'Entrada';
	$tlabels[MSGOUTBOX]		= 'Mensagens enviadas';
	$tlabels[MSGWRITE]		= 'Nova mensagem';
	$tlabels[GM]			= 'Gamemaster';
	$tlabels[GMCOUNTRIES]		= 'Países';

	$tcolumns["name"]		= 'Nome';
	$tcolumns["onsale"]		= 'À venda';
	$tcolumns["injury"]		= 'Lesionado';
	$tcolumns["country"]		= 'País';
	$tcolumns["age"]		= 'Idade';
	$tcolumns["wage"]		= 'Salário';
	$tcolumns["rating_last"]	= 'Última avaliação';
	$tcolumns["rating_best"]	= 'Melhor avaliação';
	$tcolumns["rating_average"]	= 'Avaliação média'; //make sure not to use too long expression!
	$tcolumns["ballhandling"]	= 'Controle';
	$tcolumns["quickness"]		= 'Agilidade';
	$tcolumns["passing"]		= 'Passe';
	$tcolumns["dribbling"]		= 'Drible';
	$tcolumns["rebounding"]		= 'Rebote';
	$tcolumns["positioning"]	= 'Posicionamento';
	$tcolumns["shooting"]		= 'Arremesso';
	$tcolumns["freethrows"]		= 'Lance Livre';
	$tcolumns["defense"]		= 'Defesa';
	$tcolumns["workrate"]		= 'Disposição';
	$tcolumns["experience"]		= 'Experiência';
	$tcolumns["tiredness"]		= 'Fadiga';
	$tcolumns["coach"]		= 'Coach';
	$tcolumns["characterr"]		= 'Personalidade';
	$tcolumns["height"]		= 'Altura';
	$tcolumns["weight"]		= 'Peso';
	$tcolumns["2p"]			= '2P';
	$tcolumns["3p"]			= '3P';
	$tcolumns["ft"]			= 'LL';
	$tcolumns["reb"]		= 'REB';
	$tcolumns["pf"]			= 'FP';
	$tcolumns["opf"]		= 'FT';
	$tcolumns["assists"]		= 'AST';
	$tcolumns["steals"]		= 'RB';
	$tcolumns["turnovers"]		= 'PB';
	$tcolumns["sf_pos"]		= 'AL';
	$tcolumns["pf_pos"]		= 'AL/PV';
	$tcolumns["c_pos"]		= 'PV';
	$tcolumns["pg_pos"]		= 'AR';
	$tcolumns["sg_pos"]		= 'AL/AR';
	$tcolumns["playerid"]		= 'ID Jogador';

//for some of the expressions below type again the same translations as above

	$tcolumnsdesc["name"]		= 'Nome';
	$tcolumnsdesc["onsale"]		= 'À venda';
	$tcolumnsdesc["injury"]		= 'Lesionado';
	$tcolumnsdesc["country"]	= 'País';
	$tcolumnsdesc["age"]		= 'Idade';
	$tcolumnsdesc["wage"]		= 'Salário';
	$tcolumnsdesc["rating_last"]	= 'Última avaliação';
	$tcolumnsdesc["rating_best"]	= 'Melhor avaliação';
	$tcolumnsdesc["rating_average"]	= 'Avaliação média';
	$tcolumnsdesc["ballhandling"]	= 'Controle';
	$tcolumnsdesc["quickness"]	= 'Agilidade';
	$tcolumnsdesc["passing"]	= 'Passe';
	$tcolumnsdesc["dribbling"]	= 'Drible';
	$tcolumnsdesc["rebounding"]	= 'Rebote';
	$tcolumnsdesc["positioning"]	= 'Posicionamento';
	$tcolumnsdesc["shooting"]	= 'Arremesso';
	$tcolumnsdesc["freethrows"]	= 'Lance Livre'; //make sure not to use too long expression!
	$tcolumnsdesc["defense"]	= 'Defesa';
	$tcolumnsdesc["workrate"]	= 'Disposição';
	$tcolumnsdesc["experience"]	= 'Experiência';
	$tcolumnsdesc["tiredness"]	= 'Fadiga';
	$tcolumnsdesc["coach"]		= 'Coach';
	$tcolumnsdesc["characterr"]	= 'Personalidade';
	$tcolumnsdesc["height"]		= 'Altura';
	$tcolumnsdesc["weight"]		= 'Peso';
	$tcolumnsdesc["c_pos"]		= 'Pivô';
	$tcolumnsdesc["pf_pos"]		= 'Ala/Pivô';
	$tcolumnsdesc["sf_pos"]		= 'Ala';
	$tcolumnsdesc["sg_pos"]		= 'Ala/Armador';
	$tcolumnsdesc["pg_pos"]		= 'Armador';
	$tcolumnsdesc["2p"]		= '2 Pontos';
	$tcolumnsdesc["3p"]		= '3 Pontos';
	$tcolumnsdesc["ft"]		= 'Lance Livre';
	$tcolumnsdesc["reb"]		= 'Rebote';
	$tcolumnsdesc["pf"]		= 'Faltas';
	$tcolumnsdesc["opf"]		= 'Faltas Técnicas';
	$tcolumnsdesc["assists"]	= 'Assistências';
	$tcolumnsdesc["steals"]		= 'Roubada de bola';
	$tcolumnsdesc["turnovers"]	= 'Perda de bola';
	$tcolumnsdesc["playerid"]	= 'ID Jogador';

//below are two letter acronyms presenting Basketsim skills, if you will translate them, do it according to how you've translated skill names above

	$tcolumnsshort["ballhandling"]	= 'CN';
	$tcolumnsshort["quickness"]	= 'AG';
	$tcolumnsshort["passing"]	= 'PS';
	$tcolumnsshort["dribbling"]	= 'DB';
	$tcolumnsshort["rebounding"]	= 'RB';
	$tcolumnsshort["positioning"]	= 'PO';
	$tcolumnsshort["shooting"]	= 'AR';
	$tcolumnsshort["freethrows"]	= 'LL';
	$tcolumnsshort["defense"]	= 'DF';
	$tcolumnsshort["workrate"]	= 'DS';
	$tcolumnsshort["experience"]	= 'EX';
	$tcolumnsshort["characterr"]	= 'PR';

/*
below use the same expressions as they are used in your local Basketsim translation
(if you think these translation should be improved, you can use improved version here, but contact me so I can update your translation file!)
*/
	$skills[0]	= 'nenhuma';
	$skills[1]	= 'patética';
	$skills[2]	= 'terrível';
	$skills[3]	= 'fraca';
	$skills[4]	= 'abaixo da média';
	$skills[5]	= 'média';
	$skills[6]	= 'acima da média';
	$skills[7]	= 'boa';
	$skills[8]	= 'muito boa';
	$skills[9]	= 'notável';
	$skills[10]	= 'incrível';
	$skills[11]	= 'fantástica';
	$skills[12]	= 'maravilhosa';
	$skills[13]	= 'extraordinária';
	$skills[14]	= 'fascinante';
	$skills[15]	= 'perfeita';

	$character[0]	= 'firme';
	$character[1]	= 'divertido';
	$character[2]	= 'calmo';
	$character[3]	= 'vigoroso';
	$character[4]	= 'controverso';
	$character[5]	= 'egoísta';

	$tiredness[0]	= 'elétrico';
	$tiredness[1]	= 'disposto';
	$tiredness[2]	= 'cansado';
	$tiredness[3]	= 'muito cansado';
	$tiredness[4]	= 'acabado';
	$tiredness[5]	= 'extenuado';
	$tiredness[6]	= 'exausto';

/*
in some of the expressions below you will notice links, just translate the text and leave links exactly as they are
in some of the expressions below you will notice markers like #COL# or <br/> - don't translate or change them, always translate text only!
*/

	$labels[1]	= 'Bem-vindo!';
	$labels[2]	= 'O que é Basketsim Assistant Manager?<br/>Uma ferramenta gratuita para auxiliar na administração de seu time!';
	$labels[3]	= 'Como posso participar?';
	$labels[4]	= "É Muito fácil. Você só precisa estar cadastrado no <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a>.<br/>Depois de obter seu time lá, você pode <a href=\"index.php?tab=register&mainpage=register\"><b>se cadastrar no BAM</b></a> e utilizá-lo!";
	$labels[5]	= "Este aplicativo utiliza informações do jogo online <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>Tal uso foi aprovado pelos desenvolvedores e proprietários do <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
	$labels[6]	= 'Cadastrar time';
	$labels[7]	= 'Especifique a senha para utilização neste website:';
	$labels[8]	= 'Senha';
	$labels[9]	= ' * Esta senha tem que ser diferente da utilizada no jogo Basketsim.com';
	$labels[10]	= 'Endereço de email';
	$labels[11]	= 'Verificando dados';
	$labels[12]	= "Esta operação é necessária para evitar que terceiros utilizem os dados de seu time. Esta operação é aprovada pelo Basketsim e sua informação de login não será mantida no BAM!";
	$labels[13]	= 'Usuário Basketsim';
	$labels[14]	= 'Código CBPP';
	$labels[15]	= 'Atenção! O código CBPP não é o mesmo que sua senha. O código CBPP pode ser criado e alterado na opção Perfil do Basketsim.';
	$labels[16]	= 'Preencha todos os campos necessários.';
	$labels[17]	= 'A senha deve possuir ao menos 5 caracteres';
	$labels[18]	= 'Erro na comunicação com o servidor Basketsim.';
	$labels[19]	= 'Erro na verificação no servidor Basketsim. Verifique se seus dados estão corretos, por favor.';
	$labels[20]	= 'Houve um erro na análise dos dados. Por favor, entre em contato com o administrador deste site.';
	$labels[21]	= 'Seu time já está registrado.';
	$labels[22]	= 'Você não criou seu código CBPP. Para fazê-lo, acesse Basketsim e clique na opção Perfil.';
	$labels[23]	= 'Erro';
	$labels[24]	= 'Nome de usuário';
	$labels[25]	= 'Senha';
	$labels[26]	= 'Esqueci a senha';
	$labels[27]	= 'ID time';
	$labels[28]	= 'Nome do time';
	$labels[29]	= 'Nome curto do time';
	$labels[30]	= 'País';
	$labels[31]	= 'Nome da Liga';
	$labels[32]	= 'Você não marcou como visível uma coluna sequer. Acesse a aba Configurações para tornar uma coluna visível, por favor.';
	$labels[33]	= 'Coluna';
	$labels[34]	= 'Visível';
	$labels[35]	= 'Largura';
	$labels[36]	= 'Salvar alterações';
	$labels[37]	= 'Pelo menos uma coluna deveria estar visível';
	$labels[38]	= 'As alterações foram salvas';
	$labels[39]	= 'Somente números são aceitos para larguras das colunas';
	$labels[40]	= 'É preciso especificar largura para uma coluna visível';
	$labels[41]	= 'O valor 0 não é permitido para a largura da coluna';
	$labels[42]	= 'Mensagens';
	$labels[43]	= 'Titulares';
	$labels[44]	= 'Prioridade';
	$labels[45]	= 'Reservas';
	$labels[46]	= 'Calcule meu melhor time!';
	$labels[47]	= 'Duplo clique em uma linha da tabela para mover jogador entre as tabelas';
	$labels[48]	= 'Para atualizar os dados do time, são necessárias as seguintes informações';
	$labels[49]	= "Veja os efeitos da importância bem <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><b>aqui</b></a>";
	$labels[50]	= "Seu time já está registrado. Clique <a href='./index.php?tab=team&mainpage=teamplayers'><b>aqui</b></a> para ver detalhes.";
	$labels[51]	= "Caso não possua uma conta ainda, você pode se cadastrar <a href=\"index.php?tab=register&mainpage=register\"><b>aqui</b></a>!";
	$labels[52]	= "Ocorreu um erro no processo de análise do XML dos jogadores. <BR>Por favor, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>avise</b></a> o administrador do site imediatamente.";
	$labels[53]	= 'Coach';
	$labels[54]     = 'Clique para ordernar por #COL#';
	$labels[55]	= 'Suas informações de login serão enviadas para este email';
	$labels[56]     = 'Eu gostaria de usar os padrões para : #POSITION#';
	$labels[57]     = "Clique aqui para restaurar os padrões de importÂncia BAM para todas as posições";
	$labels[58]     = 'Habilidade';
	$labels[59]     = 'Importância';
	$labels[60]     = 'Ativo';
	$labels[61]	= "Não esqueça de verificar a seção de <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><b>notícias</b></a> para saber das últimas.";
	$labels[62]	= 'Língua';
	$labels[63]	= 'Mostrar níveis de habilidade como';
	$labels[64]	= 'Texto';
	$labels[65]	= 'Números';
	$labels[66]	= 'Houve um erro ao salvar suas configurações';
	$labels[67]	=  "Erro encontrado durante análise do XML das partidas. <BR>Por favor, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><b>avise</b></a> o administrador do site imediatamente.";
	$labels[68]	= 'Data da partida';
	$labels[69]	= 'Tipo de partida';
	$labels[70]	= 'Times';
	$labels[71]	= 'Resultado';
	$labels[72]	= 'Status';
	$labels[73]	= "Não foram encontradas partidas. Você pode baixar sua lista de jogos <a href='index.php?tab=online&mainpage=onlteamdata'><b>aqui</b></a>";
	$labels[74]	= 'Clique aqui para detalhes da partida';
	$labels[75]	= "* Nota - Esta operação irá baixar informações sobre seus jogos nas últimas 3 e próximas 3 semanas.<br><b>Para baixar a lista completa de jogos clique <a href='index.php?tab=online&mainpage=Se quiseronlteammatches'>aqui</a></b>";
	$labels[76]	= 'Baixar jogos pelos últimos'; //referring to amount of time, for example "the last 6 months"
	$labels[77]	= 'Avaliação';
	$labels[78]	= 'Estratégias';
	$labels[79]     = 'Ingressos vendidos';
	$labels[80]     = 'Lateral da quadra';
	$labels[81]     = 'Fundo da quadra';
	$labels[82]     = 'Balcão';
	$labels[83]     = 'Área VIP';
	$labels[84]     = 'Total';
	$labels[85]     = 'Quarto';
	$labels[86]     = 'Voltar';
	$labels[87]     = 'Placar';
	$labels[88]     = 'Rebotes';
	$labels[89]     = 'Assistências';
	$labels[90]     = 'Faltas';
	$labels[91]     = 'Roubadas de bola';
	$labels[92]     = 'Perdas de bola';
	$labels[93]     = 'Tocos';
	$labels[94]     = 'Nome do jogador';
	$labels[95]     = 'Seu time parece não estar registrado. Use a página de cadastro, por favor.';
	$labels[96]	= 'Você ou outra pessoa requisitou uma senha que você usa para acessar www.bamanager.net.';
	$labels[97]     = 'Recuperação de senha bamanager.net';
	$labels[98]	= 'Senha foi enviada';
	$labels[99]	= 'Erro ao enviar a senha. Tente novamente, por favor.';
	$labels[100]    = 'Baixando dados de seu time, aguarde ...';
	$labels[101]    = 'Envie minha senha BAM';
	$labels[102]    = "Clique aqui para ver detalhes do jogador";
	$labels[103]    = '#age# anos da(o) #country#. #height# cm, #weight# kg.';
	$labels[104]    = 'Este jogador é #caracter#. Ele ganha #wage# &euro; / semana.';
	$labels[105]    = 'Evolução do treino';
	$labels[106]    = 'Lista de jogadores';
	$labels[107]    = 'Anterior';
	$labels[108]    = 'Próximo';
	$labels[109]    = 'Geral';
	$labels[110]    = 'Habilidades';
	$labels[111]    = 'Desculpe, não encontrei dados sobre treino. Talvez você não tenha atualizado os dados. Atualize-os visitando a aba Download -> Dados do time.';
	$labels[112]    = 'Treino';
	$labels[113]    = "Este jogador ainda não possui informação de treino salva no BAM.";
	$labels[114]    = 'Data do treino';
	$labels[115]    = 'Tipo de treino';
	$labels[116]    = 'Posição';
	$labels[117]    = 'Estrelas';
	$labels[118]    = "Este jogador ainda não possui partidas disputadas pelo seu time salvas.";
	$labels[119]    = 'Armadores';
	$labels[120]    = 'Pivôs';
	$labels[121]    = 'Intensidade';
	$labels[122]    = 'sem informação';
	$labels[123]    = 'Detalhes do time';
	$labels[124]    = 'Informações de treino';
	$labels[125]    = 'Obrigado por aproveitar BAM, #USERNAME#.';
	$labels[126]    = 'ESTATÍSTICAS';
	$labels[127]    = 'Usuários ativos';
	$labels[128]    = 'Jogadores rastreados';
	$labels[129]    = 'Partidas Baixadas';
	$labels[130]    = 'Usuários Online';
	$labels[131]    = 'É GRÁTIS';
	$labels[132]    = 'Nenhuma mensagem encontrada';
	$labels[133]    = 'Para';
	$labels[134]    = 'Assunto';
	$labels[135]    = 'Mensagem';
	$labels[136]    = 'Enviar';
	$labels[137]    = 'Preencha o destinatário';
	$labels[138]    = 'Preencha o assunto';
	$labels[139]    = 'Preencha a área destinada ao texto da mensagem';
	$labels[140]    = "Usuário não existe";
	$labels[141]    = 'De';
	$labels[142]    = 'Data';
	$labels[143]    = 'Ler Mensagem';
	$labels[144]    = 'Responder';
	$labels[145]    = 'Preferências';
	$labels[146]    = 'Alterar senha';
	$labels[147]    = 'Senha anterior';
	$labels[148]    = 'Nova senha';
	$labels[149]    = 'Confirmar nova senha';
	$labels[150]    = 'Altere minha senha';
	$labels[151]    = 'A senha anterior especificada não é sua senha atual';
	$labels[152]    = 'A nova senha é diferente da digitada em Confirmar nova senha';
	$labels[153]    = 'A nova senha deve possuir ao menos 5 caracteres';
	$labels[154]    = 'Sua nova senha foi salva';
	$labels[155]    = 'Limpar todas as posições';
	$labels[156]    = '#NUMBER# possíveis combinações foram encontradas!';
	$labels[157]    = 'Vendedor';
	$labels[158]    = 'Comprador';
	$labels[159]    = 'Preço';
	$labels[160]    = 'Nenhuma transferência encontrada';
	$labels[161]    = 'Jogador aposentado';
	$labels[162]    = 'Total de aquisições:';
	$labels[163]    = 'Média (compra):';
	$labels[164]    = 'Total de vendas:';
	$labels[165]    = 'Média (venda):';
	$labels[166]    = 'Diferença:';
	$labels[167]    = 'Média (compra+venda):';
	$labels[168]    = 'Quantidade de transferências:';
	$labels[169]    = 'Clique aqui para histórico de treino';
	$labels[170]    = 'Anotações';
	$labels[171]    = 'Salvar Anotação';
	$labels[172]    = 'Registre gratuitamente!';
	$labels[173]    = 'Mostrar este jogador ao treinador da seleção nacional !';
	$labels[174]    = 'Esconder este jogador do treinador da seleção nacional !';
	$labels[175]    = 'Baixar dados da seleção nacional';
	$labels[176]    = 'Desculpe, somente treinadores de seleções têm permissão para baixar estes dados';
	$labels[177]    = 'Progresso das habilidades';
	$labels[178]    = 'Logins hoje';
?>