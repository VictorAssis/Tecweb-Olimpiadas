<?php
	if (!isset($_SESSION["Usuario"]) || $_SESSION["Usuario"]["usuarios_tipos_id"] != 1) {
		header("Location: index.php");
		die();
	}
?>
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

	<!-- Plugin de Multiple Select -->
	<link rel="stylesheet" type="text/css" href="style/multiple-select.css">
	
	<!-- Arquivos de Estilo -->
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/estilos.css">
	<!-- Estilos Jquery UI -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<!-- Inclui jQuery -->
	<script type="text/javascript" src="scripts/jquery-1.12.1.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>
<body class="<?php bodyClass(); ?>">
	<header id="cabecalho" class="cabecalho-inicial">
		<a class="logo" href="admin-dashboard.php">Rio 2016</a>
		<ul class="menu">
			<li><a href="admin-dashboard.php">Dashboard</a></li>
			<li><a href="admin-eventos-listar.php">Eventos</a></li>
			<li><a href="admin-locais-listar.php">Locais</a></li>
			<li><a href="admin-modalidades-listar.php">Modalidades</a></li>
			<li><a href="logout.php">Sair</a></li>
		</ul>
	</header>