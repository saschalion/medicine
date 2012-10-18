<?php

class base_model
{
    public $last_name;
    public $first_name;

    function escape($value)
    {
        $record = mysql_real_escape_string($value);

        return $record;
    }

    function query($value)
    {
        $sql = mysql_query($value);

        return $sql;
    }

    function get_last_name()
    {
       return $this->last_name;
    }

    function get_first_name()
    {
        return $this->first_name;
    }

    function get_age()
    {
        return $this->age;
    }

    function set_age($val)
    {
        $val = intval($val);

        if($val >= 18 && $val <=65) {

            $this->age = $val;

            return true;
        }
        else {
            return false;
        }
    }

    private $age;
}
