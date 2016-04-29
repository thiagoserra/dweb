<?php
/**
 * Bd.php
 *
 * Definicao da Classe Bd
 * @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
 * @version 1.0
 */

/**
 *  Classe BD:
 *
 * 	Responsavel por gerenciar o estado da conexao com o banco de dados
 */
class Bd {

    private static $instancia;

    /**
     * Metodo responsavel por verificar se existe uma instancia do banco ativa
     * em caso negativo, cria uma nova
     */
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$instancia->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
            } catch (PDOException $e) {
                echo "Erro no acesso ao banco de dados: " . $e->getMessage();
            }
        }
        return self::$instancia;
    }
    
    /**
     * Método responsável por retornar o id do último registro inserido numa tabela qquer
     * 
     */
    public static function getInsertId() {
        return self::$instancia->lastInsertId();
    }    

    /**
     * Metodo responsavel por executar a consulta no banco de dados
     * Utiliza o prepare da classe PDO
     */
    public static function prepare($sql) {
        return self::getInstancia()->prepare($sql);
    }

}
