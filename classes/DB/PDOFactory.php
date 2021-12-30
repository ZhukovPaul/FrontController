<?
namespace DB;

class PDOFactory
{
    private $user = "";
    private $pass = "";
    private $host = "";
    private $dbName = "";
    private $pdo ; 


    public function __construct($host, $dbName, $user, $pass)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pass = $pass;
        try {
            $this->pdo = new \PDO("mysql:host={$this->host};dbname=$this->dbName", $this->user, $this->pass);
        }catch(\PDOException $e){
            echo "Exception {$e}<br>";
        }
    }
    
     function getConnectionInstance()
     {
        return $this->pdo;
     }


}