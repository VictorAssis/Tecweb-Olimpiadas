<?php
    include("init.php");

    $modalidade = new Modalidade();
    $upload = new Upload();

    if (isset($_POST['btnSalvar'])) {        
        if ($_FILES['foto_destaque']['tmp_name'] != '')
            $foto_destaque = $upload->uploadFile($_FILES['foto_destaque']);
        else
            $foto_destaque = $_POST['foto_destaque'];
        if ($_FILES['foto_lista']['tmp_name'] != '')
            $foto_lista = $upload->uploadFile($_FILES['foto_lista']);
        else
            $foto_lista = $_POST['foto_lista'];

        $modalidade->id = $_POST['id'];
        $modalidade->nome = $_POST['nome'];
        $modalidade->foto_destaque = $foto_destaque;
        $modalidade->foto_lista = $foto_lista;
        $modalidade->finalidade = $_POST['finalidade'];
        $modalidade->provas = $_POST['provas'];
        $modalidade->estreia = $_POST['estreia'];
        $modalidade->regras = $_POST['regras'];

        if ($modalidade->update()) {
            mensagemSucesso("Modalidade alterada com sucesso.");
            header("Location: admin-modalidades-listar.php");
            die();
        } else 
            mensagemErro("Falha ao alterar modalidade, tente novamente.");
    }

    $item = $modalidade->findById($_GET['id']);
    $item = $item[0];
    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Editar Modalidade <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form enctype="multipart/form-data" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
        <p class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $item['nome']; ?>" class="campo" placeholder="Futebol, Volei, etc..." required="required" maxlength="100"/>
        </p>
        <p class="form-group uploadEdit">
            <label for="foto_destaque">Foto destaque</label>
            <img class="preview-foto" src="uploads/<?php echo $item['foto_destaque']; ?>" />
            <a class="alterar-foto">Alterar foto</a>
            <input type="file" name="foto_destaque" id="foto_destaque" class="campo"/>
            <input type="hidden" name="foto_destaque" value="<?php echo $item['foto_destaque']; ?>"/>
        </p>
        <p class="form-group uploadEdit">
            <label for="foto_lista">Foto lista</label>
            <img class="preview-foto" src="uploads/<?php echo $item['foto_lista']; ?>" />
            <a class="alterar-foto">Alterar foto</a>
            <input type="file" name="foto_lista" id="foto_lista" class="campo"/>
            <input type="hidden" name="foto_lista" value="<?php echo $item['foto_lista']; ?>"/>
        </p>
        <p class="form-group">
            <label for="finalidade">Finalidade</label>
            <textarea name="finalidade" id="finalidade" class="campo" required="required"><?php echo $item['finalidade']; ?></textarea>
        </p>
        <p class="form-group">
            <label for="provas">Provas</label>
            <textarea name="provas" id="provas" class="campo tinyEditor"><?php echo $item['provas']; ?></textarea>
        </p>
        <p class="form-group">
            <label for="estreia">Estréia nos Jogos Olímpicos</label>
            <input type="text" name="estreia" id="estreia" value="<?php echo $item['estreia']; ?>" class="campo" placeholder="Atenas 1986" required="required" maxlength="255" />
        </p>
        <p class="form-group">
            <label for="regras">Regras do Jogo</label>
            <textarea name="regras" id="regras" class="campo tinyEditor"><?php echo $item['regras']; ?></textarea>
        </p>
        <p class="form-group">
            <input type="submit" name="btnSalvar" class="botao" value="Salvar" />
        </p>
    </form>
</section>
<?php include("footer-admin.php"); ?>