<?php

    require_once("../dataBase/dbConexion.php");
    require_once('../utils/session/validateSession.php');

    function getNewsByCategory ($categoryID) {


        $userID = confirmLogin()['id'];
        $sql = "SELECT n.id AS newsID, n.image AS imageSRC, n.title, n.short_description AS description, n.permalink as newsSRC, n.date, c.name as category FROM news AS n JOIN categories AS c ON c.id = n.fk_category_id WHERE fk_category_id = $categoryID AND fk_user_id = $userID;";

        return selectFromDB($sql);
    }

    function getSourcesByUser ($userID) {

        $sql = "SELECT ns.id, ns.url, ns.name, c.name AS category FROM news_sources AS ns JOIN categories AS c ON c.id = ns.fk_category_id WHERE fk_user_id = $userID;";

        return selectFromDB($sql);
    }


    // Registers a News Source in the database

    function saveSource($source) {

        $name = $source['name'];
        $categoryID = $source['categoryID'];
        $rssURL = $source['rss'];
        $userID = confirmLogin()['id'];

        $sql = "INSERT INTO news_sources (name, url, fk_category_id, fk_user_id) VALUES('$name', '$rssURL', '$categoryID', '$userID');";

        return makeQueryOnly($sql);
    }

    // Updates a News Source in the database

    function editSource($source){

        $sourceID = $source['id'];
        $name = $source['name'];
        $categoryID = $source['categoryID'];
        $rssURL = $source['rss'];
        $userID = confirmLogin()['id'];

        $sql = "UPDATE news_sources SET name = '$name', url = '$rssURL', fk_category_id = '$categoryID' WHERE id = $sourceID AND fk_user_id = $userID;";

        return makeQueryOnly($sql);
    }


    // Deletes a source from the database

    function deleteSource($id){

        $userID = confirmLogin()['id'];

        $sql = "DELETE FROM news WHERE fk_news_sources_id = $id AND fk_user_id = $userID";
        return makeQueryOnly($sql);
        
        $sql = "DELETE FROM news_sources WHERE id = $id AND fk_user_id = $userID";
        return makeQueryOnly($sql);
    }
