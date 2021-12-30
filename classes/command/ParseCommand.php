<?

namespace command;


class ParseCommand implements \Command
{
    public function execute(CommandContext $commandContext): void 
    {
         $parser = new \parser\JSON($_SERVER["DOCUMENT_ROOT"]."/upload/blog.json");
         $parser->parse();
    }
   
}