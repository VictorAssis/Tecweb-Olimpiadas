<?php
    include("init.php");

    $atracao = new Atracao();

    if (isset($_POST['btnSalvar'])) {
        $atracao->id = $_POST['id'];
        $atracao->nome = $_POST['nome'];
        $atracao->descricao = $_POST['descricao'];
        $atracao->link = $_POST['link'];
        $atracao->tipo = $_POST['tipo'];
        $atracao->geolocalizacao = $_POST['geolocalizacao'];

        if ($atracao->update()) {
            mensagemSucesso("Atração salva com sucesso.");
            header("Location: admin-locais-edit.php?id=" . $_GET['locais_id']);
            die();
        } else 
            mensagemErro("Falha ao salvar atração, tente novamente.");
    }

    $item = $atracao->findById($_GET['id']);
    $item = $item[0];

    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Editar Atração <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
        <input type="hidden" name="locais_id" value="<?php echo $item['locais_id']; ?>" />
        <p class="form-group"> 
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="campo" placeholder="Nome da atração" name="nome" required="required" value="<?php echo $item['nome']; ?>"/>
        </p>
        <p class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="campo" placeholder="Descrição da atração" required="required"><?php echo $item['descricao']; ?></textarea>
        </p>
        <p class="form-group"> 
            <label for="link">Link</label>
            <input type="text" id="link" class="campo" placeholder="Link da atração" name="link" required="required" value="<?php echo $item['link']; ?>"/>
        </p>    
        <p class="form-group"> 
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="campo" required="required">
                <option value="">Selecione um tipo</option>
                <option value="0" <?php echo $item['tipo'] == 0 ? 'selected' : ''; ?>>Bares</option>
                <option value="1" <?php echo $item['tipo'] == 1 ? 'selected' : ''; ?>>Museus</option>
            	<option value="2" <?php echo $item['tipo'] == 2 ? 'selected' : ''; ?>>Parques</option>
            </select>
        </p>
        <p class="form-group"> 
            <label for="geolocalizacao">Geolocalização</label>
            <input type="text" id="geolocalizacao" class="campo" placeholder="Geolocalização da atração" name="geolocalizacao" required="required" value="<?php echo $item['geolocalizacao']; ?>"/>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Salvar" name="btnSalvar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>