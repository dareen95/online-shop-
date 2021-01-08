<?php
session_start();
require_once 'inc/header.php';
require_once 'classes/Product.php';
require_once 'classes/Order.php';
require_once 'classes/OrderDetails.php';

$ord = new Order;
$orders = $ord->getAll();

$ordDet = new OrderDetails;
$prod = new Product;


?>

<div class="container mt-5">
    <div class="row">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Phone</th>
                    <th>Customer Address</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                </tr>
            </thead>

            <?php 
            foreach ($orders as $order) 
            {
                //ha create fel foreach 3shan m3 kol lfa 3la el order hamsek id kol order w ageb el details beta3o

                // El orderdetails howa el waset ma ben el order wel product 3shan feh el order_id ely mwgod fel order wel product_id ely mwgod fel product
                // fa ha3ml object mn class el orderDetails 3shan a3raf arbot ben el order wel product
                $orderDetails = $ordDet->getOne($order['order_id']);
                
                $product = $prod->getOne($orderDetails['product_id']);

            ?>        
            <tbody>
                <tr>
                    <td><?php echo $order['customerName']; ?></td>
                    <td><?php echo $order['customerEmail']; ?></td>
                    <td><?php echo $order['customerPhone']; ?></td>
                    <td><?php echo $order['customerAddress']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</div>


<?php include 'inc/footer.php'; ?>