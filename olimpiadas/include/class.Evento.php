<?php
/**
 * Classe Evento
 *
 * Esta classe é responsável pela manipulação dos dados
 * de eventos cadastrados no banco.
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Evento {
	/**
	 * Dados de conexão
	 *
	 * @var PDO Object Instância da conexão com o banco
	 * @var string Nome da tabela no banco
	 */
	private $conn;
	private $table_name = "eventos";

	/**
	 * Propriedades dos eventos
	 *
	 * @var int ID do evento
	 * @var int ID do local
	 * @var int ID da modalidade
	 * @var string Data de acontecimento do evento
	 * @var string Descrição do evento
	 * @var string Preço para acessar evento
	 * @var string Data de última alteração no registro
	 * @var string Data de criação do registro
	 */
	public $id;
	public $locais_id;
	public $modalidades_id;
	public $data;
	public $descricao;
	public $preco;
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
	 * Lista todos os eventos cadastradas no banco
	 *
	 * @return Array
	 */
	public function find() {
		//Monta query do banco
		$query = "SELECT eventos.*, modalidades.nome as modalidade, locais.nome as local FROM {$this->table_name} INNER JOIN locais ON eventos.locais_id = locais.id INNER JOIN modalidades ON eventos.modalidades_id = modalidades.id";
		$stmt = $this->conn->prepare($query);
 		$stmt->execute();
 		return $stmt->fetchAll();
	}

	/**
	 * Lista o evento com um id específico
	 *
	 * @param int $id Id do evento desejado
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
	 * Cria um novo evento a partir das propriedades da classe
	 *
	 * @return Boolean True se cadastrou e false se aconteceu algum erro
	 */
	public function create() {
		//Pega data atual
		$this->modified = $this->created = date("Y-m-d H:i:s");

		//Formata data para Mysql
		$this->data = substr($this->data, 6, 4) . '-' . substr($this->data, 3, 2) . '-' . substr($this->data, 0, 2) . substr($this->data, 10) . ':00';

		//Monta query do banco
		$query = "INSERT INTO {$this->table_name}
			(id,
			locais_id,
			modalidades_id,
			data,
			descricao,
			preco,
			modified,
			created)
		VALUES
			(?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->id,
 			$this->locais_id,
 			$this->modalidades_id,
 			$this->data,
 			$this->descricao,
 			$this->preco,
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
	 * Atualiza um evento a partir das propriedades da classe
	 *
	 * @return Boolean True se atualizou e False se aconteceu algum erro
	 */
	public function update() {
		//Pega data atual
		$this->modified = date("Y-m-d H:i:s");

		//Monta query do banco
		$query = "UPDATE {$this->table_name} SET
			locais_id = ?,
			modalidades_id = ?,
			data = ?,
			descricao = ?,
			preco = ?,
			modified = ?
		WHERE 
			id = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->locais_id,
 			$this->modalidades_id,
 			$this->data,
 			$this->descricao,
 			$this->preco,
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
	 * Deleta um evento a partir da proprieda id da classe
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