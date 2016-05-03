<?php
	global $classBody;
	$classBody = array("home");
	include("init.php");
	include("header.php");
?>
<section id="content">
	<div class="banner-home">
		<div class="slider-home">
			<ul class="slides">
				<li><img src="images/atletas/1.jpg"/></li>
				<li><img src="images/atletas/2.jpg"/></li>
				<li><img src="images/atletas/3.jpg"/></li>
				<li><img src="images/atletas/4.jpg"/></li>
			</ul>
		</div>
		<div class="overlay"></div>
		<a class="chamada-banner animated-scroll" href="#eventos">VER EVENTOS E<br/>COMPRAR INGRESSOS<br/><i class="fa fa-angle-double-down"></i></a>
	</div>
	<div class="container" id="eventos">
		<div class="box-infos">
			<div class="info info-laranja">
				<h2>Encontre os eventos desejados</h2>
			</div>
			<div class="info info-vermelha">
				<h2>Adicione ingressos ao carrinho</h2>
			</div>
			<div class="info info-amarela">
				<h2>Finalize sua compra e pague online</h2>
			</div>
			<div class="clear"></div>
		</div>
		<div class="filtro-container">
			<h2>Filtre os eventos</h2>
			<form action="" method="post" id="form-filtro-home">
				<p class="form-group"><label for="data">Data</label>
				<input type="text" name="data" id="data" class="campo campodata" /></p>
				<p class="form-group"><label for="modalidade">Modalidade</label>
				<?php
					$modalidade = new Modalidade();
	    			$modalidades = $modalidade->find();
	    		?>
				<select name="modalidade" id="modalidade" class="campo">
					<option value="">Todas</option>
				<?php foreach ($modalidades as $modalidade) { ?>
	            	<option value="<?php echo $modalidade['id']; ?>"><?php echo $modalidade['nome']; ?></option>
	            <?php } ?>
				</select></p>
				<p class="form-group"><label for="local">Local</label>
				<?php
					$local = new Local();
	    			$locais = $local->find();
	    		?>
				<select name="local" id="local" class="campo">
					<option value="">Todos</option>
				<?php foreach ($locais as $local) { ?>
	            	<option value="<?php echo $local['id']; ?>"><?php echo $local['nome']; ?></option>
	            <?php } ?>
				</select></p>
				<p class="form-group"><label for="pesquisa">Pesquisa</label>
				<input type="text" name="pesquisa" id="pesquisa" class="campo" /></p>
				<input type="submit" class="botao botao-claro">
			</form>
			<div class="clear"></div>
		</div>
		<table class="table tabela-eventos">
			<thead>
				<tr>
					<th>Data</th>
					<th>Esporte</th>
					<th>Descrição</th>
					<th>Local</th>
					<th>Preço</th>
					<th class="coluna-botao"></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</section>
<?php include("footer.php"); ?>