<?php
namespace Shipment\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ShipmentController extends AbstractActionController
{
	protected $shipmentTable;
	
	public function indexAction()
	{
        return new ViewModel(array(
            'shipments' => $this->getShipmentTable()->fetchAll(),
        ));
    }

	public function addAction()
	{
	}

	public function editAction()
	{
	}

	public function deleteAction()
	{
	}
	
	// module/Shipment/src/Shipment/Controller/ShipmentController.php:
	public function getShipmentTable()
	{
		if (!$this->shipmentTable) {
			$sm = $this->getServiceLocator();
			$this->shipmentTable = $sm->get('Shipment\Model\ShipmentTable');
		}
		return $this->shipmentTable;
	}
}