<?php
/**
 * Created by PhpStorm.
 * User: Айрат Муфазалов
 * Date: 04.01.2017
 * Time: 13:22
 */

namespace app\controllers;


use vendor\core\base\Controller;

class AppController extends Controller
{
    protected $meta = []; //массив с метадаными

    protected function setMeta($title = '', $meta_d = '', $meta_k = ''){
        $this->meta['title'] = $title;
        $this->meta['description'] = $meta_d;
        $this->meta['keywords'] = $meta_k;
    }
}