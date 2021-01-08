<?php

namespace validation;

require_once 'ValidationInterface.php';


class Image implements ValidationInterface 
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
        $types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        //hashof el image ely etrf3t mn el 4 dol wla la, w lw maknsh el value type gowa array el types 
        if (strlen($this->value['name']) > 0 && !in_array($this->value['type'], $types)) 
        {
            return "$this->name must be an image";
        }
        return '';
    }
}

?>