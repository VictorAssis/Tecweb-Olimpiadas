<?php
/**
 * Classe Compra
 *
 * Esta classe é responsável pela manipulação dos dados
 * de compras cadastradas no banco.
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Compra {
	/**
	 * Dados de conexão
	 *
	 * @var PDO Object Instância da conexão com o banco
	 * @var string Nome da tabela no banco
	 */
	private $conn;
	private $table_name = "compras";

	/**
	 * Propriedades das compras
	 *
	 * @var int ID da compra
	 * @var int ID do usuário
	 * @var int ID do evento
	 * @var string Data de última alteração no registro
	 * @var string Data de criação do registro
	 */
	public $id;
	public $usuarios_id;
	public $eventos_id;
	public $modified;
	public $created;

	/**
	 * Seta a instância de conexão com o banco
	 *
	 * @return void
	 */
	public function __construct(){
		global $db;
		$this->conn = $db;
	}

	/**
	 * Lista todos as compras cadastradas no banco
	 *
	 * @return Array
	 */
	public function find() {
		//Monta query do banco
		$query = "SELECT * FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
 		$stmt->execute();
 		return $stmt->fetchAll();
	}

	/**
	 * Lista a compra com um id específico
	 *
	 * @param int $id Id da compra desejada
	 * @return Array
	 */
	public function findById($id) {
		//Monta query do banco
		$query = "SELECT * FROM {$this->table_name} WHERE id = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$stmt->execute(array($id));
 		return $stmt->fetchAll();
	}

	/**
	 * Cria uma nova compra a partir das propriedades da classe
	 *
	 * @return Boolean True se cadastrou e false se aconteceu algum erro
	 */
	public function create() {
		//Pega data atual
		$this->modified = $this->created = date("Y-m-d H:i:s");

		//Monta query do banco
		$query = "INSERT INTO {$this->table_name}
			(id,
			usuarios_id,
			eventos_id,
			modified,
			created)
		VALUES
			(?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->id,
 			$this->usuarios_id,
 			$this->eventos_id,
 			$this->modified,
 			$this->created
 		));

 		//Retorna o resultado
        if($result){
            return true;
        }else{
            return false;
        }
	}
}