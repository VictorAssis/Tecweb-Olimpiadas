<?php
include ("init.php");

if (isset($_POST['btnEnviar'])) {
    mensagemSucesso("Mensagem enviada com sucesso. Retornaremos o mais breve possível.");
}
include ("header.php");
?>
<section id="content" class="container" >
    <form method="post" action="">
        <h1 class="titulo-pagina">Entre em contato</h1>
        <p class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="campo" placeholder="Nome" required="required" name="nome" />
        </p>        
        <p class="form-group"> 
            <label for="fone">Telefone</label>
            <input type="text" id="fone" class="campofone campo" placeholder="(xx)xxxx-xxxx" name="fone" />
        </p>        
        <p class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class= "campo" placeholder="email@mail.com" required="required" name="email" />
        </p>        
        <p class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" class="campo" placeholder="Deixe sua mensagem"></textarea>
        </p>
        <p class="form-group">
            <input type="submit" class="botao" value="Enviar" name="btnEnviar" />
        </p>
    </form>
</section>

<?php include ("footer.php"); ?>