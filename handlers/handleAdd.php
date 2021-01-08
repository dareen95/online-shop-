<?php

/*
if (from form)
{
    //read data
    //validation >> class
    if (valid)
    {
        //prepare data
        //store in database
        if (stored)
        {
            //upload image
            //success
        }
        else
        {
            redirect with errors
        }
    }
    else
    {
        redirect with errors
    }
}
else
{
    redirect 
}
*/
session_start();
require_once '../classes/Product.php';
require_once '../classes/helpers/Image.php';
require_once '../classes/validation/Validator.php';

use herpers\Image;
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
    //read data from form
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $img = $_FILES['img'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];


    //Validation 
    $v = new Validator;
    $v->rules('name', $name, ['required', 'string', 'max:100']);
    $v->rules('desc', $desc, ['required', 'string']);
    $v->rules('price', $price, ['required', 'numeric']);
    $v->rules('img', $img, ['required-image', 'image']);
    $v->rules('quantity', $quantity, ['required', 'numeric']);
    $v->rules('category_id', $category_id, ['required', 'numeric']);
    
    $errors = $v->errors;
    // var_dump($errors);
    // die(); //btwa2f el code l7d hena


    //if data is valid 
    if($errors == [])
    {
        $image = new Image($img);
        //store in db
        $data = [
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'img' => $image->new_name,
            'quantity' => $quantity,
            'category_id' => $category_id
        ];
        
        $prod = new Product;
        $result = $prod->store($data);
        // var_dump($result);

        //if stored successfully in database
        if ($result == true) 
        {
            //upload image in folder images
            $image->upload();

            header('location: ../index.php');
        }
        else
        {
            $_SESSION['errors'] = ['error storing in database'];
            header('location: ../add.php');
        }
    }
    else
    {
        $_SESSION['errors'] = $errors;
        header('location: ../add.php');
    }
    
} 
else 
{
    header('location: ../add.php');
}


?>