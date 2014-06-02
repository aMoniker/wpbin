<?php

namespace WPBin\Entity;

interface TagRepository
{
    /**
     * @param  int $id
     * @return \WPBin\Entity\Tag
     */
    public function get($id);

    /**
     * @param string $name
     * @return \WPBin\Entity\Tag
     */
    public function getByName($name);
}