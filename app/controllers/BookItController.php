<?php
/**
 * Created by PhpStorm.
 * User: Айрат
 * Date: 03.05.2017
 * Time: 14:23
 */

namespace app\controllers;


use app\models\BookIt;

class BookItController extends AppController
{
    //public $layout = 'book-it';
    const APPLICATION_NAME = 'Google Calendar API PHP';
    const CLIENT_SECRET_PATH = LIBS . '/google-api/client_secret.json';

    public function indexAction(){
        if (isset($_POST['addEventSubmit'])){
            require_once LIBS . '/google-api/autoload.php';

            $client = new \Google_Client();
            $client->setAuthConfig(self::CLIENT_SECRET_PATH);

            //окружение
            /*$client->addScope([
                Google_Service_Calendar::CALENDAR_READONLY,
                Google_Service_Calendar::CALENDAR
            ]);*/

            //Необходимо для получения refreshToken
            $client->setAccessType('offline');
            $client->setApprovalPrompt('force');

            $inputDate = $_POST['inputDate'];
            $startTime = $_POST['inputStartTime'];
            $endTime = $_POST['inputEndTime'];
            $inputClientName = $_POST['inputClientName'];
            $inputClientPhoneNumber = $_POST['inputClientPhoneNumber'];
            $inputAmountPeople = $_POST['inputAmountPeople'];

            //timezone региона

            $tz = (new \DateTime())->getTimezone()->getName();
            //время начала бронирования
            $startDate = new \DateTime($inputDate . 'T' . $startTime, new \DateTimeZone($tz));
            $startTime = $startDate->format(DATE_ATOM);
            //время окончания бронирования
            $endDate = new \DateTime($inputDate . 'T' . $endTime, new \DateTimeZone($tz));
            $endTime = $endDate->format(DATE_ATOM);

            $model = new BookIt();
            $refresh_token = $model->findOne('refresh_token', 'name');
            $refresh_token = $refresh_token[0]['info'];

            $accessToken = $client->refreshToken($refresh_token);

            //$client->setAccessToken($accessToken);

            $service = new \Google_Service_Calendar($client);

            $event = new \Google_Service_Calendar_Event([
                'summary' => 'Забронировано',
                'description' => "Имя клиента: $inputClientName
                              Контактный номер: $inputClientPhoneNumber 
                              Количество человек: $inputAmountPeople ",
                'start' => [
                    'dateTime' => $startTime
                ],
                'end' => [
                    'dateTime' => $endTime
                ]
            ]);

            $calendarId = 'rgmjsj7ts4i77v6pup17ps2fho@group.calendar.google.com';

            $service->events->insert($calendarId, $event);
            $_SESSION['msg_suc'] = 'Бронирование прошло успешно';
            //printf('Event created: %s', $event->htmlLink);

        }

        $this->setMeta('Бронирование мест');
        $meta = $this->meta;
        $this->set(compact('meta'));
    }

    public function oauthCallbackAction(){
        $this->layout = false;

        require_once LIBS . '/google-api/autoload.php';

        $client = new \Google_Client();
        $client->setAuthConfigFile(self::CLIENT_SECRET_PATH);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth-callback');
        $client->addScope([
            \Google_Service_Calendar::CALENDAR_READONLY,
            \Google_Service_Calendar::CALENDAR
        ]);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');

        if (! isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {

            $client->authenticate($_GET['code']);

            $authorizationCode = $_GET['code'];
            $refreshToken = $client->getRefreshToken();
            $accessToken = $client->getAccessToken();

            debug($refreshToken);

            $model = new BookIt();
            $model->updateRefreshToken($refreshToken);

            //Если истина, то отравляем на страницу бронирования
            if($model->updateRefreshToken($refreshToken)){
                $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/admin/dashboard';
                $_SESSION['msg_suc'] = 'Токен удачно обновлен';
                header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            }else{
                 $_SESSION['msg'] = 'Произошла ошибка! Свяжитесь с администратором.';
            }

        }
    }
}