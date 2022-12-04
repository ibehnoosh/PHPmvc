<?php

namespace App\Controllers;


use App\View;
use PDO;

class HomeController
{
    public function  index():View
    {
        try {
            $db = new PDO('mysql:host=localhost; dbname=gio', 'root', '');
        } catch(\PDOException $e){
            throw new \PDOException($e->getMessage(),$e->getCode());
        }
        var_dump($db);
        return View::make('index' , ['foo' => 'test']);
    }

    public function  upload()
    {
        $filePath= STORAGE_PATH.'/'.$_FILES['recipt']['name'];
        move_uploaded_file($_FILES['recipt']['tem_name'] , $filePath);

        echo '<pre>';
        var_dump(pathinfo($filePath));;
        echo '</pre>';
    }
}