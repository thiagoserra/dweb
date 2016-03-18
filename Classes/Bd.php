<?php
/**
 * Bd.php
 *
 * Definicao da Classe Bd
 * @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
 * @version 1.0
 */
require_once "config.inc.php";

/**
 *  Classe BD:
 *
 *	Responsavel por gerenciar o estado da conexao com o banco de dados
 */
class Bd {

	private static $instancia;

/**
 * Metodo responsavel por verificar se existe uma instancia do banco ativa
 * em caso negativo, cria uma nova
 */
	public static function getInstancia() {
		if(!isset(self::$instancia)) {
			try {
				self::$instancia = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
				self::$instancia->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo "Erro no acesso ao banco de dados: ".$e->getMessage();
			}
		}
		return self::$instancia;
	}

/**
 * Metodo responsavel por executar a consulta no banco de dados
 * Utiliza o prepare da classe PDO
 */
	public static function prepare($sql){
		return self::getInstancia()->prepare($sql);
	}

}
