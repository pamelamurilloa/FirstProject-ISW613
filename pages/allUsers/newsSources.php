<?php
    require_once('../../scripts/news/newsManager.php');
    require_once('../../scripts/utils/session/validateSession.php');

    $newsSourceSelectedID = (isset($_GET['id'])) ? $_GET['id'] : null;
    $newsSourceSelected = null;

    if ($newsSourceSelectedID !== null) {
        $newsSourceSelected = getSourceByID($newsSourceSelectedID);
    }

    $userID = confirmLogin()['id'];

    $newsSources = getSourcesByUser($userID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Sources</title>
</head>
<body>

    <div class="CRUD">

        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>News Source Name</th>
                    <td>rss url</td>
                    <td>Category</td>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($newsSources as $newsSource) :
                    echo '<tr>';

                        echo '<td>' . $newsSource['id'] . '</td>';
                        echo '<td>' . $newsSource['name'] . '</td>';
                        echo '<td>' . $newsSource['rss'] . '</td>';
                        echo '<td>' . $newsSource['category'] . '</td>';

                        echo '<td><a href="newsSources.php?id=' . $newsSource['id'] . '">Edit</a> </td>';
                        echo '<td><a href="../../scripts/news/deleteNewsSource.php?id=' . $newsSource['id'] . '">Delete</a></td>';
                        
                    echo '</tr>';
                endforeach; ?>

            </tbody>
        </table>

        <?php 
            if (isset($_GET['id'])) {
                echo '<form action="../../scripts/news/editNewsSource.php" method="POST" class="form-inline" role="form">';
            } else {
                echo '<form action="../../scripts/news/addNewsSource.php" method="POST" class="form-inline" role="form">';
            }
        ?>
        
        <div class="form-group">
            <label class="label-form" for="name">News Source</label>
            <input type="text" class="form-control" name="name" placeholder="Enter news source name" required>
        </div>

        <div class="form-group">
            <label class="label-form" for="rss">RSS link</label>
            <input type="text" class="form-control" name="name" placeholder="Enter RSS link" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" class="form-control" name="category" required>
            <?php
                foreach($categories as $id => $category) {
                    $selected = ($id === $newsSourceSelected['categoryID']) ? 'selected' : '';
                    echo "<option value=\"$id\" $selected>$category</option>";
                }
            ?>
            </select>
        </div>
        
        <?php 
        
            echo '<input type="hidden" name="sourceID" value="' . $newsSourceSelectedID . '">';

            if (isset($_GET['id'])) {
                echo '<input type="submit" class="btn btn-primary" value="Add News Source"></input>';
            } else {

                echo '<input type="submit" class="btn btn-primary" value="Edit News Source"></input>';

                echo '<a href="newsSources.php">Stop Editing</a>';
            }
        ?>
    </div>
</body>
</html>