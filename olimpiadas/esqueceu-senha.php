<?php  
	include("init.php");

	if (isset($_POST["btnEnviar"])) {
		$usuario = new Usuario();
		$usuario->email = $_POST['email'];
		$resetou = $usuario->resetPassword();
		if ($resetou) {
			mensagemSucesso("Uma nova senha foi enviado para o e-mail inserido.");
		} else {
			mensagemErro("Login ou senha inválidos.");
		}
	}

	include("header.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Esqueceu sua senha?</h1>
	<p>Digite seu e-mail no campo abaixo:</p>
	<form action="" method="post">
		<p class="form-group">
		<br/><input type="text" name="email" maxlength="255" placeholder="E-mail" class="campo"></p>
		<br/><input type="submit" value ="Enviar" class="botao" name="btnEnviar">
	</form>
</section>
<?php  
	include("footer.php");
?>