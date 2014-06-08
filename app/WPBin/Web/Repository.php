<?php

namespace WPBin\Web;

abstract class Repository
{
    protected $entity;

    protected function entityFromModel($model)
    {
        if (!$model) { return null; }
        return \App::make($this->entity, [$model->toEntityArray()]);
    }
}