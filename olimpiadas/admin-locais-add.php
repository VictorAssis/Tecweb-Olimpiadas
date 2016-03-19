<?php include("header-admin.php"); ?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Adicionar Local <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form>
		<p class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="campo" placeholder="Belo Horizonte" required="required" />
        </p>
        <p class="form-group"> 
            <label for="modalidades">Modalidades</label>
            <select name="modalidades" id="modalidades" class="campo selectMultiple" required="required" multiple>
            	<option>Futebol</option>
            	<option>Vôlei de praia</option>
            	<option>Voleibol</option>
            	<option>Ginástica artística</option>
            </select>
        </p>
        <p class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" class="campo tinyEditor" placeholder="Descrição do local" required="required"></textarea>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Cadastrar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>