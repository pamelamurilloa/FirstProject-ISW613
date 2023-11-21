<?php

$root = dirname(dirname(__FILE__));


    require_once($root . '\dataBase\dbConexion.php');
    require_once($root . '\utils\session\validateSession.php');

    function getCategories () {

        $sql = "SELECT id, name FROM categories";

        $result = selectFromDB($sql);

        $categories = array();
        while ($row = $result->fetch_assoc()) {
          $categories[] = $row;
        }

        return $categories;
    }

    function getCategoryByID($categoryID) {
        $sql = "SELECT name FROM categories WHERE id = $categoryID;";

        $result = selectFromDB($sql);

        $categories = array();
        while ($row = $result->fetch_assoc()) {
          $categories[] = $row;
        }

        return $categories[0];
    }

    // Registers a new Category in the database

    function saveCategory($name) {

        $sql = "INSERT INTO categories (name) VALUES('$name');";

        return makeQueryOnly($sql);
    }

    // Updates Category in the database

    function editCategory($category){

        $name = $category['name'];
        $categoryID = $category['id'];

        $sql = "UPDATE categories SET name = '$name' WHERE id = $categoryID;";

        return makeQueryOnly($sql);
    }


    // Deletes Category from the database

    function deleteCategory($id){
        $sql = "DELETE FROM categories WHERE id = $id";
        return makeQueryOnly($sql);
    }