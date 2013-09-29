<?php
namespace Shipment\Model;

use Zend\Db\TableGateway\TableGateway;

class ShipmentTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getShipment($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('CNSShipmentID' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveShipment(Shipment $shipment)
    {
        $data = array(
            'OriginCustomerID' => $shipment->originCustomer->customerID,
            'DestinationCustomerID'  => $shipment->destinationCustomer->customerID,
        	'CustomerBarcode' => $shipment->customerBarcode,
        	'LotID' => $shipment->lotID
        );

        $id = (int)$shipment->CNSShipmentID;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getShipment($id)) {
                $this->tableGateway->update($data, array('CNSShipmentID' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteShipment($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}