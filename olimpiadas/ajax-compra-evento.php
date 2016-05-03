<?php
	include("init.php");

	if (!isset($_SESSION["Usuario"])) {
		echo json_encode(array('retorno'=>false,'error'=>'É preciso estar logado para efetuar compras.','redirect'=>'login.php'));
	} else {
		$compra = new Compra();

		$compra->usuarios_id = $_SESSION['Usuario']['id'];
 		$compra->eventos_id = $_POST['evento_id'];

 		if ($compra->create())
            echo json_encode(array('retorno'=>true));
        else 
            echo json_encode(array('retorno'=>false,'error'=>'Não foi possível realizar sua compra. Por favor, tente novamente.','redirect'=>''));
	}