<?php
    require_once('../../scripts/categories/categoryManager.php');
    require_once('../../scripts/news/newsManager.php');
    require_once('../../scripts/utils/session/validateSession.php');

    $categorySelected = (isset($_GET['id'])) ? $_GET['id'] : null;

    $user = confirmLogin();
    $categories = getCategories();

    $news = getNewsByUser($user['id']);
    if ($categorySelected !== null) { $news = getNewsByCategory($categorySelected); }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cover</title>
</head>
<body>
    <header>
        <h1>My news Cover</h1>
    </header>
    <div class="container">
        <h1>Your Unique News Cover</h1>
        <div class="button-list category-list">
            <?php
                if ( !empty($categories) ) {
                    foreach ($categories as $category) :
                        echo '<a class="btn btn-category" href="myCover.php?id=' . $category['id'] . '">'.$category['name'].'</a>';
                    endforeach;
                }
            ?>
        </div>

        <?php
            foreach ($news as $newsItem) {
                $date = $newsItem['date'];
                $newsID = $newsItem['newsID'];
                $imageSRC = $newsItem['imageSRC'];
                $newsSRC = $newsItem['newsSRC'];
                $title = $newsItem['title'];
                $category = $newsItem['category'];
                $description = $newsItem['description'];

                echo '<div class="news-card">';
                    echo '<p>' . $date . '</p>';
                    echo '<a href="' . $newsSRC . '"><img src="' . $imageSRC . '" alt="news image"></a>';

                    echo '<div class="news-card-subtitle">';
                        echo '<a href="' . $newsSRC . '"><h3>' . $title . '</h3></a>';
                        echo '<h4>' . $category . '</h4>';
                    echo '</div>';
                    
                    echo '<p>' . $description . '</p>';
                    echo '<a href="' . $newsSRC . '">Show More</a>';
                echo '</div>';
            }
        ?>
    </div>
    <footer>
        <h2>Pamela Murillo Anchia</h2>
        <h3>Universidad Tecnica Nacional</h3>
    </footer>
</body>
</html>