<?php

namespace App;

use App\Exception\ViewNotFoundException;

class View
{

    /**
     * @param string $string
     */
    public function __construct(
        protected string $view ,
        protected array $params =[]
    ){
    }

    public function render(): string
    {
        $filePath=VIEW_PATH.'/'.$this->view.'.php';
        if(!file_exists($filePath)){
            throw new ViewNotFoundException();
        }

        ob_start();
        include $filePath;
        return (string) ob_get_clean();
    }
}