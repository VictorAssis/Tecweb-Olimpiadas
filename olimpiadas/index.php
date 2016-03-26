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
			<form>
				<p class="form-group"><label for="data">Data</label>
				<input type="text" name="data" id="data" class="campo" /></p>
				<p class="form-group"><label for="modalidade">Modalidade</label>
				<input type="text" name="modalidade" id="modalidade" class="campo" /></p>
				<p class="form-group"><label for="locais">Locais</label>
				<input type="text" name="locais" id="locais" class="campo" /></p>
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
			<tbody>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
				<tr>
					<td>03 Ago 2016 13h - 18h</td>
					<td>Futebol</td>
					<td>Feminino - primeira fase (FB001)</td>
					<td>Estádio Olímpico</td>
					<td>40,00 - 70,00</td>
					<td><a class="botao-comprar" href="javascript: alert('Compra realizada com sucesso.');"><i class="fa fa-shopping-cart"></i></a></td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
<?php include("footer.php"); ?>