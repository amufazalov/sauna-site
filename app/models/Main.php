<?php
/**
 * Created by PhpStorm.
 * User: Айрат Муфазалов
 * Date: 15.01.2017
 * Time: 17:02
 */

namespace app\models;


use vendor\core\base\Model;

class Main extends Model
{
    public $table = 'bs16_articles';

    //Переопределяем первичный ключ, если это необходимо
    //protected $pk = 'category_id';
}