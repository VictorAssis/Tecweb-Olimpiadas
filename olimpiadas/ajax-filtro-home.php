<?php
	include("init.php");

	$data = $_POST['data'] != "" ? $_POST['data'] : null;
	$modalidade = $_POST['modalidade'] != "" ? $_POST['modalidade'] : null;
	$local = $_POST['local'] != "" ? $_POST['local'] : null;
	$pesquisa = $_POST['pesquisa'] != "" ? $_POST['pesquisa'] : null;

	$evento = new Evento();
	$itens = $evento->find($data,$modalidade,$local,$pesquisa);

	if ($itens) { 
		foreach ($itens as $item) {
?>
	<tr>
		<td><?php echo date('d/m/Y H:i:s',strtotime($item['data'])); ?></td>
		<td><?php echo $item['modalidade']; ?></td>
		<td><?php echo $item['descricao']; ?></td>
		<td><?php echo $item['local']; ?></td>
		<td>R$<?php echo number_format($item['preco'],2,',',''); ?></td>
		<td><a class="botao-comprar" data-evento-id="<?php echo $item['id']; ?>"><i class="fa fa-shopping-cart"></i></a></td>
	</tr>
<?php
		}
	} else {
?>
	<tr>
		<td colspan="6">Nenhum evento encontrado.</td>
	</tr>
<?php } ?>