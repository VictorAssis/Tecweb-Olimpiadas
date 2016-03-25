<?php
/**
 * Classe Database
 *
 * Esta classe é responsável por verificar se já existe conexão
 * com o banco e retorná-la, caso exista ou conectar se não
 * existir.
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Database {
	/**
	 * Dados de conexão com o banco
	 *
	 * @var string Endereço do host
	 * @var string Banco de dados
	 * @var string Usuário do MySQL
	 * @var string Senha do MySQL
	 */
    private $host = "localhost";
    private $db_name = "olimpiadas";
    private $username = "root";
    private $password = "";

    /**
     * Instância da conexão com o banco
     *
     * @var PDO Object
     */
    public $conn;
 
    /**
	 * Retorna uma instância da conexão com o banco
	 *
	 * @return PDO Object
	 */
    public function getConnection(){
        if ($this->conn)
        	return $this->conn;
        else {
        	try{
	            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
	        }catch(PDOException $exception){
	            echo "Connection error: " . $exception->getMessage();
	        }
	        return $this->conn;
        }        
    }
}