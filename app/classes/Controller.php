<?php

namespace App\Handler;

class Controller
{
    /**
     * Загрузка изображений
     *
     * @param $image
     * @param $img_path
     * @return string
     */
    public function uploadImage($image, $img_path)
    {
        $type = $this->checkImage($image);

        $src = $this->createImage($image, $img_path);

        //Если тип равен чему то из списка сравнения, то гоу дальше
        if($type && ($type['mime'] == 'image/png' || $type['mime'] == 'image/jpg' || $type['mime'] == 'image/jpeg')){
            //Проверяем размер файла
            if($image['size'] < 1000000 * 1024){
                //Проверяем разрешение файла
                if(getimagesize($image['tmp_name'])[0] > 50 || getimagesize($image['tmp_name'])[1] > 50)
                {
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
               else exit('Файл маленького размера'.'<br>');
            }
            else exit('Файл большого объема'.'<br>');
        }
        else exit('Тип файла не подходит'.'<br>');
    }
   /**
    *Проверяем валидность изображения
    *
    *@param $image
    *@return mixed
    */
    public function checkImage($image)
    {
        //Проверяем наличие файла
        if (empty($image['tmp_name'])) exit('Файл не выбран');
        else
        {
            //Проверяем отсутствие расширения
            if (pathinfo($image['name'], PATHINFO_EXTENSION) == '')
            {
                $image['name'] .= "27." . str_replace("image/", "", getimagesize($image['tmp_name'])['mime']);
                return getimagesize($image['tmp_name']);
            }
            //Возвращаем тип MIME
            return getimagesize($image['tmp_name']);
        }
    }

    /**
     *Проверяем валидность изображения
     *
     *@param $image
     *@param $img_path
     *@return string
     */
    public function createImage($image, $img_path)
    {
      //Создаем имя файла и его расширение
      $extension = str_replace("image/", "", getimagesize($image['tmp_name'])['mime']);
      $name = time() . '_' . mt_rand(27, 9999999999);
      return $img_path . $name . '.' . $extension;
    }
    /**
     *Проверяем валидность изображения
     *
     *@param $path
     */
    public function deleteImage($path)
    {
      //Удаляем картинку
      if(file_exists($path))
      {
        unlink($path);
      }
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
