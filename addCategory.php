<?php 
session_start();

//Lw mafesh session id rag3o ll index
if (!isset($_SESSION['id'])) 
{
    header('location: login.php');
}

require_once 'classes/Product.php';
require_once 'inc/header.php'; 
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

            <form action="handlers/handleCategory.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Category" name="category" class="form-control">
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>






<?php include 'inc/footer.php'; ?>