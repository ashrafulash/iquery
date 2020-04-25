<?php
spl_autoload_register('classAutoLoader');

function classAutoLoader($className){
// add folder names where classes will be used
    $folders = [
        'admission',
        'includes',
    ];

    $dir    =   'classes/';
    $ext    =   '.class.php';
    
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    foreach($folders as $fol){
        if(strpos($url, $fol) !== false){
            $dir = '../classes/';
        }
    }

    $path   =   $dir . $className . $ext;
    
    if(!file_exists($path)){
        return false;
    }
    else{
        include_once $path;
    }
}
