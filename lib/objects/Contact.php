<?php
namespace Xero\objects;

class Contact extends XeroObject
{
    
    public function __construct()
    {
        $this->setRequiredFields(['Name']);
        $this->setOptionalFields(['ContactID', 'ContactNumber', 'AccountNumber', 'ContactStatus', 'FirstName', 'LastName', 'EmailAddress']);
    }
}