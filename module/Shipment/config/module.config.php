<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Shipment\Controller\Shipment' => 'Shipment\Controller\ShipmentController',
        ),
    ),
		
	// The following section is new and should be added to your file
	'router' => array(
			'routes' => array(
					'shipment' => array(
							'type'    => 'segment',
							'options' => array(
									'route'    => '/shipment[/:action][/:id]',
									'constraints' => array(
											'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'id'     => '[0-9]+',
									),
									'defaults' => array(
											'controller' => 'Shipment\Controller\Shipment',
											'action'     => 'index',
									),
							),
					),
			),
	),
		
		
    'view_manager' => array(
        'template_path_stack' => array(
            'shipment' => __DIR__ . '/../view',
        ),
    ),
);