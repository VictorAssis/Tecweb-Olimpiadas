<?php include ("header.php"); ?>
 
 <section id="content" class="container">
  <h1 class="titulo-pagina">Ajuda</h1>
 <div id="informacao" style="display:none;font-color:blue;">Visualize a ajuda também em video!</div>
 <div id="accordion">
 
   <h3><span class="menu">Como fazer login?</span><img class="players" id="img1" src="images/play.png" onMouseOver="this.src='images/play2.png'"onMouseOut="this.src='images/play.png'"/>  </h3>
   <div>
     <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
   </div>
   <h3><span class="menu">Como me cadastrar?</span><img class="players" id="img2" src="images/play.png" onMouseOver="this.src='images/play2.png'"onMouseOut="this.src='images/play.png'"/> </h3>
   <div>
     <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
   </div>
   <h3><span class="menu">Como comprar um ingresso?</span><img class="players" id="img3" src="images/play.png" onMouseOver="this.src='images/play2.png'"onMouseOut="this.src='images/play.png'"/> </h3>
   <div> 
     <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
   </div>
 </div>
 
 </section>
 <script>
   $(function() {
     $( "#accordion" ).accordion({
       active: false,
       collapsible: true,
       icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" }
     });
      
  
     $("#informacao").fadeIn("slow");
     $(".players").attr("src","images/play2.png");
     $(".players").css("opacity","0.4");//define opacidade inicial
     var minhaFuncao = setInterval(function() {
        if($(".players").css("opacity") == 0){
         $(".players").css("opacity","1");
       }else{
         $(".players").css("opacity","0");
       }  }, 107);
 
 
     window.setTimeout(function() {
       clearInterval(minhaFuncao);
        $("#informacao").fadeOut("slow"); 
        $(".players").attr("src","images/play.png");
        $( "#accordion" ).accordion({
       active: false,
       collapsible: false,
       icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" }
     }); 
     }, 3500);
 
     
 
     $(".players").click(function(e){
             
             var pai = $(e.target).parent();
             pai = $(pai).parent();
             $(pai).find("div").html('<div class="info"><p><img src="images/logo.png"></p><video width="320" height="240" controls> <source src="movie.mp4" type="video/mp4"></video></div>');
     });
 
     $(".menu").click(function(e){
             var pai = $(e.target).parent();
             pai = $(pai).parent();
             $(pai).find("div").html("<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>");
 
     });
 
 
   });
   </script>
 <?php include ("footer.php"); ?>