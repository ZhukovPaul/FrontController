<?

namespace DB;

class Table
{
    private static $query = "CREATE TABLE tbl_name ( `id`  INT NOT NULL AUTO_INCREMENT , tbl_fields , PRIMARY KEY (`id`) )  ";
    
    public static function create($tableName, $fields): bool
    {
        $reg =  \Registry::getInstance();
        $pdo = $reg->getPdo();
        $tableName = $tableName;
        $fields = $fields;

        $fieldsInString = self::prepareQuery($fields);
      
        $fullQuery = str_replace(
            ["tbl_name","tbl_fields"],
            [$tableName,$fieldsInString], 
            self::$query
        );
         
        $pdo->exec($fullQuery);
         
        return $pdo->exec($fullQuery);    
    }

    private static function prepareQuery(Array $fields): string
    {
        $tableContent = [];
        foreach($fields as $key=>$val){
             
            $tableContent[]= "`{$key}` {$val}";
        }
        $fieldsInString = implode(", ",$tableContent);
        return $fieldsInString;
    }
}