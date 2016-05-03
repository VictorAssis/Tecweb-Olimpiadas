<?php
	include("init.php");

	$evento = new Evento();

	if (isset($_POST["btnExcluir"])) {
		$evento->id = $_POST["id"];
		if ($evento->delete())
			mensagemSucesso("Evento deletado com sucesso.");
		else
			mensagemErro("Falha ao deletar evento, tente novamente.");
	}

	$itens = $evento->find();

	include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Eventos <a class="botao botao-titulo" href="admin-eventos-add.php">Adicionar novo</a></h1>
	<table class="table tabela-eventos">
		<thead>
			<tr>
				<th>ID</th>
				<th>Data</th>
				<th>Modalidade</th>
				<th>Descrição</th>
				<th>Local</th>
				<th>Preço</th>
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
				<td><?php echo date('d/m/Y H:i:s',strtotime($item['data'])); ?></td>
				<td><?php echo $item['modalidade']; ?></td>
				<td><?php echo $item['descricao']; ?></td>
				<td><?php echo $item['local']; ?></td>
				<td><?php echo number_format($item['preco'],2,',',''); ?></td>
				<td><a class="botao-comprar" href="admin-eventos-edit.php?id=<?php echo $item['id']; ?>"><i class="fa fa-pencil"></i></a></td>
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
				<td colspan="8">Nenhum evento encontrado.</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</section>
<?php include("footer-admin.php"); ?>