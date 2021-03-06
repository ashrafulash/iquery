<?php
spl_autoload_register('classAutoLoader');

function classAutoLoader($className){

    $dir    =   'classes/';
    $ext    =   '.class.php';
    
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    //check when class defined inside includes folter
    if(strpos($url, 'includes') !== false){
        $dir = '../classes/';
    }

     //check when class defined inside payment folter
     if(strpos($url, 'payment') !== false){
        $dir = '../classes/';
    }

    //check when class defined inside token folter
    if(strpos($url, 'token') !==false){
        $dir = '../../classes/';
    }

    //check when class defined inside iecc-inc folder
    if(strpos($url, 'iecc-uplo') !==false){
        $dir = '../../classes/';
    }

    
    //check when class defined inside iecc-inc folder
    if(strpos($url, 'ict-uplo') !==false){
        $dir = '../../classes/';
    }

     //check when class defined inside admin folder
    if(strpos($url, 'admin') !==false){
        $dir = '../classes/';
    }

      //check when class defined inside admin action folder
    if(strpos($url, 'action') !==false){
        $dir = '../../classes/';
    }


    $path   =   $dir . $className . $ext;
    
    if(!file_exists($path)){
        return false;
    }
    else{
        include_once $path;
    }
}
