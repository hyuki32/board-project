<?php
require_once 'db.php';
?>

<h1>掲示板</h1>
<a href="write_form.php">投稿する</a>

<?php
// 'public' スキーマにあるテーブル一覧を取得する
$sql = "SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public'";
$result = pg_query($conn, $sql);

if (!$result) {
    echo "テーブルリストの取得中にエラーが発生しました： " . pg_last_error($conn);
} else {
    echo "<h3>現在のデータベースのテーブル一覧：</h3>";
    echo "<ul>";
    while ($row = pg_fetch_assoc($result)) {
        echo "<li>" . $row['tablename'] . "</li>";
    }
    echo "</ul>";

}

$result = pg_query($conn, "SELECT * FROM posts ORDER BY id DESC");




while ($row = pg_fetch_assoc($result)) {
    echo "<h3>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</h3>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8')) . "</p>";
    echo "<hr>";
}
?>
