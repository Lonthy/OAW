<?php

include './includes/sqlConnect.php';
if (isset($_POST['sName'])) {
    $sql = "DELETE FROM RSS_links WHERE ID_name = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['sName']);
    $stmt->execute();
    $count = $stmt->affected_rows;
    echo $count;
    
    header("Location: manageLinks.php");
}