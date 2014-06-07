<?php

namespace WPBin\Core\Usecase\Paste;

interface CreateRepository
{
    public function hasContent($content);
    public function create($title, $content, $parent_id, $user_id);
}