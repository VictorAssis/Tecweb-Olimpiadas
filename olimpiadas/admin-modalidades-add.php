<?php
    include("init.php");

    $modalidade = new Modalidade();
    $upload = new Upload();

    if (isset($_POST['btnCadastrar'])) {
        $foto_destaque = $upload->uploadFile($_FILES['foto_destaque']);
        $foto_lista = $upload->uploadFile($_FILES['foto_lista']);

        $modalidade->nome = $_POST['nome'];
        $modalidade->foto_destaque = $foto_destaque;
        $modalidade->foto_lista = $foto_lista;
        $modalidade->finalidade = $_POST['finalidade'];
        $modalidade->provas = $_POST['provas'];
        $modalidade->estreia = $_POST['estreia'];
        $modalidade->regras = $_POST['regras'];

        if ($modalidade->create()) {
            mensagemSucesso("Modalidade criada com sucesso.");
            header("Location: admin-modalidades-listar.php");
            die();
        } else 
            mensagemErro("Falha ao criar modalidade, tente novamente.");
    }

    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Adicionar Modalidade <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form enctype="multipart/form-data" action="" method="post">
        <p class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="campo" placeholder="Futebol, Volei, etc..." required="required" maxlength="100"/>
        </p>
        <p class="form-group">
            <label for="foto_destaque">Foto destaque</label>
            <input type="file" name="foto_destaque" id="foto_destaque" class="campo" required="required" />
        </p>
        <p class="form-group">
            <label for="foto_lista">Foto lista</label>
            <input type="file" name="foto_lista" id="foto_lista" class="campo" required="required" />
        </p>
        <p class="form-group">
            <label for="finalidade">Finalidade</label>
            <textarea name="finalidade" id="finalidade" class="campo" required="required"></textarea>
        </p>
        <p class="form-group">
            <label for="provas">Provas</label>
            <textarea name="provas" id="provas" class="campo tinyEditor"></textarea>
        </p>
        <p class="form-group">
            <label for="estreia">Estréia nos Jogos Olímpicos</label>
            <input type="text" name="estreia" id="estreia" class="campo" placeholder="Atenas 1986" required="required" maxlength="255" />
        </p>
        <p class="form-group">
            <label for="regras">Regras do Jogo</label>
            <textarea name="regras" id="regras" class="campo tinyEditor"></textarea>
        </p>
        <p class="form-group">
            <input type="submit" name="btnCadastrar" class="botao" value="Cadastrar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>