<?

namespace DB;

class BlogMapper extends Mapper
{
    
    public function __construct()
    {
        parent::__construct();
         
        $this->selectStmt = $this->pdo->prepare (
            "SELECT * FROM blog WHERE id=? "
            ) ;

        $this->selectBySlug = $this->pdo->prepare (
            "SELECT * FROM blog WHERE href = :slug "
            ) ;
        /*
        $this->selectFilterMoreGroupAll = $this->pdo->prepare (
                "SELECT * FROM `blog` 
                    WHERE :filterField > :filterValue
                     GROUP BY  :groupField  :orderType  
                     ORDER BY  :orderField  :orderType 
                     LIMIT :limit"
                ) ;

        $this->selectFilterLessGroupAll = $this->pdo->prepare (
            "SELECT * FROM `blog` 
                WHERE :filterField > :filterValue
                 GROUP BY  :groupField  :orderType  
                 ORDER BY  :orderField  :orderType 
                 LIMIT :limit"
            ) ;
    
        $this->selectGroupAll = $this->pdo->prepare (
                "SELECT * FROM `blog` 
                    GROUP BY  :groupField  :orderType  
                    ORDER BY  :orderField  :orderType 
                    LIMIT :limit"
                ) ;
        */
        $this->selectAll = $this->pdo->prepare (
                "SELECT * FROM `blog` ORDER BY `time_create` DESC LIMIT :limit"
                ) ;

        $this->updateStmt = $this->pdo->prepare (
            "UPDATE blog SET `href`=:href, `title`=:title, `body`=:body, `description`=:description, `product`=:product, `views`=:views, `time_create`=:time_create , `product_id`=:productId WHERE `id`=:id"
            ) ;
        
        $this->selectUniqueBy = $this->pdo->prepare (
            "SELECT DISTINCT  :field  FROM `blog` "
            ) ;

        $this->insertStmt = $this->pdo->prepare (
            "INSERT INTO `blog` (`id`, `href`, `title`, `body`, `description`, `product`, `views`, `time_create` ) VALUES ( NULL, :href, :title, :body, :description, :product,  :views , :time_create )"
            ) ;
              
    }

    public function update($object)
    {
        $values = [
            "id"=>$object->getID(),
            "href"=>$object->getHref(),
            "title"=>$object->getTitle(),
            "body"=>$object->getBody(),
            "description"=>$object->getDescription(),
            "product"=>$object->getProduct(),
            "views"=> $object->getViews(),
            "time_create"=>$object->getTimeСreate(),
            "productId"=>$object->getProductId()          
        ];
        $this->updateStmt->execute($values);
        $this->updateStmt->fetch();
        //$object->setID($id);   
    }

    public function selectBySlug($slug)
    {
        $this->selectBySlug->bindParam(':slug', $slug, \PDO::PARAM_STR);
        $this->selectBySlug->execute();
        $raw = $this->selectBySlug->fetch();
        $object = new \domain\BlogDomain($raw);
        return $object;
    }

    public function selectUniqueBy($fieldName)
    {
        $this->selectUniqueBy->bindParam(':field', $fieldName, \PDO::PARAM_STR);
        $this->selectUniqueBy->execute();
        $all = $this->selectUniqueBy->fetchAll();
        return $all;
    }

    protected function doCreateObject ($raw)
    {
        $object = new \domain\BlogDomain($raw);
        return $object;
    }
    protected function dolnsert (  &$object )
    {
        $values = [
            "href"=>$object->getHref(),
            "title"=>$object->getTitle(),
            "body"=>$object->getBody(),
            "description"=>$object->getDescription(),
            "product"=>$object->getProduct(),
            "views"=> $object->getViews(),
            "time_create"=>$object->getTimeСreate()            
        ];
        
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setID($id);        
    }

    protected function doSelectAll($params) : array
    {
         
        //$this->selectAll->bindParam(':field', $params['field'], \PDO::PARAM_STR);
        /*$this->selectAll->bindParam(':orderType', $params['orderType'], \PDO::PARAM_STR);*/
        $this->selectAll->bindParam(':limit', $params['limit'], \PDO::PARAM_INT);

        $this->selectAll->execute();
        
       // print_r( $this->selectAll->errorInfo() );
        $all = $this->selectAll->fetchAll();
       // print_r($all);
        return $all;
    }

    protected function selectStmt()
    {

    }
    protected function targetclass() 
    {

    } 
}