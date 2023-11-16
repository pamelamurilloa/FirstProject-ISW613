<?php

    require_once('categoryManager.php');
    require_once('../utils/session/validateSession.php');

    confirmLogin();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $category['name'] = $_POST["name"];
        $category['id'] = $_POST['categoryID'];

        if (editCategory($category)) {
            header("Location: ../../pages/admin/categoryCRUD.php");
        } else {
            header("Location: ../../pages/admin/categoryCRUD.php?error=unable-to-edit-source");
        }

    }