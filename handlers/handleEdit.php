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
    //read the id
    $id = $_GET['id'];
    

    //read data from form
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    // $img = $_FILES['img'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];


    //Validation 
    $v = new Validator();
    $v->rules('name', $name, ['required', 'string', 'max:100']);
    $v->rules('desc', $desc, ['required', 'string']);
    $v->rules('price', $price, ['required', 'numeric']);
    $v->rules('quantity', $quantity, ['required', 'numeric']);
    $v->rules('category_id', $category_id, ['required', 'numeric']);
    $errors = $v->errors;


    //if data is valid 
    if($errors == [])
    {
        //update in db
        $data = [
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            // 'img' => 'any.jpg',
            'quantity' => $quantity,
            'category_id' => $category_id
        ];
        // var_dump($data);
        // die();

        $prod = new Product;
        $result = $prod->update($id, $data);
        

        //if stored successfully
        if ($result == true) 
        {
            header('location: ../showProduct.php?id='. $id);
        }
        else
        {
            $_SESSION['errors'] = ['error updating in database'];
            header('location: ../edit.php?id='. $id);
        }
    }
    else
    {
        $_SESSION['errors'] = $errors;
        header('location: ../edit.php?id='. $id);
    }
    
} 
else 
{
    header('location: ../index.php');
}


?>