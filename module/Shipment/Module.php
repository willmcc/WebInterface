<?php
namespace Shipment;

// Add these import statements:
use Shipment\Model\Shipment;
use Shipment\Model\ShipmentTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Shipment\Model\ShipmentTable' =>  function($sm) {
    						$tableGateway = $sm->get('ShipmentTableGateway');
    						$table = new ShipmentTable($tableGateway);
    						return $table;
    					},
    					'ShipmentTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Shipment());
    						return new TableGateway('v_shipments', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }
}