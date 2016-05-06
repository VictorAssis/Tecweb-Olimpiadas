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
	<h2 class ="titulo-pagina">Atrações</h2>
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
   	<ul>
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
   	<ul>
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
   	<ul>
   	<div class="clear"></div>
</section>
<?php include ("footer.php"); ?>