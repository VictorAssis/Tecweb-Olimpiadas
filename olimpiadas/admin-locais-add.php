<?php
    include("init.php");

    $local = new Local();

    if (isset($_POST['btnCadastrar'])) {
        $local->nome = $_POST['nome'];
        $local->descricao = $_POST['descricao'];

        if ($local->create()) {
            mensagemSucesso("Local criado com sucesso.");
            header("Location: admin-locais-listar.php");
            die();
        } else 
            mensagemErro("Falha ao criar local, tente novamente.");
    }

    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Adicionar Local <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form method="post" action="">
		<p class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="campo" placeholder="Belo Horizonte" required="required" />
        </p>
        <p class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="campo tinyEditor" placeholder="Descrição do local"></textarea>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Cadastrar" name="btnCadastrar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>