<?php
	include("init.php");
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
			<tr>
				<td>1</td>
				<td>Futebol</td>
				<td><a class="botao-comprar" href="admin-modalidades-edit.php"><i class="fa fa-pencil"></i></a></td>
				<td><a class="botao-comprar" href="javascript: confirm('Tem certeza que deseja excluir este registro?')"><i class="fa fa-trash"></i></a></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Voleibol</td>
				<td><a class="botao-comprar" href="admin-modalidades-edit.php"><i class="fa fa-pencil"></i></a></td>
				<td><a class="botao-comprar" href="javascript: confirm('Tem certeza que deseja excluir este registro?')"><i class="fa fa-trash"></i></a></td>
			</tr>
			<tr>
				<td>3</td>
				<td>Volei de Praia</td>
				<td><a class="botao-comprar" href="admin-modalidades-edit.php"><i class="fa fa-pencil"></i></a></td>
				<td><a class="botao-comprar" href="javascript: confirm('Tem certeza que deseja excluir este registro?')"><i class="fa fa-trash"></i></a></td>
			</tr>
			<tr>
				<td>4</td>
				<td>Ginastica Artistica</td>
				<td><a class="botao-comprar" href="admin-modalidades-edit.php"><i class="fa fa-pencil"></i></a></td>
				<td><a class="botao-comprar" href="javascript: confirm('Tem certeza que deseja excluir este registro?')"><i class="fa fa-trash"></i></a></td>
			</tr>

		</tbody>
	</table>
</section>
<?php include("footer-admin.php"); ?>