<?php

namespace Album;

return array(
    'controllers'     => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ),
    ),
    'router'          => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/album[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults'    => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories'  => array(
            'Album\Form\CreateAlbumForm' => 'Album\Form\CreateAlbumFormFactory',
            'Album\Model\AlbumRepository' => 'Album\Model\Factory\AlbumRepositoryFactory',
        ),
        'invokables' => array(
        )
    ),
    'view_manager'    => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
    'view_helpers'    => array(
        'invokables' => array(
            'FormElementErrors' => 'Album\Helper\FormElementErrors',
            ),
    ),
    // Doctrine config
    'doctrine'        => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Model/DoctrineORM/Entity/')
            ),
            'orm_default'             => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Model\DoctrineORM\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);
