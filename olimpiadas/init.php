<?php
//Inicia a sessão
session_start();

//Função que inclui os arquivos das classes automaticamente
function __autoload($class_name)
{
    include_once 'include/class.' . $class_name . '.php';
}

//Função para adicionar classes ao body
function bodyClass() {
	global $classBody;
	if (isset($classBody)) {
		echo implode(" ", $classBody);
	}
}

//Funções para exibir mensagens
function mensagemSucesso($texto) {
	echo "<div class=\"container\">";
	echo "<div class=\"alerta alerta-sucesso\">";
	echo "<p>{$texto}</p>";
	echo "</div>";
	echo "</div>";
}
function mensagemErro($texto) {
	echo "<div class=\"container\">";
	echo "<div class=\"alerta alerta-erro\">";
	echo "<p>{$texto}</p>";
	echo "</div>";
	echo "</div>";
}


//Instancia o banco e o deixa global
global $db;
$database = new Database();
$db = $database->getConnection();
?>