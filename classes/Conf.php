<?

class Conf
{

    private $path = DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR."conf.ini" ;
    
    private $props = [];

    function __construct()
    {
        $curPath = $_SERVER["DOCUMENT_ROOT"].$this->path;
        if( file_exists( $curPath) ){
            $this->props = parse_ini_file($curPath, true);
        }
    }


    public function get($group)
    {
        return $this->props[$group];
    }


}