<?php
/**
 * Classe Atracao
 *
 * Esta classe é responsável pela manipulação dos dados
 * de atrações cadastradas no banco.
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Atracao {
	/**
	 * Dados de conexão
	 *
	 * @var PDO Object Instância da conexão com o banco
	 * @var string Nome da tabela no banco
	 */
	private $conn;
	private $table_name = "locais_atracoes";

	/**
	 * Propriedades dos locais
	 *
	 * @var int ID da atração
	 * @var int ID do local
	 * @var string Nome do local
	 * @var string Descrição do local
	 * @var string Data de última alteração no registro
	 * @var string Data de criação do registro
	 */
	public $id;
	public $locais_id;
	public $nome;
	public $descricao;
	public $foto;
	public $link;
	public $tipo;
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
	 * Lista todas as atrações cadastradas no banco
	 *
	 * @return Array
	 */
	public function findByLocal($locais_id) {
		//Monta query do banco
		$query = "SELECT * FROM {$this->table_name} WHERE locais_id = ? ORDER BY tipo, locais_id";
		$stmt = $this->conn->prepare($query);
 		$stmt->execute(array($locais_id));

 		return $stmt->fetchAll();
	}

	/**
	 * Lista a atração com um id específico
	 *
	 * @param int $id Id do local desejado
	 * @return Array
	 */
	public function findById($id) {
		//Monta query do banco
		$query = "SELECT * FROM {$this->table_name} WHERE id = ?";
		$stmt = $this->conn->prepare($query);
 		$stmt->execute(array($id));
 		return $stmt->fetchAll();
	}

	/**
	 * Cria uma nova atração a partir das propriedades da classe
	 *
	 * @return Boolean True se cadastrou e false se aconteceu algum erro
	 */
	public function create() {
		//Pega data atual
		$this->modified = $this->created = date("Y-m-d H:i:s");

		//Monta query do banco
		$query = "INSERT INTO {$this->table_name}
			(id,
			locais_id,
			nome,
			descricao,
			foto,
			link,
			tipo,
			geolocalizacao,
			modified,
			created)
		VALUES
			(?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->id,
 			$this->locais_id,
 			$this->nome,
 			$this->descricao,
 			$this->foto,
 			$this->link,
 			$this->tipo,
 			$this->geolocalizacao,
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

	/**
	 * Atualiza um local a partir das propriedades da classe
	 *
	 * @return Boolean True se atualizou e False se aconteceu algum erro
	 */
	public function update() {
		//Pega data atual
		$this->modified = date("Y-m-d H:i:s");

		//Monta query do banco
		$query = "UPDATE {$this->table_name} SET
			nome = ?,
			descricao = ?,
			link = ?,
			tipo = ?,
			geolocalizacao = ?,
			modified = ?
		WHERE 
			id = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->nome,
 			$this->descricao,
 			$this->link,
 			$this->tipo,
 			$this->geolocalizacao,
 			$this->modified,
 			$this->id
 		));

 		//Retorna o resultado
        if($result){
            return true;
        }else{
            return false;
        }
	}

	/**
	 * Deleta um local a partir da proprieda id da classe
	 *
	 * @return Boolean True se deletou e False se aconteceu algum erro
	 */
	public function delete() {
		//Monta query do banco
		$query = "DELETE FROM {$this->table_name} WHERE id = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array($this->id));

 		//Retorna o resultado
        if($result){
            return true;
        }else{
            return false;
        }
	}
}