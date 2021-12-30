<?

class Request
{
    private $requests = []; 
    function __construct()
    {
        $this->requests = $_REQUEST;
    }

    function get($key)
    {
        if($this->requests[$key] )
            return $this->requests[$key];

        return false;
    }

}