<?php
namespace Xero\objects;

class XeroObject implements \JsonSerializable
{
    /* Required */
    private $required_fields = array();
    
    /* Recomended */
    private $recommended_fields = array();
    
    /* Optional */
    private $optional_fields = array();
    
    protected $required = array();
    protected $recommended = array();
    protected $optional = array();
    
    protected function setRequiredFields($data)
    {
        $this->required_fields = $data;
    }
    
    protected function setRecommendedFields($data)
    {
        $this->recommended_fields = $data;
    }
    
    protected function setOptionalFields($data)
    {
        $this->optional_fields = $data;
    }
    
    public function __set($name, $value)
    {
        if (in_array($name, $this->required_fields))
        {
            $this->required[$name] = $value;
        }
        else if (in_array($name, $this->recommended_fields))
        {
            $this->recommended[$name] = $value;
        }
        else
        {
            $this->optional[$name] = $value;
        }
    }
    
    public function jsonSerialize()
    {
        return array_merge($this->required, $this->recommended, $this->optional);
    }
}