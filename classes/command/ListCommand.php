<?

namespace command;

class ListCommand implements \Command
{
    public function execute(CommandContext $commandContext): void 
    {
        echo "LIST CLASS EXIST";
    }
   
}