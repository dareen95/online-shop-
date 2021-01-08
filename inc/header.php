<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand font-weight-bold" href="index.php">ONLINE STORE</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link active float-right" href="index.php">Products</a>
            </li>
            <?php if (isset($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Create Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addCategory.php">Add Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">Orders</a>
                </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php if (isset($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><?php echo $_SESSION['username']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="handlers/handleLogout.php">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>