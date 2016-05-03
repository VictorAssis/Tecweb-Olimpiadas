<?php
include ("init.php");

$modalidade = new Modalidade();
$itens = $modalidade->find();

include ("header.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Modalidades</h1>
	<ol class="lista-interativa">
		<?php 
			if ($itens) { 
				foreach ($itens as $item) {
		?>
		<li>
			<a href="modalidade.php?id=<?php echo $item['id']; ?>">
				<img src="uploads/<?php echo $item['foto_lista']; ?>"/>
				<div class="hover">
					<h1><?php echo $item['nome']; ?></h1>
				</div>
			</a>
		</li>
		<?php
				}
			}
		?>
	<ol>
	<div class="clear"></div>

</section>

<!-- vôlei de praia, voleibol, ginástica artística, futebol-->

<?php include ("footer.php"); ?>