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
    private $idGrupo;

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    public function getIdGrupo() {
        return $this->idGrupo;
    }

    public function inserir() {
        $sql = "INSERT INTO $this->tabela (usuario, senha, idgrupo) "
                . " VALUES (:usuario, :senha, :idgrupo)";
        $stmt = Bd::prepare($sql);
        $stmt->bindParam(':usuario', $this->getUsuario());
        $stmt->bindParam(':senha', $this->getSenha());
        $stmt->bindParam(':idgrupo', $this->getIdGrupo());
        return $stmt->execute();
    }

    public function atualizar($id) {
        $sql = "UPDATE $this->tabela SET usuario = :usuario, senha = :senha, idgrupo = :idgrupo "
                . " WHERE id = :id";
        $stmt = Bd::prepare($sql);
        $stmt->bindParam(':usuario', $this->getUsuario());
        $stmt->bindParam(':senha', $this->getSenha());
        $stmt->bindParam(':idgrupo', $this->getIdGrupo());
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function encriptarSenha() {
        $copia = $this->getSenha();
        $salt = "strS#09*";
        $this->setSenha(md5($copia . $salt));
    }

}
