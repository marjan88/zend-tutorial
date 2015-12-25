<?php

namespace Blog\Model;

//use Blog\Model\PostInterface;

class Post
{

    public $id, $text, $title;

    function exchangeArray($data)
    {
        $this->id    = (!empty($data['id'])) ? $data['id'] : null;
        $this->text  = (isset($data['text'])) ? $data['text'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
    }

}
