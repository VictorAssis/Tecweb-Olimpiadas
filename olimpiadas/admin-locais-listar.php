<?php
	include("init.php");

	$local = new Local();

	if (isset($_POST["btnExcluir"])) {
		$local->id = $_POST["id"];
		if ($local->delete())
			mensagemSucesso("Local deletado com sucesso.");
		else
			mensagemErro("Falha ao deletar local, tente novamente.");
	}

	$itens = $local->find();

	include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Locais <a class="botao botao-titulo" href="admin-locais-add.php">Adicionar novo</a></h1>
	<table class="table tabela-eventos">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Modalidades</th>
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
				<td><?php echo count($item['modalidades']) ? implode(", ",$item['modalidades']) : '-'; ?></td>
				<td><a class="botao-comprar" href="admin-locais-edit.php?id=<?php echo $item['id']; ?>"><i class="fa fa-pencil"></i></a></td>
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