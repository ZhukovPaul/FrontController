<?

namespace DB;

class BlogMapper extends Mapper
{
    public function __constructor()
    {
        parent::__construct();
        
        $this->selectStmt = $this->pdo->prepare (
            "SELECT * FROM blog WHERE id=?"
            ) ;

        $this->updateStmt = $this->pdo->prepare (
            "UPDATE blog SET name=?, id=? WHERE id=?"
            ) ;

        $this->insertStmt = $this->pdo->prepare (
            "INSERT INTO blog ( name ) VALUES ( ? )"
            ) ;
    }

    public function update( $object){

    }
    protected function doCreateObject (array $raw){

    }
    protected function dolnsert ( $object){

    }
    protected function selectStmt(){

    }
    protected function targetclass() {

    } 
}