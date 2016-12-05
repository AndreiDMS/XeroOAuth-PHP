<?php
namespace Xero\endpoints;

class Invoices extends Endpoint
{
    public function __construct($apiInstance)
    {
        parent::__construct($apiInstance);
        
        self::$url = 'Invoices';
        
        $this->data = array('Invoices' => array());
    }
    
    public function resetData()
    {
        $this->data['Invoices'] = array();
    }
    
    /**
     * 
     * @param Invoice $invoice
     */
    public function addInvoice($invoice)
    {
        $this->data['Invoices'][] = $invoice;
    }
    
    /**
     * Sends invoices to Xero.
     * 
     * @return Xero reply
     */
    public function sendInvoices()
    {
        $response = $this->apiInstance->request('POST', $this->apiInstance->url(self::$url), array(), json_encode($this));
        
        return $this->validateResponse();
    }
    
    /**
     * Get a list of invoices or a single invoice if $invoiceId is provided.
     * 
     * @param unknown $invoiceId
     * @param unknown $order
     * @param unknown $where
     * @param number $page
     */
    public function getInvoices($invoiceId = null, $order = null, $where = null, $page = 1)
    {
        $params = array(
            'order' => $order,
            'page' => $page,
            'Where' => $where
        );
        
        $url = ($invoiceId) ? self::$url.'/'.$invoiceId : self::$url;
        $response = $apiInstance->request('GET', $apiInstance->url($url), $params);
        
        return $this->validateResponse();
    }
}