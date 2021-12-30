<?php

spl_autoload_register(function ($class_name) {
    $filePath = $_SERVER["DOCUMENT_ROOT"]. DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR.$class_name . '.php';
    //echo $filePath."<br>";
    if( file_exists($filePath) )
        include  $filePath;
});

spl_autoload_register(function ($class_name) {
    $filePath =   $_SERVER["DOCUMENT_ROOT"]. DIRECTORY_SEPARATOR."interfaces".DIRECTORY_SEPARATOR.$class_name . '.php';
    //echo $filePath."<br>";
    if( file_exists($filePath) )
        include  $filePath;
});


