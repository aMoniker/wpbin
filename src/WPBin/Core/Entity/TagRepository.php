<?php

namespace WPBin\Core\Entity;

interface TagRepository
{
    /**
     * @param  int $id
     * @return \WPBin\Core\Entity\Tag
     */
    public function get($id);

    /**
     * @param string $name
     * @return \WPBin\Core\Entity\Tag
     */
    public function getByName($name);
}