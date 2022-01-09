<?

use command\CommandResolver;

class Registry
{
    private static $instance = null;

    private $conf  ;
    private $request  ;
    private $resolver  ;
    private $pdo;

    private function __construct()
    {

        $this->resolver = new CommandResolver(); 
        $this->request = new Request(); 

        $this->conf = new Conf();
        $conf = $this->getConf();
        $dbConf = $conf->get("db");
        
        $pdoObj = new DB\PDOFactory($dbConf["host"],$dbConf["dbName"],$dbConf["user"],$dbConf["pass"]);
        $this->pdo = $pdoObj->getConnectionInstance();
    }

    public static function getInstance() : Registry
    {
        if(is_null(self::$instance) )
            self::$instance = new self();

        return self::$instance;
    }
    public function getConf() : Conf
    {   
        return $this->conf;
    }   

    public function getRequest() : Request
    {   
        return $this->request ;
    }

    public function getResolver() : CommandResolver
    {   
        return $this->resolver ;
    }

    public function getPDO() : \PDO
    {
        return $this->pdo;
    }
}