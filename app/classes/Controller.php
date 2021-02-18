<?php

namespace App\Handler;

class Controller
{
    // TODO проверить валидацию юзерпиков - если у аккаунта уже есть эзерпик, то удалить его из каталога
    // TODO найти ошибку
    // TODO нормально разделить на методы
    /**
     * Загрузка изображений
     *
     * @param $image
     * @param $img_path
     * @return string
     */
    public function uploadImage($image, $img_path)
    {
        $this->checkImage($image);

        $this->createImage($image, $img_path);
        
        //Если тип равен чему то из списка сравнения, то гоу дальше
        if($type && ($type['mime'] == 'image/png' || $type['mime'] == 'image/jpg' || $type['mime'] == 'image/jpeg')){
            //Проверяем размер файла
            if($image['size'] < 1000000 * 1024){
                //Если каталога для загрузки нет - создаем, если есть - то загружаем файл.
                if(file_exists($img_path)){
                    if(move_uploaded_file($image['tmp_name'], $src)) return $src; else echo 'Ошибка при загрузке';
                }
                else {
                    mkdir($img_path);
                    //Перемещаем
                    if(move_uploaded_file($image['tmp_name'], $src)) return $src; else echo 'Ошибка при загрузке';
                }
            }
            else echo 'Файл большого объема'.'<br>';
        }
        else exit('Тип файла не подходит'.'<br>');
    }

    public function checkImage($image)
    {
      //Проверяем тип файла через MIME
      if (empty($image['tmp_name'])) return false; else $type = getimagesize($image['tmp_name']);
    }

    public function createImage($image, $img_path)
    {
      //Создаем имя файла и его расширение
      $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
      $name = time() . '_' . mt_rand(27, 9999999999);
      $src = $img_path . $name . '.' . $extension;
    }

    /**
     * уничтажаем все сессии
     */
    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}
