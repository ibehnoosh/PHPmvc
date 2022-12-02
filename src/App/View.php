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

    public static function make(string $view, array $params =[]) : static
    {
        return new static($view,$params);
    }

    public function render(): string
    {
        $filePath=VIEW_PATH.'/'.$this->view.'.php';
        if(!file_exists($filePath)){
            throw new ViewNotFoundException();
        }

//        foreach ($this->params as $key=> $value){
//           $$key=$value;
//        }

        extract($this->params);
        ob_start();
        include $filePath;
        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }
    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}