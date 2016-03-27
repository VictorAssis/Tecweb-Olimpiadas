<?php
/**
 * Classe Modalidade
 *
 * Esta classe é responsável pela manipulação dos dados
 * de modalidades cadastrados no banco.
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Modalidade {
	/**
	 * Dados de conexão
	 *
	 * @var PDO Object Instância da conexão com o banco
	 * @var string Nome da tabela no banco
	 */
	private $conn;
	private $table_name = "modalidades";

	/**
	 * Propriedades das modalidades
	 *
	 * @var int ID da modalidade
	 * @var string Nome da modalidade
	 * @var string Foto destaque da modalidade
	 * @var string Foto lista da modalidade
	 * @var string Finalidade da modalidade
	 * @var string Provas da modalidade
	 * @var string Estréia da modalidade
	 * @var string Regras da modalidade
	 * @var string Data de última alteração no registro
	 * @var string Data de criação do registro
	 */
	public $id;
	public $nome;
	public $foto_destaque;
	public $foto_lista;
	public $finalidade;
	public $provas;
	public $estreia;
	public $regras;
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
	 * Lista todos as modalidades cadastradas no banco
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
	 * Lista a modalidade com um id específico
	 *
	 * @param int $id Id da modalidade desejada
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
	 * Cria uma nova modalidade a partir das propriedades da classe
	 *
	 * @return Boolean True se cadastrou e false se aconteceu algum erro
	 */
	public function create() {
		//Pega data atual
		$this->modified = $this->created = date("Y-m-d H:i:s");

		//Monta query do banco
		$query = "INSERT INTO {$this->table_name}
			(id,
			nome,
			foto_destaque,
			foto_lista,
			finalidade,
			provas,
			estreia,
			regras,
			modified,
			created)
		VALUES
			(?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->id,
 			$this->nome,
 			$this->foto_destaque,
 			$this->foto_lista,
 			$this->finalidade,
 			$this->provas,
 			$this->estreia,
 			$this->regras,
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
	 * Atualiza uma modalidade a partir das propriedades da classe
	 *
	 * @return Boolean True se atualizou e False se aconteceu algum erro
	 */
	public function update() {
		//Pega data atual
		$this->modified = date("Y-m-d H:i:s");

		//Monta query do banco
		$query = "UPDATE {$this->table_name} SET
			nome = ?,
			foto_destaque = ?,
			foto_lista = ?,
			finalidade = ?,
			provas = ?,
			estreia = ?,
			regras = ?,
			modified = ?
		WHERE 
			id = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->nome,
 			$this->foto_destaque,
 			$this->foto_lista,
 			$this->finalidade,
 			$this->provas,
 			$this->estreia,
 			$this->regras,
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
	 * Deleta uma modalidade a partir da proprieda id da classe
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