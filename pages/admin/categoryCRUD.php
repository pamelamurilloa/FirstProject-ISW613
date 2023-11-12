<?php
    require_once('../../scripts/categories/categoryManager.php');
    require_once('../../scripts/utils/session/validateSession.php');

    $categorySelected = (isset($_GET['id'])) ? $_GET['id'] : null;
    $categories = getCategories();

    confirmLogin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Administrator</title>
</head>
<body>
    <div class="CRUD">

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
                <?php foreach ($categories as $category) :
                    echo '<tr>';

                        echo '<td>' . $category['id'] . '</td>';
                        echo '<td>' . $category['name'] . '</td>';

                        echo '<td><a href="categoryCRUD.php?id=' . $category['id'] . '">Edit</a> </td>';
                        echo '<td><a href="../../scripts/categories/deleteCategory.php?id=' . $category['id'] . '">Delete</a></td>';
                        
                    echo '</tr>';
                endforeach; ?>
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
            <input type="text" class="form-control" name="name" placeholder="Category name">
        </div>

        <?php echo '<input type="hidden" name="categoryID" value="' . $categorySelected . '">'; ?>

        <input type="submit" class="btn btn-primary" value="Edit Category"></input>

        <a href="categoryCRUD.php">Stop Editing</a>
    </div>
</body>
</html>