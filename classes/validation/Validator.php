<?php

namespace validation;

require_once 'ValidationInterface.php';
require_once 'Email.php';
require_once 'Max.php';
require_once 'Numeric.php';
require_once 'Required.php';
require_once 'Str.php';
require_once 'RequiredImage.php';
require_once 'Image.php';


class Validator
{
    public $errors = [];

    //btnady 3la function el validate mn ay classes mnhom w bb3tlha object mn ay class b2eny akhleha tenady 3la el interface nafso
    private function makeValidation(ValidationInterface $v)
    {
        return $v->validate();
    }

    //el function dy badeha esm el field w el value ely gowah w array feha asamy el rules ely m7tagha w hia hatlf 3la el rules wa7da wa7da w hatstd3y fun. el makeValidation w tenafez el validation
    public function rules($name, $value, array $rules)
    {
        foreach ($rules as $rule) 
        {
            if ($rule == 'required') 
            {
                $error = $this->makeValidation(new Required($name, $value));
            }
            else if ($rule == 'string') 
            {
                $error = $this->makeValidation(new Str($name, $value));
            }
            else if ($rule == 'email') 
            {
                $error = $this->makeValidation(new Email($name, $value));
            }
            else if ($rule == 'max:100') 
            {
                $error = $this->makeValidation(new Max($name, $value));
            } 
            else if ($rule == 'numeric') 
            {
                $error = $this->makeValidation(new Numeric($name, $value));
            }
            else if ($rule == 'required-image') 
            {
                $error = $this->makeValidation(new RequiredImage($name, $value));
            }
            else if ($rule == 'image') 
            {
                $error = $this->makeValidation(new Image($name, $value));
            } 
            else
            {
                $error = '';
            }
            
            //Lw fe errors e3mlhom push fe array el errors
            if ($error !== '') 
            {
                array_push($this->errors, $error);
            }
        }
    }
}

?>