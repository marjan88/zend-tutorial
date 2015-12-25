<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Service\PostServiceInterface;

class ListController extends AbstractActionController
{

    protected $postService;
    protected $postTable;

    public function __construct(PostServiceInterface $postService)
    {
        return $this->postService = $postService;
    }

    public function indexAction()
    {
        $posts = $this->getPostTable();

        $viewModel = new ViewModel(array(
            'posts' => $posts->fetchAll(),
        ));

        return $viewModel;
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id');
        try {
            $post = $this->getPostTable()->getPost($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('post');
        }

        return array('post' => $post);
    }

    public function getPostTable()
    {
        if (!$this->postTable) {
            $postTableGateway = $this->getServiceLocator()->get('Blog\Model\PostTable');
            $this->postTable  = $postTableGateway;
        }

        return $this->postTable;
    }

}
