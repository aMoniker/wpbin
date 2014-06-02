<?php

namespace WPBin\Traits;

trait ArrayExchange
{
    /**
     * @param  array  $data  initial value
     * @return void
     */
    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * @param  array  $data  new values
     * @return $this
     */
    public function setData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return get_object_vars($this);
    }

}