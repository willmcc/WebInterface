<?php
namespace Shipment\Model;

class Shipment
{
    public $CNSShipmentID;
    public $originCustomer;
    public $destinationCustomer;
    public $customerBarcode;
    public $lotID;
    public $tags;
    

    public function exchangeArray($data)
    {
    	print "Origin customer: " . $data['OriginCustomer'] . "<br/>";
    	//var_dump($data);
    	
    	$originCustomer = array(
    		"customerID" => (isset($data['OriginCustomerID'])) ? $data['OriginCustomerID'] : null,
    		"customerName" => (isset($data['OriginCustomer'])) ? $data['OriginCustomer'] : null
    		);
    	
    	
    	
    	$destinationCustomer = array(
    			"customerID" => (isset($data['DestinationCustomerID'])) ? $data['DestinationCustomerID'] : null,
    			"customerName" => (isset($data['DestinationCustomer'])) ? $data['DestinationCustomer'] : null
    	);
    	
        $this->CNSShipmentID     = (isset($data['CNSShipmentID'])) ? $data['CNSShipmentID'] : null;
        $this->originCustomer = $originCustomer;
        $this->destinationCustomer = $destinationCustomer;
        
        $this->customerBarcode  = (isset($data['CustomerBarcode'])) ? $data['CustomerBarcode'] : null;
        $this->lotID  = (isset($data['LotID'])) ? $data['LotID'] : null;
    }
}