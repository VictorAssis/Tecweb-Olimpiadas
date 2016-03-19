<?php  
	include("header.php");
?>

<section id="content" class="container">
	<h1 class="titulo-pagina">Locais dos jogos</h1>
	<p class="form-group"><label for="regiao">Região: </label>
	<select name="regiao" size="1">
		<option value="" selected>Selecione</option>
		<option value="SD">Sudeste</option>
		<option value="SUL">Sul</option>
		<option value="CO">Centro-Oeste</option>
		<option value="NO">Norte</option>
		<option value="ND">Nordeste</option>
	</select>
	<p class="form-group"><label for="cidade">Cidade: </label>
	<select name="cidade" size="1">
		<option value="" selected>Selecione</option>
	</select>
	<p class="form-group"><label for="esporte">Esporte: </label>
	<select name="esporte" size="1">
		<option value="" selected>Selecione</option>
	</select>
	<br/><br/><input type="submit" value ="Pesquisar" class="botao">
</section>
<section id="content" class="container">
	<h1 class="titulo-pagina">Locais</h1>
	<ol class="lista-interativa">
	  <li>
	  	<a href="modalidade.php">
	  		<img src="images/locais/local_deodoro.jpg"/>
	  		<div class="hover">
	  			<h1>Deodoro</h1>
	  		</div>
	  	</a>
	  </li>
	  <li>
	  	<a href="modalidade.php">
	  		<img src="images/locais/maracana.jpg"/>
	  		<div class="hover">
	  			<h1>Maracanã</h1>
	  		</div>
	  	</a>
	  </li>
	  <li>
	  	<a href="modalidade.php">
	  		<img src="images/locais/barra.jpg"/>
	  		<div class="hover">
	  			<h1>Barra</h1>
	  		</div>
	  	</a>
	  </li>
	  <li>
	  	<a href="modalidade.php">
	  		<img src="images/locais/copacabana.jpg"/>
	  		<div class="hover">
	  			<h1>Copacabana</h1>
	  		</div>
	  	</a>
	  </li>
	<ol>
	<div class="clear"></div>

</section>

<?php  
	include("footer.php");
?>