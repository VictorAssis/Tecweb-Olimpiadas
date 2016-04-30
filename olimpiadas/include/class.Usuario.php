<?php
/**
 * Classe Usuários
 *
 * Esta classe é responsável pela manipulação dos dados
 * de usuários cadastrados no banco.
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Usuario {
	/**
	 * Dados de conexão
	 *
	 * @var PDO Object Instância da conexão com o banco
	 * @var string Nome da tabela no banco
	 */
	private $conn;
	private $table_name = "usuarios";

	/**
	 * Propriedades dos usuários
	 *
	 * @var int ID do usuário
	 * @var int Chave estrangeira do tipo de usuário
	 * @var string Nome do usuário
	 * @var string Email do usuário
	 * @var string Senha do usuário
	 * @var string CPF do usuário
	 * @var string Telefone do usuário
	 * @var string Endereço do usuário
	 * @var string Data de nascimento do usuário
	 * @var string Data de última alteração no registro
	 * @var string Data de criação do registro
	 */
	public $id;
	public $usuarios_tipos_id;
	public $nome;
	public $email;
	public $senha;
	public $cpf;
	public $telefone;
	public $endereco;
	public $data_nascimento;
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
	 * Lista todos os usuários cadastrados no banco
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
	 * Lista o usuário com um id específico
	 *
	 * @param int $id Id do usuário desejada
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
	 * Cria um novo usuário a partir das propriedades da classe
	 *
	 * @return Boolean True se cadastrou e false se aconteceu algum erro
	 */
	public function create() {
		//Pega data atual
		$this->modified = $this->created = date("Y-m-d H:i:s");

		//Criptografa senha
		$this->senha = md5($this->senha);

		//Monta query do banco
		$query = "INSERT INTO {$this->table_name}
			(id,
			usuarios_tipos_id,
			nome,
			email,
			senha,
			cpf,
			telefone,
			endereco,
			data_nascimento,
			modified,
			created)
		VALUES
			(?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$result = $stmt->execute(array(
 			$this->id,
 			$this->usuarios_tipos_id,
 			$this->nome,
 			$this->email,
 			$this->senha,
 			$this->cpf,
 			$this->telefone,
 			$this->endereco,
 			$this->data_nascimento,
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
	 * Atualiza um usuário a partir das propriedades da classe
	 *
	 * @return Boolean True se atualizou e False se aconteceu algum erro
	 */
	public function update() {
		//Pega data atual
		$this->modified = date("Y-m-d H:i:s");

		//Criptografa senha
		$this->senha = $this->senha ? md5($this->senha) : null;

		//Monta query do banco
		$query = "UPDATE {$this->table_name} SET
			nome = ?,
			email = ?,
			cpf = ?,
			telefone = ?,
			endereco = ?,
			data_nascimento = ?,
			modified = ?";
		if ($this->senha != null)
			$query .= ",senha = ?";
		$query .= "
		WHERE 
			id = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
		$valores = array(
 			$this->nome,
 			$this->email,
 			$this->cpf,
 			$this->telefone,
 			$this->endereco,
 			$this->data_nascimento,
 			$this->modified
 		);
 		if ($this->senha != null)
 			$valores[] = $this->senha;
 		$valores[] = $this->id;
 		$result = $stmt->execute($valores);

 		//Retorna o resultado
        if($result){
            return true;
        }else{
            return false;
        }
	}

	/**
	 * Deleta um usuário a partir da proprieda id da classe
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

	/**
	 * Valida se o par de e-mail e senha fornecidos são válidos
	 *
	 * @return Array Contém resposta boolean e no caso de verdadeiro os dados do usuário
	 */
	public function validate() {
		//Criptografa senha
		$this->senha = md5($this->senha);

		//Monta query do banco
		$query = "SELECT id, usuarios_tipos_id, nome, email FROM {$this->table_name} WHERE email = ? AND senha = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
 		$stmt->execute(array(
 			$this->email,
 			$this->senha
 		));
 		$result = $stmt->fetchAll();

 		//Retorna se o usuário é válido ou não
        if(count($result)){
            return array(
            	"response" =>true,
            	"Usuario" => array(
            		"id" => $result[0]['id'],
            		"usuarios_tipos_id" => $result[0]['usuarios_tipos_id'],
            		"nome" => $result[0]['nome'],
            		"email" => $result[0]['email']
            	)
            );
        }else
            return array(
            	"response" => false
            );
	}

	/**
	 * Reseta senha e envia por e-mail
	 *
	 * @return Array Contém resposta boolean
	 */
	public function resetPassword() {
		//Pega data atual
		$this->modified = date("Y-m-d H:i:s");

		//Gera senha randomica
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $senha = '';
	    for ($i = 0; $i < 8; $i++) {
	        $senha .= $characters[rand(0, $charactersLength - 1)];
	    }
		$this->senha = md5($senha);

		//Monta query do banco
		$query = "UPDATE {$this->table_name} SET
			senha = ?,
			modified = ?
		WHERE 
			email = ?";
		$stmt = $this->conn->prepare($query);

		//Executa passando os valores
		$valores = array(
 			$this->senha,
 			$this->modified,
 			$this->email
 		);
 		$result = $stmt->execute($valores);

 		$html = "<p>A sua senha de acesso ao sistema foi resetada para <b>{$senha}</b></p>";
 		mail($this->email, "Nova senha", $html);

 		//Retorna o resultado
        if($result){
            return true;
        }else{
            return false;
        }
	}
}