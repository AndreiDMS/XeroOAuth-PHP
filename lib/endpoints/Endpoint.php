<?php
namespace Xero\endpoints;

class Endpoint implements \JsonSerializable
{
    protected static $url = '';
    
    protected $data = array();
    
    protected $apiInstance = null;
    
    public function __construct($apiInstance)
    {
        $this->apiInstance = $apiInstance;
    }
    
    public function jsonSerialize()
    {
        return $this->data;
    }
    
    protected function validateResponse()
    {
        if ($this->apiInstance->response['code'] == 200){
            return $this->apiInstance->parseResponse($this->apiInstance->response['response'], $this->apiInstance->response['format']);
        }
        else
        {
            return null;
        }
    }
    
    public function getError()
    {
        return 'Errors: ' . $this->apiInstance->response['response'] . PHP_EOL;
    }
}