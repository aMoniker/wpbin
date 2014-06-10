<?php

namespace WPBin\Web;

use Illuminate\Database\Eloquent\Collection;

abstract class Repository
{
    protected $entity;

    protected function entityFromModel($model)
    {
        if (!$model) { return null; }
        return \App::make($this->entity, [$model->toEntityArray()]);
    }

    protected function entitiesFromCollection(Collection $collection)
    {
        if (!$collection) { return null; }

        $self = $this;
        return array_filter(array_map(function($model) use ($self) {
            return $self->entityFromModel($model);
        }, $collection->all()));
    }
}