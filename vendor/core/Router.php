<?php

namespace vendor\core;

class Router{

    /**
     * @var array таблица маршрутов
     */
    protected static $routes = [];
    /**
     * @var array текущий маршрут, который работает
     */
    protected static $route = [];

    /**
     * Добавляет маршрут в таблицу маршрутов
     *
     * @param string $regexp регулярное выражение маршрута
     * @param array $route маршрут ([controller, action, params])
     */
    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    /**
     * возвращает таблицу маршрутов
     *
     * @return array
     */
    public static function getRoutes(){
        return self::$routes;
    }

    /**
     * Возвращает текущий маршрут
     *
     * @return array
     */
    public static function getRoute(){
        return self::$route;
    }

    /**
     * Ищет совпадения с маршрутом
     * @param $url string url-адрес
     * @return bool true в случае успеха, иначе ложь
     */
    protected static  function matchRoute($url){
        foreach (self::$routes as $pattern => $route) {
            if(preg_match("#$pattern#i", $url, $matches)){

                foreach ($matches as $key => $value){
                    if(is_string($key)){
                        $route[$key] = $value;
                    }
                }

                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * перенаправляет URL по корректному маршруту
     * @param string $url входищий URL
     * @return void
     */
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\'. self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                    $cObj->getView();
                }else{
                    echo "Метод <b>$controller::$action</b> не найден";
                }
            }else{
                echo "Контроллер <b>$controller</b> не найден!";
            }
        }else{
            http_response_code(404);
            include '404.html';
        }
    }

    /**
     * Преобразует имена к виду СamelCase
     * @param string $name строка для преобразования
     * @return string
     */
    protected static function upperCamelCase($name){
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }

    /**
     * Преобразует имена к виду camelCase
     * @param string $name строка для преобразования
     * @return string
     */
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * Отрезает явные $_GET параметры
     * @param string $url url для преобразования
     * @return string
     */
    protected static function  removeQueryString($url){
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }

}