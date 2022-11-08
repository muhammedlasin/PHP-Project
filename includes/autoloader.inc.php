<?php
spl_autoload_register('myAutoLoader');



function myAutoLoader($classname){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes') === true){
        $path = '../classes/';
    }

    else{
        $path = 'classes/';
    }

    $extension = '.class.php';

    include_once $path.$classname.$extension;
}

?>








