<?php

$link = mysql_connect('dan.com','roort', '');
if|(!$link){
    die('Connection failed: ' . mysql_error());
    $db = mysql_select_db('test');
    if(!$db){
        die('selecteaza database  unavailable ' . mysql_error9());
    }
}
$db = mysql_select_db('test');
if(!$db){
    die('Selected database unavailable: ' . mysql_error());
}
$sql = "SELECT artist_name FROM artist";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
    printf("Artist: %S<br ?>, $row['artist_name]");
}
mysql_free_result($result);
mysql_close($link);
?>