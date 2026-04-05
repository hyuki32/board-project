<?php
require_once 'db.php';

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
}
$query = "INSERT INTO posts (title, content) VALUES ($1, $2)";
$result = pg_query_params($conn, $query, [$title, $content]);

if ($result) {
    echo "登録成功";
} else {
    echo "登録失敗: " . pg_last_error($conn);
}
?>

