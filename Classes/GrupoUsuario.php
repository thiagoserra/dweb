<?php

/**
 * GrupoUsuario.php
 *
 * Definicao da classe GrupoUsuario
 * @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
 * @version 1.0
 */
require_once 'Crud.php';

/**
 *  Implementacao da classe GrupoUsuario
 *  @see Crud
 */
class GrupoUsuario extends Crud {

    protected $tabela = 'gruposusuario';
    private $grupo;
    private $id;

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function getGrupo() {
        return $this->grupo;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function inserir() {
        return false;
    }

    public function atualizar($id) {
        return false;
    }

    public function montaSelectGrupo($id = '') {       
        $combo = "<select name=\"idgrupo\" class='form-control'>\n";
        $combo .= "<option></option>\n";
        foreach (self::selecionarTudo() as $key => $value ) {
            (($value->id == $id) ? $select = " selected" : $select = "");
            $combo .= "<option value='". $value->id ."'$select>".$value->grupo."</option>\n";
        }
        $combo .= "</select>\n";
        return $combo;        
    }

}
