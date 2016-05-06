<?php
    include("init.php");

    $evento = new Evento();

    if (isset($_POST['btnSalvar'])) {
        $evento->id = $_POST['id'];
        $evento->locais_id = $_POST['locais_id'];
        $evento->modalidades_id = $_POST['modalidades_id'];
        $evento->data = $_POST['data'];
        $evento->descricao = $_POST['descricao'];
        $evento->preco = $_POST['preco'];

        if ($evento->update()) {
            mensagemSucesso("Evento alterado com sucesso.");
            header("Location: admin-eventos-listar.php");
            die();
        } else 
            mensagemErro("Falha ao alterar evento, tente novamente.");
    }

    $item = $evento->findById($_GET['id']);
    $item = $item[0];

    $modalidade = new Modalidade();
    $modalidades = $modalidade->find();

    $local = new Local();
    $locais = $local->find();

    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Editar Evento <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
		<p class="form-group">
            <label for="data">Data</label>
            <input type="text" id="data" class="campo campodatahora" placeholder="dd/mm/aaaa hh:mm" required="required" name="data" value="<?php echo date('d/m/Y H:i',strtotime($item['data'])); ?>" />
        </p>
        <p class="form-group"> 
            <label for="modalidade">Modalidade</label>
            <select name="modalidades_id" id="modalidade" class="campo" required="required">
            	<option "">Selecione uma modalidade</option>
            <?php foreach ($modalidades as $modalidade) { ?>
                <option value="<?php echo $modalidade['id']; ?>" <?php echo $item['modalidades_id'] == $modalidade['id'] ? 'selected' : ''; ?>><?php echo $modalidade['nome']; ?></option>
            <?php } ?>
            </select>
        </p>
        <p class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="campo" placeholder="Descrição do evento" required="required"><?php echo $item['descricao']; ?></textarea>
        </p>    
        <p class="form-group"> 
            <label for="local">Local</label>
            <select name="locais_id" id="local" class="campo" required="required">
            	<option "">Selecione um local</option>
            <?php foreach ($locais as $local) { ?>
                <option value="<?php echo $local['id']; ?>" <?php echo $item['locais_id'] == $local['id'] ? 'selected' : ''; ?>><?php echo $local['nome']; ?></option>
            <?php } ?>
            </select>
        </p>
        <p class="form-group"> 
            <label for="preco">Preço (R$)</label>
            <input type="text" id="preco" class="campo campopreco" placeholder="9,99" name="preco" value="<?php echo number_format($item['preco'],2,',',''); ?>" required="required"/>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Salvar" name="btnSalvar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>