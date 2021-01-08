<?php 

session_start();
require_once '../classes/Product.php';

//Lw mafesh session id rag3o ll login w mtkmlsh el code
if (!isset($_SESSION['id'])) 
{
    header('location: ../login.php');
    die();
}

$id = $_GET['id'];

$prod = new Product;

//abl ma tms7 hatgeb esm el sora w hatms7o mn el folder b function esmha unlink() betakhod path el sora
$product = $prod->getOne($id);
$img = $product['img'];
unlink('../images/' . $img);


$result = $prod->delete($id);


header('location: ../index.php');

// if ($result == true) 
// {
    
// }

?>