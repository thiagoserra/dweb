<?php
/**
 * Usuarios.php
 *
 * Definicao da classe Usuarios
 * @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
 * @version 1.0
 */

require_once 'Crud.php';

/**
 *  Implementacao da classe Usuarios
 *  @see Crud
 */
class Usuarios extends Crud {

	protected $tabela = 'usuarios';
	private $usuario;
	private $senha;
	private $idGrupoUsuario = 1;

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setIdGrupoUsuario($idGrupoUsuario){
		$this->idGrupoUsuario = $idGrupoUsuario;
	}

	public function getIdGrupoUsuario() {
		return $this->idGrupoUsuario;
	}

	public function inserir() {
		$sql  = "INSERT INTO $this->tabela (usuario, senha, idgrupousuario) "
						." VALUES (:usuario, :senha, :idgrupousuario)";
		$stmt = Bd::prepare($sql);
		$stmt->bindParam(':usuario', $this->usuario);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':idgrupousuario', $this->idGrupoUsuario);
		return $stmt->execute();
	}

	public function atualizar($id) {
		$sql  = "UPDATE $this->table SET usuario = :usuario, senha = :senha, idgrupousuario = :idgrupousuario "
						." WHERE idusuario = :idusuario";
		$stmt = Bd::prepare($sql);
		$stmt->bindParam(':usuario', $this->getUsuario());
		$stmt->bindParam(':senha', $this->getSenha());
		$stmt->bindParam(':idgrupousuario', $this->getIdGrupoUsuario());
		$stmt->bindParam(':idusuario', $id);
		return $stmt->execute();
	}

	private static function encriptarSenha() {
			$copia = $this->senha;
			$salt = "strS#09*";
			$this->senha = md5($copia.$salt);
	}


}
