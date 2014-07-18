<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Connection failed: ' . mysql_error());
}
$db = mysql_select_db('blog_text');
if (!$db) {
    die('Selected database unavailable: ' . mysql_error());
}
$sql = "SELECT artist_name FROM artists";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    printf("Artist: %s<br />", $row['artist_name']);
}
mysql_free_result($result);
mysql_close($link);
?>