<?php

if (isset($_POST['submit'])) 
{
    $img = $_FILES['img'];
    $name = $img['name'];
    $tmp_name = $img['tmp_name'];
    //Extension of image
    $ext = pathinfo($name)['extension'];
    //New name of image with extension
    $new_name = uniqid() . '.' . $ext;
    
    move_uploaded_file($tmp_name, 'images/' . $new_name);



    //El sora betrg3 b array feh 5 hagat mnhom 3 hagat mohma, w homa
    //El name w bstfad mnha b enyension el sora akhod extension el sora b function esmha pathinfo(), El tmp_name w hwa esm mo2kt ll sora bekon mwgod 3la el server, 
    //El new_name w dah lma arf3 el sora betakhod esm mokhtlef mabekonsh mtkrr w b3mlha b function esmha uniqid(),
    //3shan an2l el sora l folder el images fel project bstkhdem function esmha move_uploaded_files() w betakhod 7agten, awol haga el temp_name, tany haga el path ely hattkhzen feh

}



?>


<form action="test.php" method="post" enctype="multipart/form-data">

    <input type="file"name="img">
    <input type="submit" name="submit" value="Add">


</form>