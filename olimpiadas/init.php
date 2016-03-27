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
	if (!isset($_SESSION["Mensagens"]))
		$_SESSION["Mensagens"] = array();

	$mensagem = "<div class=\"container\">";
	$mensagem .= "<div class=\"alerta alerta-sucesso\">";
	$mensagem .= "<p>{$texto}</p>";
	$mensagem .= "</div>";
	$mensagem .= "</div>";
	$_SESSION["Mensagens"][] = $mensagem;

}
function mensagemErro($texto) {
	if (!isset($_SESSION["Mensagens"]))
		$_SESSION["Mensagens"] = array();

	$mensagem = "<div class=\"container\">";
	$mensagem .= "<div class=\"alerta alerta-erro\">";
	$mensagem .= "<p>{$texto}</p>";
	$mensagem .= "</div>";
	$mensagem .= "</div>";
	$_SESSION["Mensagens"][] = $mensagem;
}
function exibirMensagens() {
	if (isset($_SESSION['Mensagens'])) {
		foreach ($_SESSION['Mensagens'] as $msg)
			echo $msg;
		unset($_SESSION['Mensagens']);
	}
}


//Instancia o banco e o deixa global
global $db;
$database = new Database();
$db = $database->getConnection();
?>