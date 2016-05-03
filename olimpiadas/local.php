<?php
include ("init.php");

$local = new Local();
$item = $local->findById($_GET['id']);
$item = $item[0];

include ("header.php");
?>
<section id="content" class="container">
<h1 class ="titulo-pagina"><?php echo $item['nome']; ?></h1>
	  <div class="banner-local">
		<div class="slider-local">
			<ul class="slides">
				<li><img  src="images/locais/deodoro_0.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_1.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_2.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_3.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_4.jpg" width="1200" height="457"/></li>
			</ul>
		</div>
	</div>
	
	<br/>
	<h2 class ="titulo-pagina">Conheça o Local</h2>
	<?php echo $item['descricao']; ?>
	<br>
	<h2 class ="titulo-pagina">Legado</h2>
	<p>Os Jogos Olímpicos e Paralímpicos Rio 2016 deixarão de legado para a Região de Deodoro uma nova infraestrutura de centros comerciais e de lazer, assim como as instalações esportivas que comporão o Parque adical. Investimentos substanciais em infraestrutura de transporte vão melhorar o acesso desta região a Barra e a outras regiões do Rio.</p>
</section>
<?php include ("footer.php"); ?>