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

//Instancia o banco e o deixa global
global $db;
$database = new Database();
$db = $database->getConnection();
?>