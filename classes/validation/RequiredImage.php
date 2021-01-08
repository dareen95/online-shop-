<?php

namespace validation;

require_once 'ValidationInterface.php';


class RequiredImage implements ValidationInterface 
{
    private $name;
    private $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function validate()
    {
        //Lw el name ely gowa el value mwgod
        if (strlen($this->value['name']) == 0) 
        {
            return "$this->name is required";
        }
        return '';
    }
}

?>