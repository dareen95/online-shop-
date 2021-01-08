<?php

session_start();
require_once '../classes/Category.php';
require_once '../classes/validation/Validator.php';

use Validation\Validator;

//Lw mafesh session id rag3o ll login w mtkmlsh el code
if (!isset($_SESSION['id'])) 
{
    header('location: ../login.php');
    die();
}

//Lw hwa das 3la zorar el submit y3ny if form is submitted
if (isset($_POST['submit'])) 
{
    //getting data from form
    $category = $_POST['category'];

    //Validation 
    $v = new Validator;
    $v->rules('category', $category, ['required', 'string', 'max:100']);
    
    $errors = $v->errors;
    // var_dump($errors);
    // die(); //btwa2f el code l7d hena


    //if data is valid 
    if($errors == [])
    {
        //store data in database
        $data = [
            'type' => $category
        ];
        
        $categoryObject = new Category;
        $result = $categoryObject->store($data);
        // var_dump($result);

        //if stored successfully in database
        if ($result == true) 
        {
            header('location: ../index.php');
        }
        else
        {
            $_SESSION['errors'] = ['error storing in database'];
            header('location: ../addCategory.php');
        }
    }
    else
    {
        $_SESSION['errors'] = $errors;
        header('location: ../addCategory.php');
    }
    
} 
else 
{
    header('location: ../addCategory.php');
}


?>