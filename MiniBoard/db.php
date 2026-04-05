<?php

    $conn = pg_connect("host=localhost port=5432 dbname=myapp user=postgres password=ryua1004");


if (!$conn) {
    throw new RuntimeException('Unable to open database\n');
}

echo "Connected successfully!<br>";

$result = pg_query($conn, "SELECT current_database()");
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
$row = pg_fetch_row($result);
echo "You are connected to: " . $row[0];


?>
