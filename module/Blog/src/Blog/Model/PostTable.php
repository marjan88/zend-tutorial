<?php

namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;
use Blog\Model\PostInterface;
use Blog\Model\Post;
use Zend\Db\Sql\Select;

class PostTable 
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select(function(Select $select){
            $select->order('title DESC');
        });

        return $resultSet;
    }

    public function getPost($id)
    {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
        $row       = $resultSet->current();

        if (!$row) {
            throw new \Exception('There is no post with this id');
        }

        return $row;
    }

    public function savePost(Post $post)
    {
        $data = array(
            'title' => $post->title,
            'text'  => $post->text,
        );
        $id   = (int) $id;

        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getPost($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Post with this ID does not exist');
            }
        }
    }

    public function deletePost($id)
    {
        $resultSet = $this->tableGateway->delete(array('id' => (int) $id));
        return $resultSet;
    }

}
