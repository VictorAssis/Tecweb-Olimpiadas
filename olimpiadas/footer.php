	<footer id="rodape">
		<div class="container">
			<p>Desenvolvido por X6.</p>
		</div>
	</footer>
	<!--Scripts-->
	<script type="text/javascript" src="scripts/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// Mantém banner da home com altura da tela
			$(".banner-home").height($(window).height());
			$(window).resize(function(){
				$(".banner-home").height($(window).height());
			});

			//Muda classes do menu on scroll
			$(window).scroll(function(){
				if($(window).scrollTop() > $(window).height() - 150)
					$("#cabecalho").removeClass("cabecalho-inicial").addClass("cabecalho-scroll");
				else
					$("#cabecalho").removeClass("cabecalho-scroll").addClass("cabecalho-inicial");
			});

			// Slide home
			$('.slider-home').flexslider({
			    animation: "fade",
			    controlNav: false,
			    directionNav: false,
			    slideshowSpeed: 4000
			});

			// Slide local
			$('.slider-local').flexslider({
			    animation: "fade",
			    slideshowSpeed: 4000
			});

			$(".animated-scroll").click(function(){
				$("html, body").stop().animate({scrollTop:$($(this).attr("href")).offset().top}, '500', 'swing');
				return false;
			});

			// Máscaras
			$(".campodata").mask("99/99/9999");
			$(".campodatahora").mask("99/99/9999 99:99");
       		$(".campocpf").mask("999.999.999-99");
       		$(".campofone").mask("(99)9999-9999?9");

       		//Ajax da home
       		$("#form-filtro-home").submit(function(){
       			$.post('ajax-filtro-home.php',$(this).serialize(),function(resp){
       				$(".tabela-eventos tbody").html(resp);
       			});
       			return false;
       		});
       		$("#form-filtro-home").trigger('submit');

       		//Ajax de compra de ingressos
       		$(".tabela-eventos").on("click",".botao-comprar",function(){
       			$.post('ajax-compra-evento.php',{evento_id:$(this).data('evento-id')},function(resp){
       				if (resp.retorno) {
       					if (!confirm("Sua compra foi realizada com sucesso. Você deseja continuar comprando?"))
       						location.href="meus-eventos.php";
       				} else
       					if (resp.redirect != "") {
       						alert(resp.error);
       						location.href=resp.redirect;
       					} else
       						alert(resp.error);
       			},'json');
       			return false;
       		});
		});
	</script>
</body>
</html>