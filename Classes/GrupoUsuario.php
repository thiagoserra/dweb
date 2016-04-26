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
    private $idGrupoUsuario;


  	public function setGrupo($grupo){
  		$this->grupo = $grupo;
  	}

  	public function getGrupo() {
  		return $this->grupo;
  	}

    public function inserir(){
      return false;
    }

    public function atualizar($id) {
      return false;
    }

    public function montaSelectGrupo() {
      foreach(self::selecionarTudo() as $key => $value) {
        $tag = "<option value='".$value->id."'>";
        $tag .= $value->grupo."</option>\n";
      }
      return $tag;
    }


  }
