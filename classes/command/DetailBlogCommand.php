<?

namespace command;


class DetailBlogCommand implements \Command
{
    public function execute(CommandContext $commandContext): void 
    {
        $blogMapper = new \DB\BlogMapper();
        $blogDetail =  $blogMapper->selectBySlug( $_REQUEST["slug"] );
        echo $blogDetail->getViews();
        $blogDetail->setViews($blogDetail->getViews() + 1);
        //print_r($blogDetail);
        $blogMapper->update($blogDetail);
        $commandContext->addParam("blogDetail",$blogDetail);
    }
}