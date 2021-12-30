<?

namespace command;

class CommandResolver
{
    function recognize($commandClass)
    {
        $className = "command\\{$commandClass}Command";
       
        if( !class_exists($className))
            return null;
    
        $r = new \ReflectionClass($className);
        $commandInstance =  $r->newInstance();

        return $commandInstance;
        
    }
}