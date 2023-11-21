<?php
    require_once('../../scripts/categories/categoryManager.php');
    require_once('../../scripts/utils/session/validateSession.php');

    $categorySelectedID = (isset($_GET['id'])) ? $_GET['id'] : null;

    $categorySelected = null;
    $categories = getCategories();

    if ($categorySelectedID !== null) {
        $categorySelected = getCategoryByID($categorySelectedID);
    }

    confirmLogin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../../style/all.css">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/footer.css">
    <link rel="stylesheet" href="../../style/body.css">

    <title>Category Administrator</title>
</head>
<body>
    <header id="header-container-index" class="sticky">
        <nav id="main-menu"  role="navigation" class="navbar">
            <h1><a class="navbar-brand" href="myCover.php">My Cover</a></h1>
            <ul class="links">
                <li class="nav-item"><a class="nav-link" href="myCover.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="newsSources.php">News Sources</a></li>
                <li class="nav-item"><a class="nav-link" href="../../scripts/utils/session/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="main-content">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ( !empty($categories) ) {
                        foreach ($categories as $category) :
                            echo '<tr>';

                                echo '<td>' . $category['id'] . '</td>';
                                echo '<td>' . $category['name'] . '</td>';

                                echo '<td><a href="categoryCRUD.php?id=' . $category['id'] . '">Edit</a> </td>';
                                echo '<td><a href="../../scripts/categories/deleteCategory.php?id=' . $category['id'] . '">Delete</a></td>';
                                
                            echo '</tr>';
                        endforeach; 
                    }?>
            </tbody>
        </table>

        <?php 
            if (isset($_GET['id'])) {
                echo '<form action="../../scripts/categories/editCategory.php" method="POST" class="form-inline" role="form">';
            } else {
                echo '<form action="../../scripts/categories/addCategory.php" method="POST" class="form-inline" role="form">';
            }
        ?>
        
        <div class="form-group">
            <label class="label-form" for="name">Category</label>
            <input type="text" class="form-control" name="name" placeholder="Category name" <?php if($categorySelectedID !== null) { echo " value='".$categorySelected['name'] ."' ";} ?> required>
        </div>

        <?php 

            echo '<input type="hidden" name="categoryID" value="' . $categorySelectedID . '">';

            if (isset($_GET['id'])) {
                echo '<input type="submit" class="btn btn-primary" value="Edit Category"></input>';
                echo '<a href="categoryCRUD.php">Stop Editing</a>';
            } else {
                echo '<input type="submit" class="btn btn-primary" value="Add Category"></input>';
            }
        ?>
        
    </div>
</body>
</html>