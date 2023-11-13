<?php

    require_once('categoryManager.php');
    require_once('../utils/session/validateSession.php');

    $categoryID = $_GET['id'];

    confirmLogin();

    if (deleteCategory($categoryID)) {
        header("Location: ../../pages/admin/categoryCRUD.php");
    } else {
        header("Location: ../../pages/admin/categoryCRUD.php?error=category-not-eliminated");
    };
    
?>