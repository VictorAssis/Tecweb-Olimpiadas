	<footer id="rodape">
		<div class="container">
			<p>Desenvolvido por X6.</p>
		</div>
	</footer>
	<!--Scripts-->
	<script type="text/javascript" src="scripts/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="scripts/multiple-select.js"></script>
	<script type="text/javascript" src="scripts/Chart.js"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// Máscaras
      $(".campodata").mask("99/99/9999");
			$(".campodatahora").mask("99/99/9999 99:99");
   		$(".campocpf").mask("999.999.999-99");
   		$(".campofone").mask("(99)9999-9999?9");
      $(".campopreco").each(function(){
        if(!$(this).val())
          var mascaraInicial = "9,99?9";
        else
          var mascaraInicial = "9,99?9";

     		$(this).mask(mascaraInicial,{placeholder:" "}).keyup(function(){
     			valorAtual = $(this).val();
     			//console.log(valorAtual.substring(valorAtual.length - 1));
     			if (valorAtual.substring(valorAtual.length - 1) != " ") {
     				$(this).unmask();
     				mascara = "";
     				for(var i = 0;i < valorAtual.length - 1;i++) {
     					if (i == valorAtual.length - 3)
     						mascara += ",";
     					mascara += "9";
     				}
     				mascara += "?9";
     				$(this).val(valorAtual.replace(",","")).mask(mascara,{placeholder:" "});
     			}
     		});
      });

   		//Multiplo select
   		$(".selectMultiple").multipleSelect({
   			selectAllText: "Selecionar todos",
   			selectAllDelimiter: ['(',')'],
   			allSelected: "Todos selecionados",
   			width: "100%"
   		});

   		//Editor de texto completo
   		tinymce.init({ selector:'.tinyEditor' });

      //Edição de foto
      $(".uploadEdit").each(function(){
        var container = $(this);
        container.find("input").hide();
        container.find(".alterar-foto").on('click',function(){
          container.find("input").show().attr("required","required");
          container.find(".alterar-foto,.preview-foto").hide();
        });
      });
		});
	</script>
</body>
</html>