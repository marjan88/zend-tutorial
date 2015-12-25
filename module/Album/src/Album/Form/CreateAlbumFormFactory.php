<?php

namespace Album\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Album\Form\CreateAlbumForm;
use Album\Form\CreateAlbumFormInputFilter;

class CreateAlbumFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new CreateAlbumForm();
        $service->setInputFilter(new CreateAlbumFormInputFilter());
        $service->init();

        return $service;
    }

}
