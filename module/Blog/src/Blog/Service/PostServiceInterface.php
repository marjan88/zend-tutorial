<?php

namespace Blog\Service;

interface PostServiceInterface
{
   public function findAllPosts();
   
   public function findPost($id);
}
