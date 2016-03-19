<?php include("header-admin.php"); ?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Adicionar Modalidade <a class="link-voltar" href="javascript: history.go(-1);">< Voltar</a></h1>
	<form>
        <p class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="campo" placeholder="Futebol" required="required" />
        </p>
        <p class="form-group">
            <label for="foto">Foto destaque</label>
            <input type="file" id="foto" class="campo" required="required" />
        </p>
        <p class="form-group">
            <label for="finalidade">Finalidade</label>
            <textarea id="finalidade" class="campo" required="required"></textarea>
        </p>
        <p class="form-group">
            <label for="Provas">Provas</label>
            <textarea id="Provas" class="campo tinyEditor" required="required"></textarea>
        </p>
        <p class="form-group">
            <label for="estreia">Estréia nos Jogos Olímpicos</label>
            <input type="text" id="estreia" class="campo" placeholder="Atenas 1986" required="required" />
        </p>
        <p class="form-group">
            <label for="regras">Regras do Jogo</label>
            <textarea id="regras" class="campo tinyEditor" required="required"></textarea>

        <p class="form-group">
            <input type="submit" class="botao" value="Cadastrar" />
        </p>
	</form>
</section>
<?php include("footer-admin.php"); ?>