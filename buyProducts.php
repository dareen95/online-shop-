<?php
session_start();
require_once 'inc/header.php';
require_once 'classes/Product.php';
require_once 'classes/Category.php';

?>

<div class="container mt-5">
    <div class="row">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                </tr>
            </thead>

            <?php if (isset($_SESSION['cart'])) 
            {
                foreach ($_SESSION['cart'] as $cartId) 
                {
                    $prod = new Product;
                    $product = $prod->getOne($cartId);
                        
                    $cat = new Category;
                    $category = $cat->getOne($product['category_id']); ?>

                    <tbody>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['desc']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><img src="images/<?php echo $product['img']; ?>" class="img-fluid"></td>
                            <td><?php echo $category['type']; ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

            <?php if (isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['errors'] as $error) { ?>
                        <p class="text-center mb-0"><?php echo $error; ?></p>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php unset($_SESSION['errors']); ?>

            <form action="handlers/handleOrder.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Full Name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Phone" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Shipping Address" name="address" class="form-control">
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="submit" value="Checkout" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>