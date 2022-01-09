<?

namespace command;


class ParseCommand implements \Command
{
    public function execute(CommandContext $commandContext): void 
    {
        if( $props = \parser\JSON::parse($_SERVER["DOCUMENT_ROOT"]."/upload/products.json") ){
            
            $tableName= "products";
            
            // Let's create firstly
            echo \DB\Table::create( $tableName ,$props["columns"]) ? "true" : 'false';
            
            $arNewElements = [];
            // Let's fill this table
            foreach($props["data"] as $entity):
               
                // For Blog
                /* $blogObject = new \domain\BlogDomain($entity);
                $blogMapper = new \DB\BlogMapper();
                //Here we'll add new elements to  db
                $arNewElements[] = $blogMapper->insert($blogObject);
                $arNewElements[] = $blogObject;
                */  
            
               // For Products
               /*
                $productMapper = new \DB\ProductMapper();
                $productObject = new \domain\ProductDomain($entity);
                $arNewElements[] = $productMapper->insert($productObject);
               */
              
            endforeach;
            
            
            //$commandContext->addParam("addedElements",$arNewElements) ;
        }
    }
   
}