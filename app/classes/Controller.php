<?php

namespace App\Handler;

class Controller
{
    //параментры загружаемых изображений
    private $valid_types = array('image/png', 'image/jpg', 'image/jpeg');
    private $img_max_size = 1000000 * 1024;

    /**
     * Удаление фотографий
     *
     * @param $image
     * @return null
     */
    public function deleteImage($image){
        if(file_exists($image)) unlink($image); 
    }

    /**
     * Возвращает свойства фотографии
     *
     * @param $image
     * @return string
     */
    private function getImgType($image){
        if (empty($image)) return false; else return getimagesize($image);
    }

    /**
     * Сборка путь файла из его имени и пути
     *
     * @param $file
     * @param $file
     * @return string
     */
    private function createFileName($file, $file_path, $type){
        $extension = pathinfo($file, PATHINFO_EXTENSION);
		//Если нет расширения - получить из type.
		//в mime хранится в формате img/png, поэтому делим строку с разделителем / и берем вторую часть
		if(!$extension) $extension = explode("/", $type['mime'])[1];
        $name  = time() . '_' . mt_rand(27, 9999999999);
        $src   = $file_path . $name . '.' . $extension;
        return $src;
    }

    /**
     * ПРоверка типа файла на соответствие 
     *
     * @param $type
     * @return boolean
     */
    private function checkImgTypes($type){
        if(!$type) return false;
        foreach ($this->valid_types as $value) {
            if ($value == $type['mime']) return true;
        }
        return false;
    }

    /**
     * Загрузка изображений
     *
     * @param $image
     * @param $img_path
     * @return string
     */
    public function uploadImage($image, $img_path)
    {
        //Проверяем тип файла через MIME
        $type = $this->getImgType($image['tmp_name']);
        if(!$type) return false;

        //Создаем имя файла и его расширение
        $src = $this->createFileName($image['name'], $img_path, $type);

        //Проверка типа файла
        if($this->checkImgTypes($type)){
            //Проверяем размер файла
            if($image['size'] < $this->img_max_size){
                //Если каталога для загрузки нет - создаем
                if(!file_exists($img_path)) mkdir($img_path);
                //загружаем файл
                if(move_uploaded_file($image['tmp_name'], $src)) return $src; else echo 'Ошибка при загрузке';
            }
            else exit('Файл большого объема'.'<br>');
        }
        else exit('Тип файла не подходит'.'<br>');
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
