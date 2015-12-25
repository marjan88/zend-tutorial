<?php

namespace Blog\Service;
use Blog\Model\Post;
use Blog\Service\PostServiceInterface;

class PostService implements PostServiceInterface
{

   
    public function findAllPosts()
    {
       

        return $allPosts;
    }

    public function findPost($id)
    {
        $postData = $this->data[$id];

        $model = new Post();
        $model->setId($postData['id']);
        $model->setTitle($postData['title']);
        $model->setText($postData['text']);

        return $model;
    }

}
