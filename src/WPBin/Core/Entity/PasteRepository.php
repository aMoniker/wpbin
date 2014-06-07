<?php

namespace WPBin\Core\Entity;

interface PasteRepository
{
    /**
     * @param  int $id
     * @return \WPBin\Core\Entity\Paste
     */
    public function get($id);

    /**
     * @param int $parent_id
     * @return \WPBin\Core\Entity\Paste
     */
    public function getByParentID($parent_id);

    /**
     * @param int $user_id
     * @return \WPBin\Core\Entity\Paste
     */
    public function getByUserID($user_id);

    /**
     * @param string $hash
     * @return \WPBin\Core\Entity\Paste
     */
    public function getByHash($hash);
}