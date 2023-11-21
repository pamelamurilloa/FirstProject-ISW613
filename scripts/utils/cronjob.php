<?php

$root = dirname(dirname(__FILE__));

    require_once($root . '\dataBase\dbConexion.php');
    require_once($root . '\news\newsManager.php');

$newsSources = getSources();
cleanseNewsTable();

// ns.id, ns.url, ns.name, ns.fk_user_id AS userID, ns.fk_category_id AS categoryID, c.name AS category

foreach ($newsSources as $sources) :
    $url = $sources['url'];
    try { 
    $xml = simplexml_load_file($url); // loads the file into a SimpleXMLElement object

    // Iterate through each item
    foreach ($xml->channel->item as $item) {

        // DATE FORMATING ZONE

        $dateString = $item->pubDate;
        $dateTime = new DateTime($dateString);
        $newDateTime = $dateTime->format('Y-m-d H:i:s');

        // ENDS DATE FORMATING ZONE
        //
        // BEGINS DESCRIPTION FORMATING ZONE

        $parts = explode('</p>', $item->description[0], 2); // Obtains an array with the img tag in parts[0] and the text in parts[1]

        // Separate the img tag and the text
        $image = $parts[0];
        $text = $parts[1];

        // Establishes a pattern to obtain src only of the img
        $pattern = '/<img[^>]+src=["\']([^"\']+)["\']/';
        preg_match($pattern, $image, $matches); // Searches for the pattern in the img and saves them in $matches

        // $matches[1] will contain the src
        $src = isset($matches[1]) ? $matches[1] : '';

        // ENDS DESCRIPTION FORMATING ZONE


        $news['title'] = $item->title;
        $news['description'] = $text;
        $news['image'] = $src;
        $news['link'] = $item->link;
        $news['date'] = $newDateTime;
        $news['sourceID'] = $sources['id'];
        $news['userID'] = $sources['userID'];
        $news['categoryID'] = $sources['categoryID'];

        // echo "Title: " . $news['title'] . ", description: " . $news['description'] . ", image: " . $news['image'] . ", link: " . $news['link'] . ", date: " . $news['date'] . ", sourceID: " . $news['sourceID'] . ", userID: " . $news['userID'] . ", categoryID: " . $news['categoryID'];
        // echo "<br>";
        // echo "<br>";

        saveNews($news);

    } catch (Exception $ex) {
        //No era url valido
    }

    }

endforeach; 