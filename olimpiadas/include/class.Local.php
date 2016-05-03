<?php
/**
 * Classe Local
 *
 * Esta classe é responsável pela manipulação dos dados
 * de locais cadastrados no banco.
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Local {
	/**
	 * Dados de conexão
	 *
	 * @var PDO Object Instância da conexão com o banco
	 * @var string Nome da tabela no banco
	 */
	private $conn;
	private $table_name = "locais";

	/**
	 * Propriedades dos locais
	 *
	 * @var int ID do local
	 * @var string Nome do local
	 * @var string Descrição do local
	 * @var string Data de última alteração no registro
	 * @var string Data de criação do registro
	 * @var Array Ids de modalidades associadas ao local
	 */
	public $id;
	public $nome;
	public $descricao;
	public $modified;
	public $created;
	public $modalidades;

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
	 * Lista todos os locais cadastradas no banco
	 *
	 * @return Array
	 */
	public function find() {
		//Monta query do banco
		$query = "SELECT * FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
 		$stmt->execute();
 		$locais = $stmt->fetchAll();

 		for($i = 0;$i < count($locais);$i++) {
 			$query = "SELECT * FROM locais_modalidades WHERE locais_id = ?";
			$stmt = $this->conn->prepare($query);
	 		$stmt->execute(array($locais[$i]['id']));
	 		$locais[$i]['modalidades'] = $stmt->fetchAll();
 		}

 		return $locais;
	}

	/**
	 * Lista o local com um id específico
	 *
	 * @param int $id Id do local desejado
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
	 * Cria um novo local a partir das propriedades da classe
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
			descricao,
			modified,
			created)
		VALUES
			(?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->id,
 			$this->nome,
 			$this->descricao,
 			$this->modified,
 			$this->created
 		));

 		$idLocal = $this->conn->lastInsertId();

 		//Cadastra modalidades associadas
 		if (count($this->modalidades))
 			foreach ($this->modalidades as $modalidade) {
 				$query = "INSERT INTO locais_modalidades
					(locais_id,
					modalidades_id)
				VALUES
					(?,?)";
				$stmt = $this->conn->prepare($query);

				//Executa passando os valores
		 		$result = $stmt->execute(array(
		 			$idLocal,
		 			$modalidade
		 		));
 			}

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
			modified = ?
		WHERE 
			id = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->nome,
 			$this->descricao,
 			$this->modified,
 			$this->id
 		));

 		//Deleta associações com modalidades anteriores
 		$query = "DELETE FROM locais_modalidades WHERE locais_id = ?";
		$stmt = $this->conn->prepare($query);
 		$result = $stmt->execute(array($this->id));

		//Cadastra modalidades associadas
 		if (count($this->modalidades))
 			foreach ($this->modalidades as $modalidade) {
 				$query = "INSERT INTO locais_modalidades
					(locais_id,
					modalidades_id)
				VALUES
					(?,?)";
				$stmt = $this->conn->prepare($query);

				//Executa passando os valores
		 		$result = $stmt->execute(array(
		 			$this->id,
		 			$modalidade
		 		));
 			}

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