<?

class TemplateView
{
    private static $defaultTemplate = "index";
    private static $default404Template = "/views/404.php";
    private static $defaultTemplateHeader = "/views/layout/header.php";
    private static $defaultTemplateFooter = "/views/layout/footer.php";
      
    static function render(\Request $request , \command\CommandContext $commandContext  )
    {
        $context =  $commandContext;
        $tempateName = self::$defaultTemplate;

        if($request->get("action"))
            $tempateName = $request->get("action");
        

        include $_SERVER["DOCUMENT_ROOT"].self::$defaultTemplateHeader;
         
        if(  !file_exists($_SERVER["DOCUMENT_ROOT"]."/views/{$tempateName}.php") ){
            include $_SERVER["DOCUMENT_ROOT"].self::$default404Template;
        }
      
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/views/{$tempateName}.php"))
            include $_SERVER["DOCUMENT_ROOT"]."/views/{$tempateName}.php";


        include $_SERVER["DOCUMENT_ROOT"].self::$defaultTemplateFooter;

    }
    
}