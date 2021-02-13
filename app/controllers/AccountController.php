<?php

namespace App\Controller;

use App\Handler\Controller;
use App\Model\AccountModel;
use Core\ControllerInterface;
use Core\View;

class AccountController extends Controller implements ControllerInterface {
    public $img_path = 'images/accounts/';

    /**
     * Вывод аккаунтов
     *
     * @throws \Exception
     */
    public function show()
    {
        $accounts = AccountModel::showAll();

        View::render('index.php', ['accounts' => $accounts]);
    }

    /**
     * Вывод аккаунта по id
     *
     * @throws \Exception
     */
    public function getById()
    {
        $id = $_GET['id'];
        $account = new AccountModel();
        $result = $account->getById($id);

        View::render('pages/accounts/show.php', ['account' => $result]);
    }

    /**
     * Форма для редактирования аккаунта
     *
     * @throws \Exception
     */
    public function edit()
    {
        $id = $id = $_GET['id'];
        $account = new AccountModel();
        $result = $account->getById($id);

        View::render('pages/accounts/edit.php', ['account' => $result]);
    }

    /**
     * удаление по id
     *
     * @throws \Exception
     */
    public function deleteById()
    {
        $id =  $_GET['id'];
        $account = new AccountModel();
        $account->deleteById($id);

        View::render('crud_result/delete_result.php', ['back_url' => '/']);
    }

    /**
     * Обновление в таблице по id
     *
     * @throws \Exception
     */
    public function update()
    {
        $id = $_POST['id'];

        $userpic = $this->uploadImage($_FILES['userpic']);

        $args = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'userpic' => $userpic
        ];

        $account = new AccountModel();
        $account->update($id, $args);

        View::render('crud_result/update_result.php', ['back_url' => '/']);
    }

    /**
     * Загрузка изображения
     *
     * @param $image
     * @return string
     */
    // TODO сделать абстрактный метод класса Controller
    // TODO удалить файл, если юзерпик уже есть
    public function uploadImage($image)
    {
        //Проверяем тип файла через MIME
        $type = getimagesize($image['tmp_name']);

        //Создаем имя файла и его расширение
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $name  = time() . '_' . mt_rand(27, 9999999999);
        $src   = $this->img_path . $name . '.' . $extension;

        //Если тип равен чему то из списка сравнения, то гоу дальше
        if($type && ($type['mime'] == 'image/png' || $type['mime'] == 'image/jpg' || $type['mime'] == 'image/jpeg')){
            //Проверяем размер файла
            if($image['size'] < 1000000 * 1024){
                //Если каталога для загрузки нет - создаем, если есть - то загружаем файл.
                if(file_exists($this->img_path)){
                    if(move_uploaded_file($image['tmp_name'], $src)) return $src; else echo 'Ошибка при загрузке';
                }
                else {
                    mkdir($this->img_path);
                    //Перемещаем
                    if(move_uploaded_file($image['tmp_name'], $src)) return $src; else echo 'Ошибка при загрузке';
                }
            }
            else echo 'Файл большого объема'.'<br>';
        }
        else exit('Тип файла не подходит'.'<br>');
    }
}