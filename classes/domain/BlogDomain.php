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
            $views,
            $time_create="",
            $productId;

    public function __construct($props)
    {
        $this->id =$props["id"];
        $this->href = $props["href"];
        $this->title = $props["title"];
        $this->body = $props["body"];
        $this->description = $props["description"];
        $this->product = $props["product"];
        $this->views = $props["views"];
        $this->time_create = $props["time_create"];
        $this->productId = $props["product_id"];
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

    public function setProductId($value)
    {
        $this->productId = $value;
    } 
    
    public function getProductId()
    {
        return $this->productId;
    }

    public function setViews($value)
    {
        $this->views = $value;
    }
}