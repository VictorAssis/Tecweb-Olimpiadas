<?php
	include("init.php");

	$modalidade = new Modalidade();

	if (isset($_POST["btnExcluir"])) {
		$modalidade->id = $_POST["id"];
		if ($modalidade->delete())
			mensagemSucesso("Modalidade deletada com sucesso.");
		else
			mensagemErro("Falha ao deletar modalidade, tente novamente.");
	}

	$itens = $modalidade->find();

	include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Modalidades <a class="botao botao-titulo" href="admin-modalidades-add.php">Adicionar novo</a></h1>
	<table class="table tabela-eventos">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
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
				<td><a class="botao-comprar" href="admin-modalidades-edit.php?id=<?php echo $item['id']; ?>"><i class="fa fa-pencil"></i></a></td>
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
				<td colspan="4">Nenhuma modalidade encontrada.</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</section>
<?php include("footer-admin.php"); ?>