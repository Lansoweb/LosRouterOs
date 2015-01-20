<?php
return [
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
    'controllers' => [
        'invokables' => [
            'LosRouterOs\Controller\Index' => 'LosRouterOs\Controller\IndexController'
        ]
    ],
    'console' => [
        'router' => [
            'routes' => [
                'losrouteros-getactives' => [
                    'options' => [
                        'route' => 'get actives',
                        'defaults' => [
                            '__NAMESPACE__' => 'LosRouterOs\Controller',
                            'controller' => 'Index',
                            'action' => 'get-actives'
                        ]
                    ]
                ]
            ]
        ]
    ],
    'router' => [
        'routes' => [
            'los-router-os' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/losrouteros',
                    'defaults' => [
                        '__NAMESPACE__' => 'LosRouterOs\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/actives',
                            'defaults' => [
                                '__NAMESPACE__' => 'LosRouterOs\Controller',
                                'controller' => 'Index',
                                'action' => 'get-actives'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'LosRouterOs' => __DIR__ . '/../view'
        ]
    ],
    'routeros' => [
    ]
];
