<?php

namespace Album\Model;

interface AlbumInterface
{

    public function getId();

    public function getTitle();

    public function setTitle($title);

    public function getArtist();

    public function setArtist($artist);
}
