<?php  
	include("init.php");

   $local = new Local();
   $itens = $local->find();

	include("header.php");
?>
<section id="content" class="container">
   <h1 class="titulo-pagina">Locais</h1>
   <ol class="lista-interativa">
      <?php 
         if ($itens) { 
            foreach ($itens as $item) {
      ?>
      <li>
         <a href="local.php?id=<?php echo $item['id']; ?>">
            <img src="uploads/<?php echo $item['foto']; ?>"/>
            <div class="hover">
               <h1><?php echo $item['nome']; ?></h1>
            </div>
         </a>
      </li>
      <?php
            }
         }
      ?>
   <ol>
   <div class="clear"></div>

</section>

<?php  
	include("footer.php");
?>