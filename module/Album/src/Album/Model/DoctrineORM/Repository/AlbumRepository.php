<?php

namespace Album\Model\DoctrineORM\Repository;

use Doctrine\ORM\EntityRepository;

class AlbumRepository extends EntityRepository
{

    

    public function findItemById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }

    public function findItemByTitle($title)
    {
        return $this->findOneBy(array('title' => $title));
    }

    public function findItemByArtist($artist)
    {
        return $this->findOneBy(array('artist' => $artist));
    }

    public function saveItem($item)
    {
        
        $this->getEntityManager()->persist($item);
        $this->getEntityManager()->flush($item);



        return $item;
    }

    public function createItem()
    {
        $itemClass = $this->getEntityName();

        return new $itemClass;
    }

    public function deleteItem($item)
    {
        if ($item) {
           
            $this->getEntityManager()->remove($item);
            $this->getEntityManager()->flush($item);

            return true;
        }

        return false;
    }

}
