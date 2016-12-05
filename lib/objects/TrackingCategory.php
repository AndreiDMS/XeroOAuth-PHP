<?php
namespace Xero\objects;

class TrackingCategory extends XeroObject
{
    
    public function __construct()
    {
        $this->setRecommendedFields(['TrackingCategoryID', 'Name', 'Status', 'Options']);
    }
}