<?

namespace command;


class JSONCommand implements \Command
{
    public function execute(CommandContext $commandContext): void 
    {
        
        $request = new \Request();
       
        $arFilter = [];
        $sql = "SELECT * FROM `blog` ";
        if($request->get("views") !="false" ||
            ($request->get("date_from")!="" && $request->get("date_to")!="") ||
            $request->get("productId")  !="false"
        ){
            $sql .= "WHERE `id` >0 ";
        }
        if($request->get("date_from") && $request->get("date_to")){
            $dateFrom =  \DateTime::createFromFormat('Y-m-d', $request->get("date_from"));
            $dateTo =  \DateTime::createFromFormat('Y-m-d', $request->get("date_to"));

            $sql .= " AND `time_create` > ".$dateFrom->getTimestamp()." AND `time_create` < ".$dateTo->getTimestamp()."\n";
        }
        if($request->get("views") !="false" ){
            $views = explode("_",$request->get("views"));
            $sql .= " AND `views` > ".$views[0]." AND `views` < ".$views[1]." \n";
        }
        if($request->get("productId")  !="false"){
            $sql .= " AND `product_id` = ".$request->get("productId")."\n";
        }
        if($request->get("countElements")  !="false" ){
            $sql .= " LIMIT ".$request->get("countElements");
       
        }
         echo  $sql;
        $reg =  \Registry::getInstance();
        $this->pdo = $reg->getPdo();
        $sth = $this->pdo->prepare( $sql );
        $sth->execute();
        $arRes = [];
        foreach($sth->fetchAll() as $blogItemFields):
            $arRes[] = new \domain\BlogDomain($blogItemFields);
        endforeach;
        $commandContext->addParam("collection", $arRes) ;
   
    }
}