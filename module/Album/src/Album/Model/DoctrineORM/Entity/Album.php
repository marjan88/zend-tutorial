<?php

namespace Album\Model\DoctrineORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use Album\Model\AlbumInterface;

/**
 * A music album.
 *
 * @ORM\Entity(repositoryClass="Album\Model\DoctrineORM\Repository\AlbumRepository")
 * @ORM\Table(name="album")
 * @property string $artist
 * @property string $title
 * @property int $id
 */
class Album implements AlbumInterface
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(type="string", name="artist") */
    protected $artist;

    /** @ORM\Column(type="string", name="title")  */
    protected $title;
  

    public function getId()
    {
        return $this->id;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }



}
