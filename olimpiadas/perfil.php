<?php
	$logado = true;  
	include("header.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Meu Perfil</h1>
	<p class="form-group"><label for="nome">Nome: </label>
	<input type="text" name="nome" maxlength="20" placeholder="Seu nome" class="campo"></p>
	<p class="form-group"><label for="cpf">CPF: </label>
	<input type="text" name="cpf" maxlength="11" placeholder="CPF" class="campocpf campo"></p>
	<p class="form-group"><label for="telefone">Telefone: </label>
	<input type="text" name="telefone" maxlength="11" placeholder="Telefone" class="campofone campo"></p>
	<p class="form-group"><label for="password">E-mail: </label>
	<input type="text" name="email" placeholder="E-mail" class="campo"></p>
	<p class="form-group"><label for="password">Senha: </label>
	<input type="password" name="password" placeholder="Senha" class="campo"></p>
	<p class="form-group"><label for="endereco">Endereço: </label>
	<input type="text" name="endereco" placeholder="Endereço" class="campo"></p>
	<p class="form-group"><label for="data">Data de nascimento: </label>
	<input type="text" name="data" maxlength="10" placeholder="Data de Nascimento" class="campodata campo"></p>
	<input type="submit" value ="Salvar" class="botao">
	<input type="submit" value ="Cancelar" class="botao">
</section>
<?php  
	include("footer.php");
?>