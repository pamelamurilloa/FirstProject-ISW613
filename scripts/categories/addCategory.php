<?php

    require_once('categoryManager.php');
    require_once('../utils/session/validateSession.php');

    confirmLogin();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST["name"];

        if ($saveCategory($name)) {
            header("Location: ../../pages/admin/categoryCRUD.php");
        } else {
            header("Location: ../../pages/admin/categoryCRUD.php?error=unable-to-add-category");
        }

    }