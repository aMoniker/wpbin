<?php

namespace WPBin\Web;

abstract class Repository
{
    protected $entity;

    protected function entityFromModel($model) {
        $entity = new $this->entity;

        // any properties that don't map directly
        $model_to_entity_map = array(
            'created_at' => 'created',
            'updated_at' => 'updated',
        );

        $model_attributes = $model->toArray();

        foreach ($model_attributes as $model_key => $model_val) {
            $entity_key = isset($model_to_entity_map[$model_key])
                        ? $model_to_entity_map[$model_key]
                        : $model_key
                        ;

            if (property_exists($entity, $entity_key)) {
                $entity->$entity_key = $model_val;
            }
        }

        return $entity;
    }
}
