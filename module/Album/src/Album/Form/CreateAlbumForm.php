<?php

namespace Album\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\FormInterface;

class CreateAlbumForm extends Form
{
    public function init()
    {
        $title = new Element\Text('title');
        $title->setLabel('Title');
        $title->setAttribute('class', 'form-control');
        $this->add($title);
        
        $artist = new Element\Text('artist');
        $artist->setLabel('Artist');
        $artist->setAttribute('class', 'form-control');
        $this->add($artist);
        
        $submit = new Element\Submit('submit');        
        $submit->setAttribute('class', 'btn btn-info');
        $submit->setValue('Create');
        $this->add($submit);

    }

    public function getData($flag = FormInterface::VALUES_AS_ARRAY)
    {
        return parent::getData($flag);
    }
}
