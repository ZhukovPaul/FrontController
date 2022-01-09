<?

namespace domain;

use DomainObject;

class ProductDomain implements \DomainObject
{
    private $id,
            $name="",
            $href="";

    public function __construct($props)
    {
        $this->id =$props["id"];
        $this->name = $props["name"];
        $this->href = $props["href"];
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($value)
    {
        $this->href = $value;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($value)
    {
        $this->name = $value;
    }
 
}