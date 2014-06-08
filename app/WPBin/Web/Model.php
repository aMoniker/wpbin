<?php

namespace WPBin\Web;

use Eloquent;

class Model extends Eloquent
{
    protected $_model_to_entity_map = [
        'created_at' => 'created',
        'updated_at' => 'updated',
    ];

    public function toEntityArray()
    {
        $array = $this->toArray();

        foreach ($this->_model_to_entity_map as $model_key => $entity_key) {
            if (isset($array[$model_key])) {
                $array[$entity_key] = $array[$model_key];
                unset($array[$model_key]);
            }
        }

        return $array;
    }
}