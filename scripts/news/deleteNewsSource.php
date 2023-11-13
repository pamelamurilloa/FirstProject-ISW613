<?php

    require_once('newsManager.php');
    require_once('../utils/session/validateSession.php');

    $sourceID = $_GET['id'];

    confirmLogin();

    if (deleteSource($sourceID)) {
        header("Location: ../../pages/allUsers/newsSources.php");
    } else {
        header("Location: ../../pages/allUsers/newsSources.php?error=source-not-eliminated");
    };
    
?>