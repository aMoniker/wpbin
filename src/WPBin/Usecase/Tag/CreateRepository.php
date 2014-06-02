<?php

namespace WPBin\Usecase\Tag;

interface CreateRepository
{
    public function hasName($name);
    public function hasUrl($url);
    public function create($name, $url);
}