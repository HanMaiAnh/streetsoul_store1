<?php
// model/news.model.php

function getAllNews($conn) {
    $sql = "SELECT * FROM news ORDER BY created_at DESC";
    $result = $conn->query($sql);
    $news = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
    }

    return $news;
}
?>