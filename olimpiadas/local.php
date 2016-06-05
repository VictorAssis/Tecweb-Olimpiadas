<?php
include ("init.php");

$local = new Local();
$item = $local->findById($_GET['id']);
$item = $item[0];

include ("header.php");
?>
<section id="content" class="container">
<h1 class ="titulo-pagina"><?php echo $item['nome']; ?></h1>
	  <div class="banner-local">
		<div class="slider-local">
			<ul class="slides">
				<li><img  src="images/locais/deodoro_0.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_1.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_2.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_3.jpg" width="1200" height="457"/></li>
				<li><img  src="images/locais/deodoro_4.jpg" width="1200" height="457"/></li>
			</ul>
		</div>
	</div>
	<br/>
	<h2 class ="titulo-pagina">Conheça o Local</h2>
	<?php echo $item['descricao']; ?>
	<br/>
   <?php if (count($item['atracoes'])) : ?>
   <h2 class="titulo-pagina">Atrações</h2>
   <div id="map"></div>
   <script>
      var map;
      function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -19.919156, lng: -43.938639},
            zoom: 10
         });
         var infoWindow = new google.maps.InfoWindow({map: map});

<?php
   $contAtracao = 0;
   foreach ($item['atracoes'] as $atracao) {
      $geolocalizacao = explode(",",$atracao['geolocalizacao'])
?>
         //var image = 'images/beachflag.png';
         var infoAtracao<?php echo $contAtracao; ?> = new google.maps.InfoWindow({
            content: "<h1><?php echo htmlentities($atracao['nome']); ?></h1><p><?php echo htmlentities($atracao['descricao']); ?></p>"
         });
         var marker<?php echo $contAtracao; ?> = new google.maps.Marker({
            position: {lat: <?php echo $geolocalizacao[0]; ?>, lng: <?php echo $geolocalizacao[1]; ?>},
            map: map,
            title: '<?php echo $atracao["nome"]; ?>'
         });
         marker<?php echo $contAtracao; ?>.addListener('click', function() {
            infoAtracao<?php echo $contAtracao; ?>.open(map, marker<?php echo $contAtracao; ?>);
         });
<?php
      $contAtracao++;
   }
?>
         // Try HTML5 geolocation.
         if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
               var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
               };

               infoWindow.setPosition(pos);
               infoWindow.setContent('Você está aqui.');
               map.setCenter(pos);
            }, function() {
               handleLocationError(true, infoWindow, map.getCenter());
            });
         } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
         }
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
         infoWindow.setPosition(pos);
         infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
      }
   </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNQ-7g0wZCKzBYHpJ_846maz9Ctq9XWKk&callback=initMap"
        async defer></script>
	<h3 class="subtitulo-pagina">Bares</h3>
	<ul class="lista-atracoes">
      <?php
         if ($item['atracoes']) { 
            foreach ($item['atracoes'] as $atracao) {
            	if ($atracao['tipo'] != 0)
            		continue;
      ?>
      <li>
         <a href="<?php echo $atracao['link']; ?>" target="_blank">
            <img src="uploads/<?php echo $atracao['foto']; ?>"/>
            <h1><?php echo $atracao['nome']; ?></h1>
            <p><?php echo $atracao['descricao']; ?></p>
         </a>
      </li>
      <?php
            }
         }
      ?>
   </ul>
   <div class="clear"></div>
	<h3 class="subtitulo-pagina">Museus</h3>
	<ul class="lista-atracoes">
      <?php
         if ($item['atracoes']) { 
            foreach ($item['atracoes'] as $atracao) {
            	if ($atracao['tipo'] != 1)
            		continue;
      ?>
      <li>
         <a href="<?php echo $atracao['link']; ?>" target="_blank">
            <img src="uploads/<?php echo $atracao['foto']; ?>"/>
            <h1><?php echo $atracao['nome']; ?></h1>
            <p><?php echo $atracao['descricao']; ?></p>
         </a>
      </li>
      <?php
            }
         }
      ?>
   </ul>
   <div class="clear"></div>
	<h3 class="subtitulo-pagina">Parques</h3>
	<ul class="lista-atracoes">
      <?php
         if ($item['atracoes']) { 
            foreach ($item['atracoes'] as $atracao) {
            	if ($atracao['tipo'] != 2)
            		continue;
      ?>
      <li>
         <a href="<?php echo $atracao['link']; ?>" target="_blank">
            <img src="uploads/<?php echo $atracao['foto']; ?>"/>
            <h1><?php echo $atracao['nome']; ?></h1>
            <p><?php echo $atracao['descricao']; ?></p>
         </a>
      </li>
      <?php
            }
         }
      ?>
   </ul>
   <div class="clear"></div>
   <?php endif; ?>
</section>
<?php include ("footer.php"); ?>