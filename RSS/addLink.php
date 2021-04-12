<?php

include './includes/sqlConnect.php';
if (
        isset($_POST['sName']) &&
        isset($_POST['sUrl'])
) {

    $sql = "INSERT INTO rss_links (ID_name, RSS_url) VALUES (?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['sName'], $_POST['sUrl']);
    $stmt->execute();
    
    include './includes/addNews.php';
    
    header("Location: manageLinks.php");
}
?>