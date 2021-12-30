<?

namespace command;


class IndexCommand implements \Command
{
    public function execute(CommandContext $commandContext): void 
    {
        Echo "Index Page";
    }
   
}