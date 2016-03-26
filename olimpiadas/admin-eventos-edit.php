<?php
    include("init.php");
    include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Editar Evento <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form>
		<p class="form-group">
            <label for="data">Data</label>
            <input type="text" id="data" class="campo campodata" placeholder="dd/mm/aaaa" required="required" name="data" />
        </p>
        <p class="form-group"> 
            <label for="modalidade">Modalidade</label>
            <select name="modalidade" id="modalidade" class="campo" required="required">
            	<option "">Selecione uma modalidade</option>
            	<option>Futebol</option>
            	<option>Vôlei de praia</option>
            	<option>Voleibol</option>
            	<option>Ginástica artística</option>
            </select>
        </p>
        <p class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" class="campo" placeholder="Descrição do evento" required="required"></textarea>
        </p>    
        <p class="form-group"> 
            <label for="local">Local</label>
            <select name="local" id="local" class="campo" required="required">
            	<option "">Selecione um local</option>
            	<option>Coapacabana</option>
            	<option>Ipanema</option>
            	<option>Belo Horizonte</option>
            	<option>São Paulo</option>
            </select>
        </p>
        <p class="form-group"> 
            <label for="preco">Preço (R$)</label>
            <input type="text" id="preco" class="campo campopreco" placeholder="9,99" name="preco" required="required"/>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Salvar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>