<?php

include './includes/sqlConnect.php';
if (isset($_POST['sName'])) {
    $sql = "DELETE FROM RSS_links WHERE ID_name = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['sName']);
    $stmt->execute();
    
    $sql = "DELETE FROM news WHERE Source = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['sName']);
    $stmt->execute();
    
    header("Location: manageLinks.php");
}