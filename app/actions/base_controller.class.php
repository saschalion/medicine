<?php

class base_controller
{
    function __autoload($classname)
    {
        return require_once($_SERVER['DOCUMENT_ROOT'] . '/app/models/' . $classname . '.class.php');
    }
}
