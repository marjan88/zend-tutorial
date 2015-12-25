<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;

class AlbumController extends AbstractActionController
{

    /**
     * @var DoctrineORMEntityManager
     */
    protected $em;
    protected $albumRepo;
    protected $form;

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    public function indexAction()
    {
        $repo = $this->getEntityManager()->getRepository('Album\Model\DoctrineORM\Entity\Album');

        return new ViewModel(array(
            'albums' => $repo->findAll(),
        ));
    }

    public function addAction()
    {
        $form = $this->getForm();
        $repo = $this->getServiceLocator()->get('Album\Model\AlbumRepository');
      
        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($this->isValid($form)) {
                $data = $form->getData();
                $item = $repo->createItem();

                $this->assignData($item, $data);
                $repo->saveItem($item);
//                $this->postSave($item, $data);

                $this->flashMessenger()->setNamespace('success')->addMessage('Item saved');

                return $this->redirect()->toRoute($this->route);
            }
        }

        $viewModel = new ViewModel();
        $viewModel->setVariables(array(
            'form' => $form,
        ));

        return $viewModel;
    }

    public function editAction()
    {
        
    }

    public function deleteAction()
    {
        
    }

    public function getForm()
    {
        if (!$this->form) {
            $this->form = $this->getServiceLocator()->get('Album\Form\CreateAlbumForm');
        }

        return $this->form;
    }

    protected function assignData($item, $data)
    {
        $item->setTitle($data['title']);
        $item->setArtist($data['artist']);

        return $item;
    }

    protected function isValid($form, $item = null)
    {
        $formIsValid = $form->isValid();
        $data        = $form->getData();
        $isValid     = true;

        return $formIsValid && $isValid;
    }

}
