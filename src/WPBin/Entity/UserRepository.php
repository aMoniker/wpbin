<?php

namespace WPBin\Entity;

interface UserRepository
{
    /**
     * @param  int $id
     * @return \WPBin\Entity\User
     */
    public function get($id);

    /**
     * @param string $username
     * @return \WPBin\Entity\User
     */
    public function getByHash($username);

    /**
     * @param string $email
     * @return \WPBin\Entity\User
     */
    public function getByEmail($email);
}