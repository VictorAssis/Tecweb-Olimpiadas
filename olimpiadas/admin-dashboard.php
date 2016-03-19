<?php include("header-admin.php"); ?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Bem vindo {{Nome do Admin}}.</h1>
	<div class="coluna50">
		<h2 class="subtitulo">Eventos por Modalidade</h2>
		<canvas id="grafico1" width="400" height="400"></canvas>
	</div>
	<div class="coluna50">
		<h2 class="subtitulo">Modalidades por Local</h2>
		<canvas id="grafico2" width="400" height="400"></canvas>
	</div>
	<div class="clear"></div>
</section>
<?php include("footer-admin.php"); ?>