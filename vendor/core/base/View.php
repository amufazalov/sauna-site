<?php
/**
 * Created by PhpStorm.
 * User: Айрат Муфазалов
 * Date: 03.01.2017
 * Time: 14:37
 */

namespace vendor\core\base;


class View
{
    /**
     * Текущий маршрут и параметы (controller, action, params)
     * @var array
     */
    public $route = [];

    /**
     * текущий вид
     * @var string
     */
    public $view;

    /**
     * текущий шаблон
     * @var string
     */
    public $layout;

    /**
     * для хранения скриптов
     * @var array
     */
    public $scripts = [];

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }

        $this->view = $view;
        //echo LAYOUT;
    }


    public function render($vars)
    {

        if (is_array($vars)) extract($vars);

        /*
         * Путь к виду
         */
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require_once $file_view;
        } else {
            echo "<p>Не найден вид <b>{$file_view}</b></p>";
        }
        $content = ob_get_clean(); //выводим все в переменную из буфера

        if (false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                //Вырезаем скрипты jS
                $content = $this->catchScripts($content);
                //преобразуем в одномерный массив для удобства работы
                $scripts = [];
                if(!empty($this->scripts[0])){
                    $scripts = $this->scripts[0];
                }
                require_once $file_layout;
            } else {
                echo "<p>Не найден шаблон <b>{$file_layout}</b></p>";
            }
        }

    }

    /**
     * Ищет скрипты и вырезает их
     * @param $content string наш вид из буфера
     * @return mixed
     */
    protected function catchScripts($content){
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if(!empty($this->scripts)){
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

}