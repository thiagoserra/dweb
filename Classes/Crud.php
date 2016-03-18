<?php
/**
 * Crud.php
 *
 * Definicao da Classe abstrata Crud
 * @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
 * @version 1.0
 */

require_once 'Bd.php';

/**
 * Classe Crud
 *
 * Classe abstrata que define o modelo para implementacao das classes que
 * irao manipular as tabelas
 *
 * @see Bd
 */
abstract class Crud extends Bd {

/**
 * $tabela atributo necessario para definir a tabela que sera consultada
 * @var string
 */
	protected $tabela;

 	/**
 	 * Metodo abstrato inserir() que devera ser implementado pelas classes filhas
 	 */
	abstract public function inserir();

	/**
	 * Metodo abstrato atualizar() que devera ser implementado pelas classes filhas
	 */
	abstract public function atualizar($id);

	/**
	 * Metodo responsavel por selecionar uma linha da tabela correspndente ao $id
	 *
	 * @param  int $id identificar da linha que sera deletada
	 * @return object     objeto contendo os dados encontrados
	 */
	public function selecionar($id){
		$sql  = "SELECT * FROM $this->tabela WHERE id = :id";
		$stmt = Bd::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	/**
	 * Metodo responsavel por selecionar todos os dados da tabela
	 *
	 * @return	object	objeto contendo os dados encontrados
	 */
	public function selecionarTudo(){
		$sql  = "SELECT * FROM $this->tabela";
		$stmt = Bd::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	/**
	 * Metodo responsavel por deletar um dado tabela
	 * @param  int $id identificar da linha que sera deletada
	 * @return boolean	true caso execute false em caso de erro
	 */
	public function deletar($id){
		$sql  = "DELETE FROM $this->tabela WHERE id = :id";
		$stmt = Bd::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

}
