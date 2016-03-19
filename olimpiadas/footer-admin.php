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
       		$(".campocpf").mask("999.999.99-99");
       		$(".campofone").mask("(99)9999-9999?9");
       		$(".campopreco").mask("9,99?9",{placeholder:" "}).keyup(function(){
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

       		//Multiplo select
       		$(".selectMultiple").multipleSelect({
       			selectAllText: "Selecionar todos",
       			selectAllDelimiter: ['(',')'],
       			allSelected: "Todos selecionados",
       			width: "100%"
       		});

       		//Editor de texto completo
       		tinymce.init({ selector:'.tinyEditor' });

                     //Gráficos Dashboard
                     var data = {
                         labels: ["Vôlei de praia", "Voleibol", "Ginástica artística", "Futebol"],
                         datasets: [
                             {
                                 label: "My First dataset",
                                 fillColor: "rgba(220,220,220,0.5)",
                                 strokeColor: "rgba(220,220,220,0.8)",
                                 highlightFill: "rgba(220,220,220,0.75)",
                                 highlightStroke: "rgba(220,220,220,1)",
                                 data: [65, 59, 80, 81, 56, 55, 40]
                             }
                         ]
                     };
                     var ctx = $("#grafico1").get(0).getContext("2d");
                     var myNewChart = new Chart(ctx).Bar(data);

                     var data2 = {
                         labels: ["Coapacabana", "Barra da Tijuca", "Belo Horizonte", "São Paulo"],
                         datasets: [
                             {
                                 label: "My First dataset",
                                 fillColor: "rgba(220,220,220,0.5)",
                                 strokeColor: "rgba(220,220,220,0.8)",
                                 highlightFill: "rgba(220,220,220,0.75)",
                                 highlightStroke: "rgba(220,220,220,1)",
                                 data: [65, 59, 80, 81, 56, 55, 40]
                             }
                         ]
                     };
                     var ctx2 = $("#grafico2").get(0).getContext("2d");
                     var myNewChart2 = new Chart(ctx2).Bar(data2);
		});
	</script>
</body>
</html>