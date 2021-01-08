<?php

//fe data hattkhzen fe table el orderdetails w data hattkhzn fe table el orders

session_start();
require_once '../classes/Product.php';
require_once '../classes/Order.php';
require_once '../classes/OrderDetails.php';
require_once '../classes/Category.php';
require_once '../classes/validation/Validator.php';

use Validation\Validator;

//Lma yedos 3la button el Checkout y3ny if form is submitted
if (isset($_POST['submit'])) 
{
    //Getting data from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    //Validation 
    $v = new Validator;
    $v->rules('name', $name, ['required', 'string', 'max:100']);
    $v->rules('email', $email, ['required', 'email']);
    $v->rules('phone', $phone, ['required', 'numeric']);
    $v->rules('address', $address, ['required', 'string']);
    
    $errors = $v->errors;
    // var_dump($errors);
    // die(); //btwa2f el code l7d hena


    //if data is valid 
    if($errors == [])
    {
        //Stored data that in class Order in database
        $data = [
            'customerName' => $name,
            'customerEmail' => $email,
            'customerPhone' => $phone,
            'customerAddress' => $address
        ];
        
        $order = new Order;
        $result1 = $order->store($data);
        // var_dump($result);

        //Delwa2ty 3ayz el orderdetails ytkhzn fel db
        //halef 3la el session of cart ely feha el id 
        foreach ($_SESSION['cart'] as $cartId) 
        {
            $prod = new Product;
            $product = $prod->getOne($cartId);

            $cat = new Category;
            $category = $cat->getOne($product['product_id']);

            $ord = new Order;
            $order = $ord->getOne($email);

            $order_id = $order['order_id'];
            $product_id = $cartId; 
            $priceEach = $product['price'];

            $productData = [
                'order_id' => $order_id,
                'product_id' => $cartId,
                'priceEach' => $priceEach
            ];

            $Orderdetails = new OrderDetails;
            $result2 = $Orderdetails->store($productData);
        }

        //if stored successfully in database
        if ($result1 == true && $result2 == true) 
        {
            header('location: ../index.php');
            session_destroy();
        }
        else
        {
            $_SESSION['errors'] = ['Error storing in database'];
            header('location: ../buyProducts.php');
        }
    }
    else
    {
        $_SESSION['errors'] = $errors;
        header('location: ../buyProducts.php');
    }
    
} 
else 
{
    header('location: ../buyProducts.php');
}


?>