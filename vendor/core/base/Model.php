<?php
/**
 * Created by PhpStorm.
 * User: Айрат Муфазалов
 * Date: 15.01.2017
 * Time: 17:26
 */

namespace vendor\core\base;


use vendor\core\Db;

abstract class Model
{
    protected $pdo;
    protected $table;

    /**
     * Первичный ключ
     * @var string
     */
    protected $pk = 'id';

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    /**
     * Получает все данные из таблицы
     * @return array
     */
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

    /**
     * Получает одну запись
     * @param int $id идентификатор записи
     * @param string $field поле
     * @return array
     */
    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    /**
     * Получает данные по произвольному запросу
     * @param string $sql произвольный запрос
     * @return array
     */
    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    /**
     * Поиск
     * @param string $str что мы ищем
     * @param string $field поле по которому производим поиск
     * @param string $table таблица
     * @return array
     */
    public function findLike($str, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%' . $str . '%']);
    }

    public function updateRefreshToken($refresh_token, $params = [])
    {
        $sql = "UPDATE {$this->table} SET info = '$refresh_token' WHERE name = 'refresh_token'";
        return $this->pdo->query($sql, $params);
    }
}