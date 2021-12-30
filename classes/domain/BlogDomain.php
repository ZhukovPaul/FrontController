<?

namespace domain;

use DomainObject;

class BlogDomain implements \DomainObject
{
    private  $id,
            $href="",
            $title="",
            $body="",
            $description="",
            $product="",
            $views="",
            $time_create="";

    public function __construct($id,$href,$title,$body,$description,$product,$views,$time_create)
    {
        $this->id =$id;
        $this->href = $href;
        $this->title = $title;
        $this->body = $body;
        $this->description = $description;
        $this->product = $product;
        $this->views = $views;
        $this->time_create = $time_create;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($value)
    {
        $this->href = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($value)
    {
        $this->body = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($value)
    {
        $this->product = $value;
    }

    public function getTimeСreate()
    {
        return $this->time_create;
    }   

    public function setTimeСreate($value)
    {
        $this->time_create = $value;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function setViews($value)
    {
        $this->views = $value;
    }
}