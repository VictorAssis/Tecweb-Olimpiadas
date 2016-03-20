<?php  
	include("header.php");
?>
<section id="content" class="container">
	<div class="coluna50">
		<form method="post" action="index.html">
			<h1 class="titulo-pagina">Faça seu login</h1>
			<p class="form-group"><label for="login">Nome:</label>
			<input type="text" name="login" placeholder="Usuário ou E-mail" class="campo"></p>
	        <p class="form-group"><label for="password">Senha: </label>
	        <input type="password" name="password" placeholder="Senha" class="campo"></p>
	        <input type="submit" value ="Login" class="botao">        
			<br><br><a href="novasenha.html">Esqueceu sua senha?</a>
		</form>
	</div>
	<div class="coluna50">
		<h1 class="titulo-pagina">Cadastro</h1>
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
		<input type="submit" value ="Enviar" class="botao">
	</div>
	<div class="clear"></div>
</section>
<?php  
	include("footer.php");
?>