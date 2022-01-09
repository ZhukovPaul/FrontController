<?

namespace DB;

abstract class Mapper
{
    protected $pdo; 

    public function __construct()
    {
        $reg =  \Registry::getInstance();
        $this->pdo = $reg->getPdo();
         
    }
 
    public function find(int $id) : \DomainObject
    {
        $this->selectstmt()->execute([$id]);
        $row = $this->selectstmt()->fetch() ;
        $this->selectstmt()->closeCursor();
        
        if (! is_array($row)) {
            return null;
        }
        if (! isset($row['id'])) {
            return null;
        }

        $object = $this->createObject ($row) ;
        return $object;
    }
 
    
    public function createObject( $raw) 
    {
        $obj = $this->doCreateObject($raw);
        return $obj;
    }


    public function selectAll($params)
    {   
        /*
        if(!$params["orderField"]) $params["orderField"] = "id";
        if(!$params["orderType"]) $params["orderType"] = "DESC";
        if(!$params["limit"]) $params["limit"] = 20;
        */
        $result = $this->doSelectAll($params);
        $resObjects = [];


        if(\count($result) == 0 ) return false;

        foreach($result as $row){
            $resObjects[] = $this->createObject ($row) ;
        }
        return $resObjects;
    }

    public function insert( $obj )
    {
        $this->dolnsert($obj);
    }

    abstract public function update( $object);
    abstract protected function doSelectAll( $params) : array;
    abstract protected function doCreateObject ( $raw) ;
    abstract protected function dolnsert (  &$object);
    abstract protected function selectStmt();
    abstract protected function targetclass () ; 
}