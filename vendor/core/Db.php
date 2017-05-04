<?php

namespace vendor\core;

/**
 *
 */
class Db {

    protected $pdo;
    protected static $instance;
    public static $countSql = 0; //Кол-во запросов к БД
    public static $queries = []; //Все наши запросы

    protected function __construct(){
        $db = require_once ROOT . '/config/config_db.php';
        $options = [
          \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, //отвечает за отображение ошибок
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, //формат получения данных по умолчанию
        ];
        $this->pdo = new \PDO($db['dsn'],$db['user'],$db['pass'], $options);
    }

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __clone(){
    }

    /**
     *
     * @param string $sql запрос к бд
     * @param array $params 
     * @return bool
     */
    public function execute($sql, $params = []){
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function query($sql, $params = []){
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if($res !== false){
            return $stmt->fetchAll();
        }
        return [];
    }

}