<?php

namespace WPBin\Core\Traits\Entity;

trait Timestamps
{
    protected $created;
    protected $updated;

    protected function get_created($date_format)
    {
        return $this->maybeDateFormat($this->created, $date_format);
    }

    protected function get_updated($date_format)
    {
        return $this->maybeDateFormat($this->updated, $date_format);
    }

    protected function maybeDateFormat($date, $format)
    {
        return ($format ? date($format, $date) : $date);
    }
}