<?php
session_start();
require_once 'classes/Product.php';
require_once 'classes/Category.php';

$id = $_GET['id'];

//Hakhod el id hakhzemo fe session esmha prodId
$_SESSION['prodId']=$id;

//Lw msh mwgod el session of cart e3ml array fady
if (!isset($_SESSION['cart'])) 
{
    $_SESSION['cart']=[];
}

//Lma tedos 3la el Add To Cart 
if (isset($_POST['cart']))
{
    //Khazen fe array el session of cart el session of prodId y3ny 3aml push ll id fe session of cart
    array_push($_SESSION['cart'], $_SESSION['prodId']);
}


$prod = new Product;
$product = $prod->getOne($id);

$cat = new Category;
$category = $cat->getOne($product['category_id']);

?>

<?php include 'inc/header.php'; ?>
    
<div class="container my-5">
    <div class="row">
        
        <?php if ($product !== null) { ?>
            <div class="col-lg-6">
                <img src="images/<?php echo $product['img']; ?>" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <h5 class="card-title mt-2"><?php echo $product['name']; ?></h5>
                <p class="text-muted">Price: <?php echo $product['price']; ?> EGP</p>
                <p class="card-text mb-1"><span class="font-weight-bold">Description:</span><p class="ml-3"><?php echo $product['desc']; ?></p></p>
                <p class="text-muted">Quantity : <?php echo $product['quantity']; ?> pieces.</p>
                <p class="text-muted">Category : <?php echo $category['type']; ?></p>
                <div>
                    <div>
                        <!-- <a href="index.php" class="btn btn-primary">Back</a> -->
                        <!-- <a href="index.php" class="btn btn-primary">Add To Cart</a> -->
                        <form class="d-inline-block" action="showProduct.php?id=<?php echo $product['product_id']; ?>" method="post">
                            <input name="cart" class="btn btn-primary" type="submit" value="Add To Cart">
                        </form>
                            
                        <?php if (isset($_POST['cart'])) { ?>
                            <a class="btn btn-success" href="buyProducts.php">Buy Products</a>
                        <?php } ?>

                        <?php if (isset($_SESSION['id'])) { ?>
                            <a href="edit.php?id=<?php echo $product['product_id']; ?>" class="btn btn-info">Edit</a>
                            <a href="handlers/handleDelete.php?id=<?php echo $product['product_id']; ?>" class="btn btn-danger">Delete</a>
                        <?php } ?>
                    </div>
                </div> 
            </div>
        <?php } else { ?>
            <p>No Product Found</p>
        <?php } ?>
    </div>
</div>






<?php include 'inc/footer.php'; ?>