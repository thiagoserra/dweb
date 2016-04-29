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
    private $nome;
    private $email;

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

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function inserir() {
        $sql = "INSERT INTO $this->tabela (usuario, senha, idgrupo, nome, email) "
                . " VALUES (:usuario, :senha, :idgrupo, :nome, :email)";
        $stmt = Bd::prepare($sql);
        $stmt->bindParam(':usuario', $this->getUsuario(), PDO::PARAM_STR);
        $stmt->bindParam(':senha', $this->getSenha(), PDO::PARAM_STR);
        $stmt->bindParam(':idgrupo', $this->getIdGrupo(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $this->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->getEmail(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function atualizar($id) {
        $sql = "UPDATE $this->tabela SET senha = :senha, idgrupo = :idgrupo, nome = :nome, email = :email "
                . " WHERE id = :id";
        $stmt = Bd::prepare($sql);
        $stmt->bindParam(':senha', $this->getSenha(), PDO::PARAM_STR);
        $stmt->bindParam(':idgrupo', $this->getIdGrupo(), PDO::PARAM_INT);
        $stmt->bindParam(':nome', $this->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function encriptarSenha() {
        $copia = $this->getSenha();
        $salt = "strS#09*";
        $this->setSenha(md5($copia . $salt));
    }

    public function selecionarUsuario(){
        $sql = "SELECT * FROM $this->tabela WHERE usuario = :usuario AND senha = :senha";
        $stmt = Bd::prepare($sql);
        $stmt->bindParam(':usuario', $this->getUsuario(), PDO::PARAM_STR);
        $stmt->bindParam(':senha', $this->getSenha(), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
}
