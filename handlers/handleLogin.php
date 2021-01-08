<?php

session_start();
require_once '../classes/Admin.php';
require_once '../classes/validation/Validator.php';

use Validation\Validator;

//Lw hwa das 3la zorar el submit y3ny if form is submitted
if (isset($_POST['submit'])) 
{
    //read data from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Validation 
    $v = new Validator;
    $v->rules('email', $email, ['required', 'email', 'max:100']);
    $v->rules('password', $password, ['required', 'string']);
    $errors = $v->errors;


    //if data is valid 
    if($errors == [])
    {
        $admin = new Admin;
        $result = $admin->attempt($email, sha1($password));
 
        //if stored successfully in database
        if ($result !== null) 
        {
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            header('location: ../index.php');
        }
        else
        {
            $_SESSION['errors'] = ['your credentials are not correct'];
            header('location: ../login.php');
        }
    }
    else
    {
        $_SESSION['errors'] = $errors;
        header('location: ../login.php');
    }
    
} 
else 
{
    header('location: ../login.php');
}


?>