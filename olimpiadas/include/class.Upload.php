<?php
/**
 * Classe de Upload
 *
 * Esta classe é responsável por fazer o upload de arquivos
 * para a pasta uploads e retornar o nome do arquivo gerado
 *
 * @author Victor Assis <contato@victorassis.com.br>
 * @copyright 2016 Victor Assis
 */
class Upload {
	/**
	 * Caminho para a pasta de upload
	 *
	 * @var string
	 */
	private $uploadDir = "./uploads/";

	/**
	 * Realiza o upload de fato
	 *
	 * @param Array Dados do arquivo que será feito o upload
	 * @return string Nome do arquivo gerado
	 */
	public function uploadFile($file) {
		$fileName = $this->generateName($file['name']);

		if (move_uploaded_file($file['tmp_name'], $this->uploadDir . $fileName))
		    return $fileName;
		else {
		    echo "Falha ao realizar upload.";
		}
	}

	/**
	 * Verifica se existe um arquivo com o mesmo nome e gera outro nome caso exista
	 *
	 * @param string Nome do arquivo enviado
	 * @return string Nome que o arquivo será salvo
	 */
	private function generateName($name) {
		//retira a extensão do arquivo
		$parts = explode(".",$name);
		$extension = "." . $parts[count($parts) - 1];
		unset($parts[count($parts) - 1]);
		$name = implode(".",$parts);

		//Trata o nome
		$name = $this->slugify($name);

		if (!file_exists($this->uploadDir . $name . $extension))
			return $name . $extension;

		$cont = 1;
		while (true) {
			if (!file_exists($this->uploadDir . $name . '-' . $cont . $extension))
				return $name . '-' . $cont . $extension;
			$cont++;
		}
	}

	/**
	 * Trata o nome do arquivo removendo caracteres especiais, pontuações e espaços
	 *
	 * @param string Texto sem formatação
	 * @return string Texto formatado
	 */
	private function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text))
		{
			return 'n-a';
		}

		return $text;
	}
}