<?php

namespace App\Controllers;


use App\View;

class HomeController
{
    public function  index():string
    {
        return (new View('index'))->render();
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