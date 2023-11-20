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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../../style/all.css">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/footer.css">
    <link rel="stylesheet" href="../../style/body.css">

    <title>My Cover</title>
</head>
<body>
    <header id="header-container-index" class="sticky">
        <nav id="main-menu"  role="navigation" class="navbar">
            <h1><a class="navbar-brand" href="myCover.php">My Cover</a></h1>
            <ul class="links">
                <li class="nav-item"><a class="nav-link active" href="myCover.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="newsSources.php">News Sources</a></li>
                <li class="nav-item"><a class="nav-link" href="../../scripts/utils/session/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="main-content">
        <h2>Your Unique News Cover</h2>
        
        <h3>Categories</h3>
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
            echo '<div class="card-columns">';

            foreach ($news as $newsItem) {
                $date = $newsItem['date'];
                $newsID = $newsItem['newsID'];
                $imageSRC = $newsItem['imageSRC'];
                $newsSRC = $newsItem['newsSRC'];
                $title = $newsItem['title'];
                $category = $newsItem['category'];
                $description = $newsItem['description'];

                echo '<div class="card text-center border-dark mb-3">';
                
                    echo '<div class="card-header">';
                        echo '<p class="card-text">' . $date . '</p>';
                        echo '<a href="' . $newsSRC . '"><img class="card-img-top" src="' . $imageSRC . '" alt="news image"></a>';
                    echo '</div>';

                    echo '<div class="card-body">';
                        echo '<a class="card-title" href="' . $newsSRC . '">' . $title . '</a>';
                        echo '<p  class="card-text">' . $category . '</p>';
                    echo '</div>';
                    
                    echo '<p class="card-text" >' . $description . '</p>';
                    echo '<a class="card-link" href="' . $newsSRC . '">Show More</a>';
                echo '</div>';
            }

            echo '</div>';
        ?>
    </div>
    <footer class="footer-content">
        <h3>Pamela Murillo Anchia</h3>
        <h4>Universidad Tecnica Nacional</h4>
    </footer>
</body>
</html>