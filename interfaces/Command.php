<?

use command\CommandContext;

interface Command
{
    public function execute(CommandContext $commandcontext) : void;
    

}