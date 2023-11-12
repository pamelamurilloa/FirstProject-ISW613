<?php
    require_once('../../scripts/news/newsManager.php');
    require_once('../../scripts/utils/session/validateSession.php');

    $newsSourceSelected = (isset($_GET['id'])) ? $_GET['id'] : null;
    $newsSources = getSources();

    confirmLogin();
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
                    <td>url</td>
                    <td>Category</td>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($newsSources as $newsSource) :
                    echo '<tr>';

                        echo '<td>' . $newsSource['id'] . '</td>';
                        echo '<td>' . $newsSource['name'] . '</td>';
                        echo '<td>' . $newsSource['url'] . '</td>';
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
            <input type="text" class="form-control" name="name" placeholder="News Source Name">
        </div>

        <?php echo '<input type="hidden" name="newsSourceID" value="' . $newsSourceSelected . '">'; ?>

        <input type="submit" class="btn btn-primary" value="Edit News Source"></input>

        <a href="newsSources.php">Stop Editing</a>
    </div>
</body>
</html>