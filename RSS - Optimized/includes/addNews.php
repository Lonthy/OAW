<?php
$sql = "SELECT RSS_url FROM `rss_links`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $linkArray = array();
    $i_while = 0;
    while ($row = $result->fetch_assoc()) {
        $linkArray[$i_while] = $row["RSS_url"];
        $i_while++;
    }
}

require_once('../RSS/simplepie-1.5/autoloader.php');

$feed = new SimplePie();

$feed->set_feed_url($linkArray);

$feed->enable_cache(true);
$feed->set_cache_location('cache');
$feed->set_cache_duration(1800);

$feed->init();

$feed->handle_content_type();

foreach ($feed->get_items() as $item):
    $nUrl = $item->get_permalink();
    $nTitle = $item->get_title();
    $nDescription = $item->get_description();
    $nDate = $item->get_date('Y m d | G:i a');
    $nCategory = $item->get_category();
    $parent_feed = $item->get_feed();
    $nSource = $parent_feed->get_title();
    $nImgURL = $parent_feed->get_image_url();
    
    if ($nDescription === null){
        $nDescription = 'Not provided';
    }
    if ($nCategory === null){
        $nCategory = 'Not provided';
    }
    
    $sql = "INSERT INTO news (Title, Description, Category, Url, Date, Source, ImgURL) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nTitle, $nDescription, $nCategory, $nUrl, $nDate, $nSource, $nImgURL);
    $stmt->execute();
endforeach; ?>