<?php
return array(
    'service_manager' => [
        'factories' => [
            'LosRouterOs\Options\ModuleOptions' => 'LosRouterOs\Options\ModuleOptionsFactory',
            'LosRouterOs\Entity\Client' => 'LosRouterOs\Entity\ClientFactory'
        ],
        'aliases' => [
            'losrouteros.options' => 'LosRouterOs\Options\ModuleOptions',
            'losrouteros.client' => 'LosRouterOs\Entity\Client'
        ]
    ],
    'controllers' => array(
        'invokables' => array(
            'LosRouterOs\Controller\Index' => 'LosRouterOs\Controller\IndexController'
        )
    ),
    'console' => [
        'router' => array(
            'routes' => array(
                'losrouteros-getactives' => array(
                    'options' => array(
                        'route' => 'get actives',
                        'defaults' => array(
                            '__NAMESPACE__' => 'LosRouterOs\Controller',
                            'controller' => 'Index',
                            'action' => 'get-actives'
                        )
                    )
                )
            )
        )
    ],
    'router' => array(
        'routes' => array(
            'los-router-os' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/losrouteros',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LosRouterOs\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/actives',
                            'defaults' => array(
                                '__NAMESPACE__' => 'LosRouterOs\Controller',
                                'controller' => 'Index',
                                'action' => 'get-actives'
                            )
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'LosRouterOs' => __DIR__ . '/../view'
        )
    ),
    'routeros' => [
    ]
);
