<?php
namespace Xero\objects;

class Invoice extends XeroObject
{
    
    /* Invoice Types */
    const TYPE_ACCPAY = 'ACCPAY';
    const TYPE_ACCREC = 'ACCREC';
    
    /* LineAmount Types */
    const LINE_AMOUNT_EXCLUSIVE = 'Exclusive';
    const LINE_AMOUNT_INCLUSIVE = 'Inclusive';
    const LINE_AMOUNT_NOTAX = 'NoTax';
    
    /* Invoice Status Codes */
    const STATUS_DRAFT = 'DRAFT';
    const STATUS_SUBMITTED = 'SUBMITTED';
    const STATUS_AUTHORISED = 'AUTHORISED';
    const STATUS_DELETED = 'DELETED';
    const STATUS_PAID = 'PAID';
    const STATUS_VOIDED = 'VOIDED';
    
    public function __construct()
    {
        $this->setRequiredFields(['Type', 'Contact', 'LineItems']);
        $this->setRecommendedFields(['Date', 'DueDate', 'LineAmountTypes']);
        $this->setOptionalFields(['Status', 'Tracking']);
    }
    
    public function addLineItem($item)
    {
        if (!isset($this->required['LineItems']))
            $this->required['LineItems'] = array();
        
        $this->required['LineItems'][] = $item;
    }
    
    public function addTrackingCategory($category)
    {
        if (!isset($this->optional['Tracking']))
            $this->optional['Tracking'] = array();
        
        $this->optional['Tracking'][] = $category;
    }    
}