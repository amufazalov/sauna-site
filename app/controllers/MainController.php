<?php

namespace app\controllers;
use app\models\Main;

/**
 * Created by PhpStorm.
 * User: Айрат Муфазалов
 * Date: 02.01.2017
 * Time: 18:31
 */
class MainController extends AppController
{

    //public $layout = 'main';

    public function indexAction(){
        $model = new Main();
        //Получаем все посты
        $articles = $model->findOne(1, 'article_id');
        $article = $articles[0];
        //Запрещаем подключение шаблона
        //$this->layout = false;
        $this->setMeta('Главная страница', 'Мета описание', 'Ключевые слова');
        $meta = $this->meta;
        $this->set(compact('meta', 'article', 'post'));
    }

    public function testAction(){
        echo 'Hellof from view->main->test.php';
    }
}