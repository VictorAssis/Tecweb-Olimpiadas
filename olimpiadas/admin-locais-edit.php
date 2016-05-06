<?php
    include("init.php");

    $local = new Local();

    if (isset($_POST['btnSalvar'])) {
        $local->id = $_POST['id'];
        $local->nome = $_POST['nome'];
        $local->descricao = $_POST['descricao'];

        if ($local->update()) {
            mensagemSucesso("Local alterado com sucesso.");
            header("Location: admin-locais-listar.php");
            die();
        } else 
            mensagemErro("Falha ao alterar local, tente novamente.");
    }

    $item = $local->findById($_GET['id']);
    $item = $item[0];

    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Editar Local <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
		<p class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="campo" placeholder="Belo Horizonte" required="required" value="<?php echo $item['nome']; ?>" />
        </p>
        <p class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="campo tinyEditor" placeholder="Descrição do local"><?php echo $item['descricao']; ?></textarea>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Salvar" name="btnSalvar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>