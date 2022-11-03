<?php

// //if we are inside the includes folder

// if(getcwd()

// spl_autoload_register(function ($className) {
//     $path = "../classes";
//     $extension = ".class.php";
//     $fullPath = $path.$className.$extension;

//     include_once $fullPath;
// });

//else 

spl_autoload_register(function ($className) {
    $path = "./classes/";
    $extension = ".class.php";
    $fullPath = $path.$className.$extension;

    include_once $fullPath;
});



?>








