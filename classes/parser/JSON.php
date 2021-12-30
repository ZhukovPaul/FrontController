<?php
namespace parser;

class JSON
{
    private $file; 
    function __construct($file)
    {
        $reg =  \Registry::getInstance();
        $this->pdo = $reg->getPdo();

        if(!file_exists($file))
            echo "File {$file} hasn't existed yet";
            //$commandContext->setError("File {$file} hasn't existed yet");
        $this->file = $file;
    }

    public function parse()
    {
        //json_decode($this->file)
    }
    
}