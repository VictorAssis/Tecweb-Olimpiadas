<?php
include ("init.php");

$modalidade = new Modalidade();
$item = $modalidade->findById($_GET['id']);
$item = $item[0];

include ("header.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina"><?php echo $item['nome']; ?></h1>
	<img src="uploads/<?php echo $item['foto_destaque']; ?>">
	<h2 class="subtitulo-modalidade">Ficha Técnica</h2>
	<table class="tabela-ficha">
		<tr>
			<td><i class="fa fa-bullseye"></i></td>
			<td class="nome-ficha">Finalidade</td>
			<td><?php echo $item['finalidade']; ?></td>
		</tr>
		<tr>
			<td><i class="fa fa-trophy"></i></td>
			<td class="nome-ficha">Provas</td>
			<td><?php echo $item['provas']; ?></td>
		</tr>
		<tr>
			<td><i class="fa fa-map-marker"></i></td>
			<td class="nome-ficha">Estréia nos Jogos Olímpicos</td>
			<td><?php echo $item['estreia']; ?></td>
		</tr>
	</table>
	<h2 class="subtitulo-modalidade">Regras do Jogos</h2>
	<?php echo $item['regras']; ?>

	<h2 class="subtitulo-modalidade">Locais</h2>
	<div class="clear"></div>

</section>
<?php include ("footer.php"); ?>