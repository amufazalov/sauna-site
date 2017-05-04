<?php
/**
 * Created by PhpStorm.
 * User: Айрат
 * Date: 03.05.2017
 * Time: 21:15
 */

namespace app\controllers;


use app\models\Admin;

class AdminController extends AppController
{

    public $layout = 'admin/index';

    public function indexAction()
    {
        if($this->isAuth()) header('Location: /admin/dashboard');

        $this->setMeta('Вход в панель администратора');
        $meta = $this->meta;
        $this->set(compact('meta'));
    }

    public function loginAction()
    {
        $this->layout = false;

        if (isset($_POST['login'])) {
            if ($this->checkAdmin($_POST['email'], $_POST['password'])) {
                $_SESSION['is_auth'] = true;
                header('Location: /admin/dashboard');
            } else {
                $_SESSION['msg'] = 'Пароль или E-mail введены не верно';
                $this->getOut();
            }
        } else {
            $this->getOut();
        }
    }

    public function dashboardAction(){
        if(!$this->isAuth()) $this->getOut();
        $this->layout = 'admin/dashboard';
    }

    //Вспомогательные методы

    /**
     * Проверяет корректность введенных данных
     * @param $email string email из запроса POST
     * @param $password string пароль из запроса POST
     * @return bool
     */
    protected function checkAdmin($email, $password)
    {
        $password = md5($password);
        $model = new Admin();
        $sql = "SELECT `email`, `password` FROM `{$model->table}` WHERE `email` = ? AND `password` = ?";
        $user = $model->findBySql($sql, [$email, $password]);
        return $user ?: false;
    }

    /**
     * Проверяет авторизировн ли админ
     * @return mixed
     */
    protected function isAuth(){
        if(isset($_SESSION['is_auth'])) return $_SESSION['is_auth'];
        else false;
    }

    /**
     * Возвращает на форму авторизации
     */
    public function getOut(){
        header('Location: /admin');
    }
}