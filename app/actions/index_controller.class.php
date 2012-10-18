<?php

class index_controller extends base_controller
{
    function get_patients()
    {
        $sql = query("select * from patients");

        while($record[] = mysql_fetch_assoc($sql));

        return $record;
    }
}

$obj = new index_controller();

$record = $obj->get_patients();