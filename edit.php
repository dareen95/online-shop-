<?php 
session_start();

//Lw mafesh session id rag3o ll index
if (!isset($_SESSION['id'])) 
{
    header('location: login.php');
}

require_once 'classes/Product.php';
require_once 'inc/header.php';

$id = $_GET['id'];

$prod = new Product;
 
?>
    
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
        
            <form action="handlers/handleEdit.php?id=<?php echo $product['product_id']; ?>" method="post">
                <div class="form-group">
                    <input type="text" value="<?php echo $product['name']; ?>" placeholder="Name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" value="<?php echo $product['price']; ?>" placeholder="Price" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Description" name="desc" rows="6"><?php echo $product['desc']; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Category Id" name="category_id" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Quantity" name="quantity" class="form-control">
                </div>
                <!-- <div class="form-group">
                    <label for="exampleFormControlFile">upload image</label>
                    <input type="file" class="form-control-file" name="img" id="exampleFormControlFile">
                </div> -->
                <div class="form-group text-center">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>