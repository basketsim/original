<?
	$training_intensity[0]	= 'relajado (15h/semana)';
	$training_intensity[1]	= 'normal (25h/semana)';
	$training_intensity[2]	= 'intenso (30h/semana)';
	$training_intensity[3]	= 'inmenso (40h/semana)';

	$training_types[1]	= 'Manejo';
	$training_types[2]	= 'Rapidez';
	$training_types[3]	= 'Pase';
	$training_types[4]	= 'Dribling';
	$training_types[5]	= 'Rebotes';
	$training_types[6]	= 'Colocación';
	$training_types[7]	= 'Tiro';
	$training_types[8]	= 'Tiros libres';
	$training_types[9]	= 'Defensa';

	$match_label["W"]	= 'V'; //win
	$match_label["L"]	= 'D'; //lose
	$match_label["D"]	= 'E'; //draw

	$nat_match_types[1]	= 'Competición';
	$nat_match_types[2]	= 'Amistoso';

	$match_types[0]	        = 'Desconocido';
	$match_types[1]	        = 'Liga';
	$match_types[2]	        = 'Amistoso';
	$match_types[3]	        = 'Copa';
	$match_types[4]	        = 'Play Off';
	$match_types[5]	        = 'Fair Play Cup';
	$match_types[19]        = 'Youth Club WC';

     $match_status['FINISHED']  = 'Terminado';
     $match_status['UPCOMING']  = 'Próximamente';
     $match_status['ONGOING']   = 'Empezado';
	
	$def_strategy[0]	= 'normal';
	$def_strategy[1]	= 'volver rápido a defender';
	$def_strategy[2]	= 'evitar cualquier canasta';
	$def_strategy[3]	= 'cerrar el rebote';
	$def_strategy[4]	= 'defensa en zona';
	$def_strategy[5]	= 'presión en toda la cancha';
	$def_strategy[6]	= 'presión a media cancha';

	$off_strategy[0]	= 'normal';
	$off_strategy[1]	= 'leer la defensa';
	$off_strategy[2]	= 'jugar con velocidad';
	$off_strategy[3]	= 'tiros lejanos';
	$off_strategy[4]	= 'penetraciones';
	$off_strategy[5]	= 'machacar los tableros';
	$off_strategy[6]	= 'tiro interior';

	$quarters[1]	        = 'Fin del primer cuarto. El resultado es:';
	$quarters[2]	        = 'Fin del segundo cuarto. El resultado es:';
	$quarters[3]	        = 'Fin del tercer cuarto. El resultado es:';
	$quarters[4]	        = 'El partido ha finalizado. El resultado final es de:';

	$arch_match[ONEMONTH]			= '1 mes';
	$arch_match[TWOMONTHS]			= '2 meses';
	$arch_match[THREEMONTHS]		= '3 meses';
	$arch_match[SIXMONTHS]			= '6 meses';
	$arch_match[NINEMONTHS]			= '9 meses';
	$arch_match[ONEYEAR]			= '1 año';

	$tlabels[BAMANAGER]			= "BAManager {$BAMVER}"; //don't translate this, just leave it as it is
	$tlabels[TEAM]				= $_SESSION["teamname"]; //don't translate this, just leave it as it is
	$tlabels[NTEAM]				= $_SESSION['natteam']; //don't translate this, just leave it as it is
	$tlabels[BASKETSIM]			= "Basketsim"; //don't translate this

	$tlabels[SCREENSHOOTS]			= 'Capturas de pantalla';
	$tlabels[LOGIN]				= 'Entrar';
	$tlabels[REGISTER]			= 'Regístrate';
	$tlabels[BAMABOUT]			= 'Acerca de';
	$tlabels[BAMCONTACT]		        = 'Contacto';
	$tlabels[BAMNEWS]			= 'Noticias';
	$tlabels[LOGOUT]			= 'Salir';
	$tlabels[TEAMPLAYERS]			= 'Jugadores';
	$tlabels[TEAMMATCHES]			= 'Partidos';
	$tlabels[TEAMTRANSFERHISTORY]	        = 'Historial de traspasos';
	$tlabels[TEAMTRAININGHISTORY]	        = 'Historial de entrenamiento';
	$tlabels[NTEAMPLAYERS]			= 'Jugadores';
	$tlabels[NTEAMMATCHES]			= 'Partidos';
	$tlabels[NTEAMDOWNLOAD]			= 'Descarga';
	//$tlabels[NTEAMSUGGESTIONS]		= 'Propuestas';
	$tlabels[SETTINGS]			= 'Ajustes';
	$tlabels[SETGENERAL]			= 'General';
	$tlabels[SETCOLUMNS]			= 'Columnas';
	$tlabels[SETWEIGHTS]			= 'Proporciones';
	$tlabels[TEAMDETAILS]			= 'Principal';
	$tlabels[TOOLS]				= 'Herramientas';
	$tlabels[TOOLS_B5]			= '5 inicial';
	$tlabels[TOOLS_BPOS]			= 'Mejor posición';
	$tlabels[ONLINE]			= 'Descarga';
	$tlabels[ONLINETEAMDATA]		= 'Información del equipo';
	$tlabels[ONLINETEAMMATCHES]		= 'Partidos';
	$tlabels[MSG]				= 'Buzón';
	$tlabels[MSGINBOX]			= 'Bandeja de entrada';
	$tlabels[MSGOUTBOX]			= 'Mensajes enviados';
	$tlabels[MSGWRITE]			= 'Escribir mensaje';
	$tlabels[GM]				= 'Game master';
	$tlabels[GMCOUNTRIES]			= 'Países';

	$tcolumns["name"]			= 'Nombre';
	$tcolumns["onsale"]			= 'En venta';
	$tcolumns["injury"]			= 'Lesión';
	$tcolumns["country"]			= 'País';
	$tcolumns["age"]			= 'Edad';
	$tcolumns["wage"]			= 'Sueldo';
	$tcolumns["rating_last"]		= 'Valor (última)';
	$tcolumns["rating_best"]		= 'Valor (mejor)';
	$tcolumns["rating_average"]		= 'Valor (Media)';
	$tcolumns["ballhandling"]		= 'Manejo';
	$tcolumns["quickness"]			= 'Rapidez';
	$tcolumns["passing"]			= 'Pase';
	$tcolumns["dribbling"]			= 'Dribling';
	$tcolumns["rebounding"]			= 'Rebotes';
	$tcolumns["positioning"]		= 'Colocación';
	$tcolumns["shooting"]			= 'Tiro';
	$tcolumns["freethrows"]			= 'Tiros libres';
	$tcolumns["defense"]			= 'Defensa';
	$tcolumns["workrate"]			= 'Esfuerzo';
	$tcolumns["experience"]			= 'Experiencia';
	$tcolumns["tiredness"]			= 'Cansancio';
	$tcolumns["coach"]			= 'Entrenador';
	$tcolumns["characterr"]			= 'Carácter';
	$tcolumns["height"]			= 'Altura';
	$tcolumns["weight"]			= 'Peso';
	$tcolumns["2p"]				= '2P';
	$tcolumns["3p"]				= '3P';
	$tcolumns["ft"]				= 'TL';
	$tcolumns["reb"]			= 'REB';
	$tcolumns["pf"]				= 'FP';
	$tcolumns["opf"]			= 'FPO';
	$tcolumns["assists"]			= 'AS';
	$tcolumns["steals"]			= 'RO';
	$tcolumns["turnovers"]			= 'PE';
	$tcolumns["sf_pos"]			= 'SF';
	$tcolumns["pf_pos"]			= 'PF';
	$tcolumns["c_pos"]			= 'C';
	$tcolumns["pg_pos"]			= 'PG';
	$tcolumns["sg_pos"]			= 'SG';
	$tcolumns["playerid"]			= 'ID';

	$tcolumnsshort["ballhandling"]		= 'MA';
	$tcolumnsshort["quickness"]		= 'RA';
	$tcolumnsshort["passing"]		= 'PA';
	$tcolumnsshort["dribbling"]		= 'DR';
	$tcolumnsshort["rebounding"]		= 'RE';
	$tcolumnsshort["positioning"]		= 'CO';
	$tcolumnsshort["shooting"]		= 'TI';
	$tcolumnsshort["freethrows"]		= 'TL';
	$tcolumnsshort["defense"]		= 'DF';
	$tcolumnsshort["workrate"]		= 'ES';
	$tcolumnsshort["experience"]		= 'EX';
	$tcolumnsshort["characterr"]		= 'CA';

	$tcolumnsdesc["name"]			= 'Nombre';
	$tcolumnsdesc["onsale"]			= 'En venta';
	$tcolumnsdesc["injury"]			= 'Lesión';
	$tcolumnsdesc["country"]		= 'País';
	$tcolumnsdesc["age"]			= 'Edad';
	$tcolumnsdesc["wage"]			= 'Sueldo';
	$tcolumnsdesc["rating_last"]		= 'Valor (Última)';
	$tcolumnsdesc["rating_best"]		= 'Valor (Mejor)';
	$tcolumnsdesc["rating_average"]		= 'Valor (Media)';
	$tcolumnsdesc["ballhandling"]		= 'Manejo';
	$tcolumnsdesc["quickness"]		= 'Rapidez';
	$tcolumnsdesc["passing"]		= 'Pase';
	$tcolumnsdesc["dribbling"]		= 'Dribling';
	$tcolumnsdesc["rebounding"]		= 'Rebotes';
	$tcolumnsdesc["positioning"]		= 'Colocación';
	$tcolumnsdesc["shooting"]		= 'Tiro';
	$tcolumnsdesc["freethrows"]		= 'Tiros libres';
	$tcolumnsdesc["defense"]		= 'Defensa';
	$tcolumnsdesc["workrate"]		= 'Esfuerzo';
	$tcolumnsdesc["experience"]		= 'Experiencia';
	$tcolumnsdesc["tiredness"]		= 'Cansancio';
	$tcolumnsdesc["coach"]			= 'Entrenador';
	$tcolumnsdesc["characterr"]		= 'Carácter';
	$tcolumnsdesc["height"]			= 'Altura';
	$tcolumnsdesc["weight"]			= 'Peso';
	$tcolumnsdesc["c_pos"]			= 'Pívot';
	$tcolumnsdesc["pf_pos"]			= 'Ala-Pívot';
	$tcolumnsdesc["sf_pos"]			= 'Alero';
	$tcolumnsdesc["sg_pos"]			= 'Escolta';
	$tcolumnsdesc["pg_pos"]			= 'Base';
	$tcolumnsdesc["2p"]			= '2 Puntos';
	$tcolumnsdesc["3p"]			= '3 Puntos';
	$tcolumnsdesc["ft"]			= 'Tiros libres';
	$tcolumnsdesc["reb"]			= 'Rebotes';
	$tcolumnsdesc["pf"]			= 'Faltas personales';
	$tcolumnsdesc["opf"]			= 'Faltas en ataque';
	$tcolumnsdesc["assists"]		= 'Asistencias';
	$tcolumnsdesc["steals"]			= 'Robos';
	$tcolumnsdesc["turnovers"]		= 'Pérdidas';
	$tcolumnsdesc["playerid"]		= 'ID jugador';

	$skills[0]	= 'inexistente';
	$skills[1]	= 'patético';
	$skills[2]	= 'terrible';
	$skills[3]	= 'pobre';
	$skills[4]	= 'mediocre';
	$skills[5]	= 'insuficiente';
	$skills[6]	= 'aceptable';
	$skills[7]	= 'bueno';
	$skills[8]	= 'muy bueno';
	$skills[9]	= 'excelente';
	$skills[10]	= 'destacado';
	$skills[11]	= 'fantástico';
	$skills[12]	= 'brillante';
	$skills[13]	= 'extraordinario';
	$skills[14]	= 'mágico';
	$skills[15]	= 'perfecto';

	$tiredness[0]	= 'pletórico';
	$tiredness[1]	= 'fresco';
	$tiredness[2]	= 'cansado';
	$tiredness[3]	= 'muy cansado';
	$tiredness[4]	= 'extremadamente cansado';
	$tiredness[5]	= 'agotado';
	$tiredness[6]	= 'exhausto';
	
	$character[0]	= 'inteligente';
	$character[1]	= 'espectacular';
	$character[2]	= 'tranquilo';
	$character[3]	= 'agresivo';
	$character[4]	= 'imprevisible';
	$character[5]	= 'individualista';

	$labels[1]	= 'bienvenido!';
	$labels[2]	= 'Qué es el Basketsim Assistant Manager? Una herramienta gratuita diseñada para ayudarte a administrar tu equipo.';
	$labels[3]	= 'Cómo puedes participar?';
	$labels[4]	= "Muy fácil. Sólo tienes que estar registrado en <a href=\"http://www.basketsim.com\" target=\"_blank\">Basketsim</a>. Una vez tengas tu equipo ya puedes <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>register</b></font></a>.";
	$labels[5]	= "Esta aplicación usa la información desde el servidor del juego online <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.<br>Este uso ha sido aprovado por los desarrolladores y dueños del copyright de <a href=\"http://www.basketsim.com\" target=\"_blank\"><i>Basketsim.com</i></a>.";
	$labels[6]	= 'Registrar equipo';
	$labels[7]	= 'Especifica la contraseña usada en el Basket Assistant Manager';
	$labels[8]	= 'Contraseña';
	$labels[9]	= ' * Esta contraseña tiene que ser diferente a la usada en basketsim.com';
	$labels[10]	= 'Dirección de correo electrónico';
	$labels[11]	= 'Verificando la información del equipo';
	$labels[12]	= 'Esta operación es necesaria para prevenir que otra persona use tu equipo. Te recordamos que, de acuerdo con las normas del CBPP, esta información no se guardará. Esta operación está aprobada por Basketsim.';
	$labels[13]	= 'Usuario de Basketsim';
	$labels[14]	= 'Código CBPP';
	$labels[15]	= 'Atención! El código CBPP no es el mismo que tu contraseña. Este código CBPP puede cambiarse en tu perfil. Si introduces un código erróneo repetidamente, tu cuenta se bloqueará durante un tiempo.';
	$labels[16]	= 'Rellena todos los campos requeridos.';
	$labels[17]	= 'La contraseña debe tener almenos 5 caracteres';
	$labels[18]	= 'Error en la comunicación con el servidor de Basketsim.';
	$labels[19]	= 'Error al autentificar con el servidor de Basketsim. Por favor, revisa si los datos introducidos son correctos.';
	$labels[20]	= 'Ha ocurrido un error al analizar la información descargada. Por favor, contacta con el administrador de esta web.';
	$labels[21]	= 'Tu equipo ya está registrado.';
	$labels[22]	= 'No has establecido aún tu código CBPP. Para hacerlo, entra en basketsim y ve a tu perfil.';
	$labels[23]	= 'Error';
	$labels[24]	= 'Usuario';
	$labels[25]	= 'Contraseña';
	$labels[26]	= 'Recordar contraseña';
	$labels[27]	= 'ID equipo';
	$labels[28]	= 'Nombre del equipo';
	$labels[29]	= 'Abreviatura del equipo';
	$labels[30]	= 'País';
	$labels[31]	= 'Liga';
	$labels[32]	= 'No has establecido ninguna columna que sea visible. Por favor, visita la sección de ajustes para hacer las columnas visibles.';
	$labels[33]	= 'Columna';
	$labels[34]	= 'Visible';
	$labels[35]	= 'Ancho';
	$labels[36]	= 'Guardar cambios';
	$labels[37]	= 'Almenos una de las columnas debe ser visible';
	$labels[38]	= 'Loas cambios seleccionados se han guardado';
	$labels[39]	= 'Sólo se aceptan valores númericos para el ancho de columna';
	$labels[40]	= 'Tienes que especificar el ancho para las columnas visibles';
	$labels[41]	= 'El valor 0 no está permitido para el ancho de columna';
	$labels[42]	= 'Mensajes';
	$labels[43]	= '5 inicial';
	$labels[44]	= 'Prioridad';
	$labels[45]	= 'Banquillo';
	$labels[46]	= 'Calcula mi mejor 5!';
	$labels[47]	= 'Pulsa dos veces en una línea para mover el jugador de una tabla a otra';
	$labels[48]	= 'Para poder actualizar la información de tu equipo necesitamos la siguiente información';
	$labels[49]	= "Puedes ver los efectos de tus proporciones <a href='./index.php?tab=tools&subtab=bestpos&mainpage=bestpos'><font size='+1'>aquí</font></font></a>";
	$labels[50]	= "Tu equipo ya se ha registrado. Pulsa <a href='./index.php?tab=team&mainpage=teamplayers'><font size='+1'>aquí</font></font></a> para ver los detalles.";
	$labels[51]	= "En caso de no disponer aún de una cuenta, puedes <a href=\"index.php?tab=register&mainpage=register\"><font size=\"+1\"><b>registrar</b></font></a> tu equipo .";
	$labels[52]	= "Ha ocurrido un error durante el proceso XML de los jugadores. <BR>Por favor, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><font size=\"+1\"><b>contacta</b></font></a> el administrador web inmediatamente.";
	$labels[53]	= 'Entrenador';
	$labels[54]     = 'Pulsa para ordenar por #COL#';
	$labels[55]	= 'Tus datos de entrada se enviarán a esta dirección de correo electónico';
	$labels[56]     = 'Quiero usar los valores predeterminados para : #POSITION#';
	$labels[57]     = 'Pulsa aquí si quieres restaurar los valores predeterminados del BAM para todas las posiciones';
	$labels[58]     = 'Habilidad';
	$labels[59]     = 'Proporción';
	$labels[60]     = 'Activa';
	$labels[61]	= "No olvide de comprobar la sección <a href=\"./index.php?tab=bam&subtab=news&mainpage=news\"><font size=\"+1\"><b>noticias</b></font></a> para no perderte ninguna novedad.";
	$labels[62]	= 'Idioma';
	$labels[63]	= 'Muestra niveles de habilidad en';
	$labels[64]	= 'Texto';
	$labels[65]	= 'Valores numéricos';
	$labels[66]	= 'Error al guardar tus ajustes generales';
	$labels[67]	= "Ha ocurrido un error durante el proceso XML de los partidos. <BR>Por favor, <a href=\"index.php?tab=bam&subtab=contact&mainpage=contact\"><font size=\"+1\"><b>contacta</b></font></a> el administrador web inmediatamente.";
	$labels[68]	= 'Fecha del partido';
	$labels[69]	= 'Tipo de partido';
	$labels[70]	= 'Equipos';
	$labels[71]	= 'Resultado';
	$labels[72]	= 'Estado';
	$labels[73]	= "No se han encontrado partidos jugados por tu equipo. Puedes descargar tu lista de partidos <a href='index.php?tab=online&mainpage=onlteamdata'><font size=\"+1\"><b>aquí</b></font></a>";
	$labels[74]	= 'Pulsa aquí para más detalles del partido';
	$labels[75]	= "* Nota - Esta operación descargará también la información sobre tus partidos delas últimas 3 semanas. Además se descargarán los partidos de las próximas 3 semanas. Si quieres descargar el archivo de todos tus partidos pulsa <a href='index.php?tab=online&mainpage=onlteammatches'><font size=\"+1\"><b>aquí</b></font></a>";
	$labels[76]	= 'Descarga los partidos de los últimos';
	$labels[77]	= 'Clasificación';
	$labels[78]	= 'Estrategias';
	$labels[79]     = 'Entradas vendidas';
	$labels[80]     = 'Gradas laterales';
	$labels[81]     = 'Gradas de fondo';
	$labels[82]     = 'Gradas superiores';
	$labels[83]     = 'Palcos VIP';
	$labels[84]     = 'Total';
	$labels[85]     = 'Cuarto';
	$labels[86]     = 'Atrás';
	$labels[87]     = 'Puntos';
	$labels[88]     = 'Rebotes';
	$labels[89]     = 'Asistencias';
	$labels[90]     = 'Faltas';
	$labels[91]     = 'Robos';
	$labels[92]     = 'Pérdidas';
	$labels[93]     = 'Tapones';
	$labels[94]     = 'Nombre del jugador';
	$labels[95]     = 'Parece que tu equipo no está registrado. Por favor, usa la página de registro.';
	$labels[96]	= 'Se ha requerido a ti o a otra persona, tu contraseña para la web www.bamanager.net!';
	$labels[97]     = 'Recuperación de contraseña para bamanager.net';
	$labels[98]	= 'la contraseña ha sido enviada';
	$labels[99]	= 'Error al enviar la contraseña. Prueba de nuevo.';
	$labels[100]    = 'Descargando información de tu equipo, espera por favor ...';
	$labels[101]    = 'Envía mi contraseña BAM ';
	$labels[102]    = 'Pulsa aquí para ver los detalles del jugador';
	$labels[103]    = '#age# años de #country#. #height# cm, #weight# kg.';
	$labels[104]    = 'Este jugador es #caracter#. Gana #wage# &euro; / semana.';
	$labels[105]    = 'Evolución del entrenamiento';
	$labels[106]    = 'Lista de jugadores';
	$labels[107]    = 'Previo';
	$labels[108]    = 'Próximo';
	$labels[109]    = 'General';
	$labels[110]    = 'Habilidades';
	$labels[111]    = 'Lo siento, no se ha encontrado ninguna información del entrenamiento. Quizá no descargaste tu última información. Puedes descargar tu última información en la sección Descargas -> Información del equipo.';
	$labels[112]    = 'Entrenamiento';
	$labels[113]    = 'Este jugador no ha entrenado aún.';
	$labels[114]    = 'Fecha del entrenamiento';
	$labels[115]    = 'Tipo de entrenamiento';
	$labels[116]    = 'Posición';
	$labels[117]    = 'Estrellas';
	$labels[118]    = 'Este jugador no ha jugado ningún partido con tu equipo.';
	$labels[119]    = 'Base / Escolta';
	$labels[120]    = 'Hombres altos';
	$labels[121]    = 'Intensidad';
	$labels[122]    = 'sin información';
	$labels[123]    = 'Detalles del equipo';
	$labels[124]    = 'Información del entrenamiento';
	$labels[125]    = 'Gracias por usar el BAM, #USERNAME#.';
	$labels[126]    = 'ESTADÍSTICAS';
	$labels[127]    = 'Usuarios activos';
	$labels[128]    = 'Jugadores seguidos';
	$labels[129]    = 'Partidos descargados';
	$labels[130]    = 'Usuarios online';
	$labels[131]    = 'Es GRATIS';
	$labels[132]    = 'No hay mensajes';
	$labels[133]    = 'Para';
	$labels[134]    = 'Asunto';
	$labels[135]    = 'Mensaje';
	$labels[136]    = 'Enviado';
	$labels[137]    = 'Rellena el destinatario';
	$labels[138]    = 'Rellena el asunto';
	$labels[139]    = 'Rellena el cuadro de texto del mensaje';
	$labels[140]    = 'El usuario no existe';
	$labels[141]    = 'De';
	$labels[142]    = 'Fecha';
	$labels[143]    = 'Mensaje leído';
	$labels[144]    = 'Responder';
	$labels[145]    = 'Preferenncias';
	$labels[146]    = 'Cambiar contraseña';
	$labels[147]    = 'Contraseña antigua';
	$labels[148]    = 'Nueva contraseña';
	$labels[149]    = 'Confirma la nueva contraseña';
	$labels[150]    = 'Cambia mi contraseña';
	$labels[151]    = 'La contraseña antigua especificada no es tu actual contraseña';
	$labels[152]    = 'La nueva contraseña es diferente de la confirmada en nueva contraseña';
	$labels[153]    = 'La nueva contraseña debe contener almenos 5 caracteres';
	$labels[154]    = 'Tu nueva contraseña se ha guardado';
	$labels[155]    = 'Restaura todas las posiciones';
	$labels[156]    = 'Hemos encontrado #NUMBER# posibles combinaciones!';
	$labels[157]    = 'Vendedor';
	$labels[158]    = 'Comprador';
	$labels[159]    = 'Precio';
	$labels[160]    = 'No se han encobtrado traspasos';
	$labels[161]    = 'jugador retirado';
	$labels[162]    = 'Total compras:';
	$labels[163]    = 'Media (compras):';
	$labels[164]    = 'Total ventas:';
	$labels[165]    = 'Media (ventas):';
	$labels[166]    = 'Diferencia:';
	$labels[167]    = 'Media (ventas+compras):';
	$labels[168]    = 'Número de traspasos:';
	$labels[169]    = 'Pulsa aquí para ver el historial de entrenamiento';
	$labels[170]    = 'Notas';
	$labels[171]    = 'Guardar nota';
	$labels[172]    = 'Entra gratis!';
	$labels[173]    = 'Muestra este jugador a tu seleccionador nacional!';
	$labels[174]    = 'Oculta este jugador a tu seleccionador nacional!';
	$labels[175]    = 'Descarga información de la selección nacional';
	$labels[176]    = 'Lo siento, no eres seleccionador nacional por lo que no se te permite descargar esta información';
?>