<?php

session_start();

//Lw mafesh session id rag3o ll login w mtkmlsh el code
if (!isset($_SESSION['id'])) 
{
    header('location: ../login.php');
    die();
}

session_destroy();

header('location: ../index.php');

?>