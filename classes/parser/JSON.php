<?php
namespace parser;

class JSON implements \Parser
{
   
    public static function parse($file)
    {
        if(!file_exists($file)){
            return false;
        }

        $fileContent = file_get_contents($file) ;
        $result = json_decode($fileContent,true);
        return $result;
    }
    
}