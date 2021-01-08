<?php

session_start();
require_once 'classes/Product.php';

require_once 'classes/helpers/Str.php';
use herpers\Str;
$prod = new Product;

$products = $prod->getAll();
?>

<?php include 'inc/header.php'; ?>
    
<div class="container my-5">
    <div class="row">
        <?php if ($products !== []) { ?>
            <?php foreach ($products as $product) { ?>
                <div class="col-lg-4">
                    <div class="card mb-5">
                        <img src="images/<?php echo $product['img']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="text-muted">Price: <?php echo $product['price']; ?> EGP</p>
                            <p class="card-text"><span class="font-weight-bold">Description:</span> <?php echo Str::limit($product['desc']); ?></p>
                            <a href="showProduct.php?id=<?php echo $product['product_id']; ?>" class="btn btn-primary">Show</a>
                            <?php if (isset($_SESSION['id'])) { ?>
                                <a href="edit.php?id=<?php echo $product['product_id']; ?>" class="btn btn-info">Edit</a>
                                <a href="handlers/handleDelete.php?id=<?php echo $product['product_id']; ?>" class="btn btn-danger">Delete</a>
                            <?php } ?> 
                        </div>
                    </div> 
                </div>
            <?php } ?>
        <?php } else { ?>
            <P>No Products Found</P>
        <?php } ?>

    </div>
</div>






<?php include 'inc/footer.php'; ?>