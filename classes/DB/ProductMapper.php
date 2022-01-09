<?

namespace DB;

class ProductMapper extends Mapper
{
    
    public function __construct()
    {
        parent::__construct();
         
        $this->selectStmt = $this->pdo->prepare (
            "SELECT * FROM `products` WHERE id=? "
            ) ;

        $this->selectFilterMoreGroupAll = $this->pdo->prepare (
                "SELECT * FROM `products` 
                    WHERE :filterField > :filterValue
                     GROUP BY  :groupField  :orderType  
                     ORDER BY  :orderField  :orderType 
                     LIMIT :limit"
                ) ;

        $this->selectFilterLessGroupAll = $this->pdo->prepare (
            "SELECT * FROM `products` 
                WHERE :filterField > :filterValue
                 GROUP BY  :groupField  :orderType  
                 ORDER BY  :orderField  :orderType 
                 LIMIT :limit"
            ) ;
    
        $this->selectGroupAll = $this->pdo->prepare (
                "SELECT * FROM `products` 
                    GROUP BY  :groupField  :orderType  
                    ORDER BY  :orderField  :orderType 
                    LIMIT :limit"
                ) ;

        $this->selectByIDs = $this->pdo->prepare (
                "SELECT * FROM `products` WHERE `id` IN ( :ids ) "
                ) ; 
        $this->selectAll = $this->pdo->prepare (
                "SELECT * FROM `products` ORDER BY  :orderField  :orderType LIMIT :limit"
                ) ;

        $this->updateStmt = $this->pdo->prepare (
            "UPDATE products SET name=?, id=? WHERE id=?"
            ) ;

        $this->insertStmt = $this->pdo->prepare (
            "INSERT INTO `products` (`id`, `name`, `href` ) VALUES ( NULL, :name, :href  )"
            ) ;
              
    }

    public function update( $object)
    {

    }

    protected function doCreateObject ($raw)
    {
        $object = new \domain\ProductDomain($raw);
        return $object;
    }

    public function selectByIDs( $IDs )
    {
        $arRes = [];
        foreach($IDs as $id){
            $this->selectByIDs->execute([":ids"=>$id]);
            $arRes[] = new \domain\ProductDomain($this->selectByIDs->fetch());
        }
         
       
        return $arRes;
    }
    protected function dolnsert (  &$object )
    {
         
        $this->insertStmt->bindParam(':href', $object->getHref(), \PDO::PARAM_STR );
        $this->insertStmt->bindParam(':name', $object->getName(), \PDO::PARAM_STR );

        $this->insertStmt->execute();
       // print_r( $this->insertStmt->errorInfo() );
        $id = $this->pdo->lastInsertId();
        $object->setID($id);
                
    }

    protected function doSelectAll($params) : array
    {
        $this->selectAll->bindParam(':orderField', $params['orderField'], \PDO::PARAM_STR);
        $this->selectAll->bindParam(':orderType', $params['orderType'], \PDO::PARAM_STR);
        $this->selectAll->bindParam(':limit', $params['limit'], \PDO::PARAM_INT);
        $this->selectAll->execute();
        
       // print_r( $this->selectAll->errorInfo() );
        $all = $this->selectAll->fetchAll();
        return $all;
    }

    protected function selectStmt()
    {

    }
    protected function targetclass() 
    {

    } 
}