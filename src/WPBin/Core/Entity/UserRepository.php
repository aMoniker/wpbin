<?php

namespace WPBin\Core\Entity;

interface UserRepository
{
    /**
     * @param  int $id
     * @return \WPBin\Core\Entity\User
     */
    public function get($id);

    /**
     * @param string $username
     * @return \WPBin\Core\Entity\User
     */
    public function getByHash($username);

    /**
     * @param string $email
     * @return \WPBin\Core\Entity\User
     */
    public function getByEmail($email);
}