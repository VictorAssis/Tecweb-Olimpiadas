<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Olimpiadas</title>

	<!-- Fonts do Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Raleway' rel='stylesheet' type='text/css'>

	<!-- Ícones Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Estilos Jquery UI -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">	
	<!-- FlexSlider -->
	<link rel="stylesheet" href="style/flexslider.css" type="text/css" media="screen" />
	
	<!-- Arquivos de Estilo -->
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/estilos.css">

	<!-- Inclui jQuery -->
	<script type="text/javascript" src="scripts/jquery-1.12.1.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>
<body class="<?php bodyClass(); ?>">
	<header id="cabecalho" class="cabecalho-inicial">
		<a class="logo" href="index.php">Rio 2016</a>
		<ul class="menu">
			<li><a href="index.php#eventos">Eventos</a></li>
			<li><a href="modalidades.php">Modalidades</a></li>
			<li><a href="locais.php">Locais</a></li>
			<li><a href="ajuda.php">Ajuda</a></li>
			<li><a href="contato.php">Contato</a></li>
			<?php if (isset($_SESSION['Usuario']) && $_SESSION["Usuario"]["usuarios_tipos_id"] == 2) { ?>
			<li><a href="meus-eventos.php">Meus Eventos</a></li>
			<li><a href="perfil.php">Perfil</a></li>
			<li><a href="logout.php">Sair</a></li>
			<?php } else { ?>
			<li><a href="login.php">Login</a></li>
			<?php } ?>
		</ul>
	</header>
	<?php exibirMensagens(); ?>