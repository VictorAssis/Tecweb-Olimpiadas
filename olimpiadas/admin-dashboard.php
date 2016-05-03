<?php
	include("init.php");
	include("header-admin.php");
?>
<section id="content" class="container">
	<h1 class="titulo-pagina">Bem vindo(a) <?php echo $_SESSION['Usuario']['nome']; ?>.</h1>
	<div class="coluna50">
		<h2 class="subtitulo">Eventos por Modalidade</h2>
		<canvas id="grafico1" width="400" height="400"></canvas>
	</div>
	<div class="coluna50">
		<h2 class="subtitulo">Modalidades por Local</h2>
		<canvas id="grafico2" width="400" height="400"></canvas>
	</div>
	<div class="clear"></div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		<?php
			$evento = new Evento();
			$eventosModalidade = $evento->eventosPorModalidade();
			$labels = $valores = array();
			foreach ($eventosModalidade as $estatistica) {
				$labels[] = "\"" . $estatistica['nome'] . "\"";
				$valores[] = $estatistica['qtd'];
			}
		?>
		//Gráficos Dashboard
		var data = {
		 labels: [<?php echo implode(",", $labels); ?>],
		 datasets: [
		     {
		         label: "My First dataset",
		         fillColor: "rgba(220,220,220,0.5)",
		         strokeColor: "rgba(220,220,220,0.8)",
		         highlightFill: "rgba(220,220,220,0.75)",
		         highlightStroke: "rgba(220,220,220,1)",
		         data: [<?php echo implode(",", $valores); ?>]
		     }
		 ]
		};
		var ctx = $("#grafico1").get(0).getContext("2d");
		var myNewChart = new Chart(ctx).Bar(data);

		<?php
			$modalidade = new Modalidade();
			$modalidadesLocal = $modalidade->modalidadePorLocal();
			$labels = $valores = array();
			foreach ($modalidadesLocal as $estatistica) {
				$labels[] = "\"" . $estatistica['nome'] . "\"";
				$valores[] = $estatistica['qtd'];
			}
		?>
		var data2 = {
		 labels: [<?php echo implode(",", $labels); ?>],
		 datasets: [
		     {
		         label: "My First dataset",
		         fillColor: "rgba(220,220,220,0.5)",
		         strokeColor: "rgba(220,220,220,0.8)",
		         highlightFill: "rgba(220,220,220,0.75)",
		         highlightStroke: "rgba(220,220,220,1)",
		         data: [<?php echo implode(",", $valores); ?>]
		     }
		 ]
		};
		var ctx2 = $("#grafico2").get(0).getContext("2d");
		var myNewChart2 = new Chart(ctx2).Bar(data2);
	})
</script>
<?php include("footer-admin.php"); ?>