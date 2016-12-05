<?php
namespace Xero\objects;

class LineItem extends XeroObject
{
    
    public function __construct()
    {
        $this->setRequiredFields(['Description']);
        $this->setRecommendedFields(['Quantity', 'UnitAmount', 'ItemCode', 'AccountCode']);
        $this->setOptionalFields(['TaxType', 'TaxAmount', 'LineAmount', 'Tracking', 'DiscountRate']);
    }
}