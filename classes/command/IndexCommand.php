<?

namespace command;


class IndexCommand implements \Command
{
    public function execute(CommandContext $commandContext): void 
    {
        $blogMapper = new \DB\BlogMapper();
        $blogCollection =  $blogMapper->selectAll(["limit"=>10]);
        $commandContext->addParam("collection",$blogCollection);
        
        // Only O(n) complexity
        $products = [];
        foreach($blogCollection as $blog){
            $products[$blog->getProductId()] = null;
        }

        $productMapper = new \DB\ProductMapper();
        $blogCollection =  $productMapper->selectByIDs( array_keys($products) );
   
        $commandContext->addParam("products",$blogCollection );
    }
   
}