<?php

namespace Blog\Model;

interface PostInterface
{

    public function fetchAll();

    public function getPost();

    public function savePost();

    public function deletePost();
}
