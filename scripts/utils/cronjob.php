<?php

$root = dirname(dirname(__FILE__));

    require_once($root . '\dataBase\dbConexion.php');
    require_once($root . '\utils\session\validateSession.php');

$newsSources = getSources();
cleanseNewsTable();

// ns.id, ns.url, ns.name, ns.fk_user_id AS userID, ns.fk_category_id AS categoryID, c.name AS category

foreach ($newsSources as $sources) :
    $url = $sources['url'];
    echo '<tr>';

        echo '<td>' . $category['id'] . '</td>';
        echo '<td>' . $category['name'] . '</td>';

    echo '</tr>';
endforeach; 

$url = 'https://feeds.feedburner.com/crhoy/wSjk';
// Load the XML file into a SimpleXMLElement object
$xml = simplexml_load_file($url);

// Iterate through each item
foreach ($xml->channel->item as $item) {
    // Print the information for each item
    echo "Title: " . $item->title . "<br>";
    echo "Link: " . $item->link . "<br>";

    $dateString = $item->pubDate;

    // Create a DateTime object from the original date string
    $dateTime = new DateTime($dateString);

    // Format the date as MySQL datetime string
    $newDateTime = $dateTime->format('Y-m-d H:i:s');


    echo "Date: " . $newDateTime . "<br>";

    $parts = explode('</p>', $item->description[0], 2);

    // Separate the image and text into different variables
    $image = $parts[0] ;
    $text = $parts[1];

    $pattern = '/<img[^>]+src=["\']([^"\']+)["\']/';
    preg_match($pattern, $image, $matches);

    // $matches[1] will contain the src attribute value
    $src = isset($matches[1]) ? $matches[1] : '';

    echo "image: " . $src . "<br>";
    echo "text: " . $text . "<br>";

    // echo "Description: " . ($item->description)[0] . "<br>";

    // Add more properties as needed
    echo "<br>";
}
