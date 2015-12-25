<?php

namespace Album\Model\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class AlbumRepositoryFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');


        $entityManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
        $service       = $entityManager->getRepository('Album\Model\DoctrineORM\Entity\Album');


        return $service;
    }

}
