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

    $atracao = new Atracao();

    if (isset($_POST["btnExcluir"])) {
        $atracao->id = $_POST["id"];
        if ($atracao->delete())
            mensagemSucesso("Atração deletada com sucesso.");
        else
            mensagemErro("Falha ao deletar atração, tente novamente.");
    }

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
    <?php
        $itens = $atracao->findByLocal($_GET['id']);
    ?>
    <h1 class="titulo-pagina">Atrações <a class="botao botao-titulo" href="admin-atracoes-add.php?locais_id=<?php echo $item['id']; ?>">Adicionar novo</a></h1>
    <table class="table tabela-eventos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th class="coluna-botao"></th>
                <th class="coluna-botao"></th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if ($itens) { 
                foreach ($itens as $item) {
        ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['descricao']; ?></td>
                <td><?php
                    switch ($item['tipo']) {
                        case 0:
                            echo "Bares";
                            break;
                        case 1:
                            echo "Museus";
                            break;
                        case 2:
                            echo "Parques";
                            break;
                        default:
                            echo "Sem tipo";
                            break;
                    }
                ?></td>
                <td><a class="botao-comprar" href="admin-atracoes-edit.php?id=<?php echo $item['id']; ?>&locais_id=<?php echo $_GET['id']; ?>"><i class="fa fa-pencil"></i></a></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                        <button type="submit" name="btnExcluir" class="botao-comprar" onclick="return confirm('Tem certeza que deseja excluir este registro?');">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php
                }
            } else {
        ?>
            <tr>
                <td colspan="5">Nenhum local encontrado.</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>
<?php include("footer-admin.php"); ?>