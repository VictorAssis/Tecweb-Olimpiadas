<?php
//Função para adicionar classes ao body
function bodyClass() {
	global $classBody;
	if (isset($classBody)) {
		echo implode(" ", $classBody);
	}
}
?>