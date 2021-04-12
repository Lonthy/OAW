<?php

include './includes/sqlConnect.php';
$sql = "SELECT * FROM  rss_links;";
$results = mysqli_query($conn, $sql);
if ($results != null) {
    $j_while = 0;
    while ($row = mysqli_fetch_array($results)) {
        if ($j_while === 0) {
            echo '1';
            $jID_name = $row["ID_name"];
            $jRSS_url = $row["RSS_url"];
            $sql = "DELETE FROM RSS_links WHERE ID_name = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $jID_name);
            $stmt->execute();

            $sql = "DELETE FROM news WHERE Source = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $jID_name);
            $stmt->execute();

            $sql = "INSERT INTO rss_links (ID_name, RSS_url) VALUES (?, ?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $jID_name, $jRSS_url);
            $stmt->execute();

            $_POST['sName'] = $jID_name;

            include './includes/addNews.php';
        }
        if ($row!=null && $jID_name != $row["ID_name"] ) {
            echo '2';
            $jID_name = $row["ID_name"];
            $jRSS_url = $row["RSS_url"];

            $sql = "DELETE FROM RSS_links WHERE ID_name = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $jID_name);
            $stmt->execute();

            $sql = "DELETE FROM news WHERE Source = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $jID_name);
            $stmt->execute();

            $sql = "INSERT INTO rss_links (ID_name, RSS_url) VALUES (?, ?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $jID_name, $jRSS_url);
            $stmt->execute();

            $_POST['sName'] = $jID_name;
            
            include './includes/addNews.php';
        }
        $j_while++;
    }
    header("Location: index.php");
}

