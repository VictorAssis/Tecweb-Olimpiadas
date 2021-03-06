<?php
	include("init.php");
	
	if (isset($_POST["btnLogin"])) {
		$usuario = new Usuario();
		$usuario->email = $_POST['email'];
		$usuario->senha = $_POST['senha'];
		$usuarioLogado = $usuario->validate();
		if ($usuarioLogado['response']) {
			//Grava na sessão os dados do usuário
			$_SESSION["Usuario"] = $usuarioLogado["Usuario"];

			//Redireciona pra tela certa
			if ($usuarioLogado["Usuario"]["usuarios_tipos_id"] == 1)
				header("Location: admin-dashboard.php");
			else
				header("Location: meus-eventos.php");
			die();
		} else {
			mensagemErro("Login ou senha inválidos.");
		}
	}

	if (isset($_POST["btnCadastrar"])) {
		$usuario = new Usuario();
		$usuario->usuarios_tipos_id = 2;
		$usuario->nome = $_POST['nome'];
		$usuario->email = $_POST['email'];
		$usuario->senha = $_POST['senha'];
		$usuario->cpf = $_POST['cpf'];
		$usuario->telefone = $_POST['telefone'];
		$usuario->endereco = $_POST['endereco'];
		$usuario->data_nascimento = $_POST['data_nascimento'];

		if ($usuario->create())
            mensagemSucesso("Cadastro efetuado com sucesso. Já é possível realizar login.");
        else 
            mensagemErro("Falha ao cadastrar, tente novamente.");
	}

	include("header.php");
?>
<section id="content" class="container">
	<div class="coluna50">
		<h1 class="titulo-pagina">Faça seu login</h1>
		<form method="post" action="">
			<p class="form-group"><label for="email">Email:</label>
			<input type="email" name="email" id="email" placeholder="Email" class="campo" required="required" maxlength="255" value="<?php echo isset($_POST['email']) && isset($_POST['btnLogin']) ? $_POST['email'] : ""; ?>"></p>
	        <p class="form-group"><label for="senha">Senha:</label>
	        <input type="password" name="senha" id="senha" placeholder="Senha" class="campo" required="required" maxlength="50"></p>
	        <input type="submit" value="Login" name="btnLogin" class="botao">
	        <a href="login-facebook.php" class="botao botao-facebook">Entrar com Facebook</a>
			<br><br><a href="esqueceu-senha.php">Esqueceu sua senha?</a>
		</form>
	</div>
	<div class="coluna50">
		<h1 class="titulo-pagina">Cadastro</h1>
		<form method="post" action="">
			<p class="form-group"><label for="nome">Nome: </label>
			<input type="text" name="nome" maxlength="20" placeholder="Seu nome" class="campo" required="required"></p>
			<p class="form-group"><label for="cpf">CPF: </label>
			<input type="text" name="cpf" maxlength="11" placeholder="CPF" class="campocpf campo" required="required"></p>
			<p class="form-group"><label for="telefone">Telefone: </label>
			<input type="text" name="telefone" maxlength="11" placeholder="Telefone" class="campofone campo" required="required"></p>
			<p class="form-group"><label for="password">Email: </label>
			<input type="email" name="email" placeholder="Email" class="campo" required="required"></p>
			<p class="form-group"><label for="password">Senha: </label>
			<input type="password" name="senha" placeholder="Senha" class="campo" required="required"></p>
			<p class="form-group"><label for="endereco">Endereço: </label>
			<input type="text" name="endereco" placeholder="Endereço" class="campo" required="required"></p>
			<p class="form-group"><label for="data">Data de nascimento: </label>
			<input type="text" name="data_nascimento" maxlength="10" placeholder="Data de Nascimento" class="campodata campo" required="required"></p>
			<input type="submit" value="Enviar" class="botao" name="btnCadastrar">
		</form>
	</div>
	<div class="clear"></div>
</section>
<?php  
	include("footer.php");
?>