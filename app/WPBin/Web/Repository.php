<?php

namespace WPBin\Web;

abstract class Repository
{
    protected $entity;

    protected function entityFromModel($model)
    {
        return \App::make($this->entity, [$model->toEntityArray()]);
    }
}