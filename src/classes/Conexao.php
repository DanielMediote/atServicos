<?php

class Conexao
{

    private function __construct()
    {

    }

    public function open()
    {
        if (!defined('user')) {
            define('user', 'root');
        }
        if (!defined('host')) {
            define('host', 'localhost');
        }
        if (!defined('pass')) {
            define('pass', 'root');
        }
        if (!defined('data')) {
            define('data', 'atServico');
        }
        if (!defined('port')) {
            define('port', '3306');
        }
        if (!defined('base')) {
            define('base', 'mysql');
        }
        try {
            switch (base) {
                case 'mysql':
                    $conn = new PDO('mysql:host=' . host . 'port=' . port . ';dbname=' . data, user, pass,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES uft8'));
                    break;

                case 'pgsql':
                    $conn = new PDO('pgsql:dbname=' . data . '; user=' . user . '; password=' . pass . '; host=' . host . '; port=' . port);
                    break;

                case 'mssql':
                    $conn = new PDO('mssql:host=' . host . ',' . port . ';' . 'dbname=' . data, user, pass);
                    break;
            }

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $conn;
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }

    public static function prepare($sql)
    {
        return self::open()->prepare($sql);
    }
}

?>