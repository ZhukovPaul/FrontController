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

    public function insert( $obj )
    {
        $this->dolnsert($obj);
    }

    abstract public function update( $object);
    abstract protected function doCreateObject (array $raw) ;
    abstract protected function dolnsert ( $object);
    abstract protected function selectStmt();
    abstract protected function targetclass () ; 
}