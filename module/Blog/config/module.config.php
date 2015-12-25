<?php

return array(
    'controllers'     => array(
//        'invokables' => array(
//            'Blog\Controller\List' => 'Blog\Controller\ListController'
//        ),
        'factories' => array(
            'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
        )
    ),
    // This lines opens the configuration for the RouteManager
    'router'          => array(
        // Open configuration for all possible routes
        'routes' => array(
            // Define a new route called "post"
            'post' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type'          => 'literal',
                // Configure the route itself
                'options'       => array(
                    // Listen to "/blog" as uri
                    'route'    => '/blog',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Blog\Controller\List',
                        'action'     => 'index',
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/:id',
                            'defaults'    => array(
                                'action' => 'detail'
                            ),
                            'constraints' => array(
                                'id' => '[1-9]\d*'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes'  => array(
                            'wildcard'  => array(
                                'type'    => 'Wildcard',
                            ),                    
                        ),
                    ),
                    'slash'  => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route' => '/',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
        )
    ),
    'view_manager'    => array(
        'template_path_stack' => array(
            'blog' => __DIR__ . '/../view',
        ),
    ),
);