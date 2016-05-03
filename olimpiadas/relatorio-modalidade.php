<?php
	include("init.php");

	if (!isset($_SESSION['Usuario'])) {
		header("Location: index.php");
		die();
	}

	$evento = new Evento();
	$evento->usuarios_id = $_SESSION['Usuario']['id'];
	$eventos = $evento->eventosUsuario("modalidade_id ASC, data ASC");
	$grupoEventos = "";

	require_once("include/pdf/dompdf_config.inc.php");
		
	$html =	'
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Relatório de Eventos</title>
		<style>
			* {
				margin:0;
				padding:0;
				border:none;
			}
			body {
				font-family: Arial, sans-serif;
				font-size:12px;
				color: #444;
				background: #fff;
			}
			.container {padding: 30px 20px;}
			.logo {text-align:center;margin-bottom:20px;}
			p {margin: 0;padding-bottom:20px;line-height:150%;}
			p b {font-weight:bold;color:#111;}
			.table {width: 100%;margin-top:20px;margin-bottom:20px;}
			.table td, .table th {padding:10px;}
			.table th {background: #ddd;}
		</style>
	</head>
	<body>
		<div class="container">
			<p class="logo"><img src="images/logo-pdf.jpg" /></p>';
	if (count($eventos)) {
		foreach ($eventos as $evento) {
			if ($evento['modalidade_id'] != $grupoEventos) {
				if ($grupoEventos != "")
					$html .= "</tbody></table>";

				$grupoEventos = $evento['modalidade_id'];
				$html .= "<h1>" . $evento['modalidade'] . "</h1>";
				$html .= "<table class=\"table\" cellpadding=\"0\" cellspacing=\"0\">
				<thead>
					<tr>
						<th>ID</th>
						<th>Data</th>
						<th>Modalidade</th>
						<th>Descrição</th>
						<th>Local</th>
						<th>Preço</th>
						<th>Data compra</th>
					</tr>
				</thead>
				<tbody>";
			}
			$html .= "<tr>
				<td>" . $evento['idcompra'] . "</td>
				<td>" . date('d/m/Y H:i:s',strtotime($evento['data'])) . "</td>
				<td>" . $evento['modalidade'] . "</td>
				<td>" . $evento['descricao'] . "</td>
				<td>" . $evento['local'] . "</td>
				<td>R$" . number_format($evento['preco'],2,',','') . "</td>
				<td>" . date('d/m/Y H:i:s',strtotime($evento['datacompra'])) . "</td>
			</tr>";
		}
		$html .= "</tbody></table>";
	}
	else
		$html.= '<h1>Você não comprou ingressos para nenhum evento.</h1>';
	$html .= '
		</div>
	</body>
	</html>';

	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->set_paper('A4', 'portrait');
	$dompdf->render();
	$options['Attachment'] = 0;
	$dompdf->stream("RelatorioEventos.pdf",$options);
?>