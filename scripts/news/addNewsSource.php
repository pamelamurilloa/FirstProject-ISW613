<?php

    require_once('newsManager.php');
    require_once('../utils/session/validateSession.php');

    confirmLogin();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $source['name'] = $_POST["name"];
        $source['categoryID'] = $_POST['categoryID'];
        $source['rss'] = $_POST['rss'];
        $source['id'] = $_POST['sourceID'];

        if ($saveSource($source)) {
            header("Location: ../../pages/allUsers/newsSources.php");
        } else {
            header("Location: ../../pages/allUsers/newsSources.php?error=unable-to-add-source");
        }

    }