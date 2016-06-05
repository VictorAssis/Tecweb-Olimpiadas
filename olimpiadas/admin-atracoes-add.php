<?php
    include("init.php");

    $atracao = new Atracao();

    if (isset($_POST['btnCadastrar'])) {
        $atracao->locais_id = $_POST['locais_id'];
        $atracao->nome = $_POST['nome'];
        $atracao->descricao = $_POST['descricao'];
        $atracao->foto = '';
        $atracao->link = $_POST['link'];
        $atracao->tipo = $_POST['tipo'];
        $atracao->geolocalizacao = $_POST['geolocalizacao'];

        if ($atracao->create()) {
            mensagemSucesso("Atração criada com sucesso.");
            header("Location: admin-locais-edit.php?id=" . $_GET['locais_id']);
            die();
        } else 
            mensagemErro("Falha ao criar atração, tente novamente.");
    }

    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Adicionar Atração <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form method="post" action="">
        <input type="hidden" name="locais_id" value="<?php echo $_GET['locais_id']; ?>" />
        <p class="form-group"> 
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="campo" placeholder="Nome da atração" name="nome" required="required"/>
        </p>
        <p class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="campo" placeholder="Descrição da atração" required="required"></textarea>
        </p>
        <p class="form-group"> 
            <label for="link">Link</label>
            <input type="text" id="link" class="campo" placeholder="Link da atração" name="link" required="required"/>
        </p>    
        <p class="form-group"> 
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="campo" required="required">
                <option value="">Selecione um tipo</option>
                <option value="0">Bares</option>
                <option value="1">Museus</option>
            	<option value="2">Parques</option>
            </select>
        </p>
        <p class="form-group"> 
            <label for="geolocalizacao">Geolocalização</label>
            <input type="text" id="geolocalizacao" class="campo" placeholder="Geolocalização da atração" name="geolocalizacao" required="required"/>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Cadastrar" name="btnCadastrar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>