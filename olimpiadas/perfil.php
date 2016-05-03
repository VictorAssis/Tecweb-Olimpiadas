<?php
	include("init.php");

    $usuario = new Usuario();

    if (isset($_POST['btnSalvar'])) {
        $usuario->id = $_SESSION['Usuario']['id'];
		$usuario->nome = $_POST['nome'];
		$usuario->email = $_POST['email'];
		$usuario->senha = $_POST['senha'] != '' ? $_POST['senha'] : null;
		$usuario->cpf = $_POST['cpf'];
		$usuario->telefone = $_POST['telefone'];
		$usuario->endereco = $_POST['endereco'];
		$usuario->data_nascimento = $_POST['data_nascimento'];

        if ($usuario->update())
            mensagemSucesso("Perfil alterado com sucesso.");
        else 
            mensagemErro("Falha ao alterar perfil, tente novamente.");
    }

    $item = $usuario->findById($_SESSION['Usuario']['id']);
    $item = $item[0];

	include("header.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Meu Perfil</h1>
	<form action="" method="post">
		<p class="form-group"><label for="nome">Nome: </label>
		<input type="text" name="nome" maxlength="20" placeholder="Seu nome" class="campo" required="required" value="<?php echo $item['nome']; ?>"></p>
		<p class="form-group"><label for="cpf">CPF: </label>
		<input type="text" name="cpf" maxlength="11" placeholder="CPF" class="campocpf campo" required="required" value="<?php echo $item['cpf']; ?>"></p>
		<p class="form-group"><label for="telefone">Telefone: </label>
		<input type="text" name="telefone" maxlength="11" placeholder="Telefone" class="campofone campo" required="required" value="<?php echo $item['telefone']; ?>"></p>
		<p class="form-group"><label for="password">E-mail: </label>
		<input type="text" name="email" placeholder="E-mail" class="campo" required="required" value="<?php echo $item['email']; ?>"></p>
		<p class="form-group"><label for="password">Nova Senha: </label>
		<input type="password" name="senha" placeholder="Senha" class="campo"></p>
		<p class="form-group"><label for="endereco">Endereço: </label>
		<input type="text" name="endereco" placeholder="Endereço" class="campo" required="required" value="<?php echo $item['endereco']; ?>"></p>
		<p class="form-group"><label for="data">Data de nascimento: </label>
		<input type="text" name="data_nascimento" maxlength="10" placeholder="Data de Nascimento" class="campodata campo" required="required" value="<?php echo date('d/m/Y',strtotime($item['data_nascimento'])); ?>"></p>
		<input type="submit" value ="Salvar" class="botao" name="btnSalvar">
	</form>
</section>
<?php  
	include("footer.php");
?>