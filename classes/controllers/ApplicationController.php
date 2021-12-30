<?

namespace controllers;

class ApplicationController implements \Controller
{

    private $defaultCommand = "Index";
    
    private $appRegistry ;  

    private function __construct()
    {
        $this->appRegistry =  \Registry::getInstance();
    }

    private function getCommand(\Request $request) //: Command 
    {
        $commandClass = $this->defaultCommand;

        if($request->get("action")){
            $commandClass = $request->get("action");
        }
        
        $resolver = $this->appRegistry->getResolver();
        return $resolver->recognize($commandClass);;
    }

    public static function run(): void
    {
        $instance = new self();
        $instance->init();

        $command = $instance->getCommand( $instance->appRegistry->getRequest() );
        $commandContext = new \command\CommandContext();
        
        if(!is_null($command)){
            $command->execute($commandContext);
        } 

        \TemplateView::render( $instance->appRegistry->getRequest(), $commandContext );
    }

    private function init()
    {
        $conf = $this->appRegistry->getConf();
        //print_r($conf);
    }
     
    
}