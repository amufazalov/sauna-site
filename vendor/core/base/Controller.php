<?php
/**
 * Created by PhpStorm.
 * User: Айрат Муфазалов
 * Date: 03.01.2017
 * Time: 11:34
 */

namespace vendor\core\base;
use vendor\core\Db;

abstract class Controller
{
    /**
     * текущий маршрут и параметры (controller, action, params)
     * @var array
     */
    public $route = [];

    /**
     * вид
     * @var string
     */
    public $view;

    /**
     * текущий шаблон
     * @var string
     */
    public $layout;
    /**
     * Пользовательские данные
     * @var array
     */
    public $vars = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];

       // include APP . "/views/{$route['controller']}/{$this->view}.php";
    }

    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars){
        $this->vars = $vars;
    }

    /**
     * Проверяет был ли совершен ajax запрсо
     */
    protected function isAjax(){

    }

    /**
     * для получения данных из вида внутри isAjax
     * @param $view string вид
     * @param array $vars массив с данными
     */
    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }



}