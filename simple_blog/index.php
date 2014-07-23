<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type"
          content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="/simple_blog/css/default.css" type="text/css" />
    <title> Simple Blog </title>
</head>
<body>
<h1> Simple Blog Application </h1>
<div id="entries">
    <p class="backlink">
        <a href="/simple_blog/admin.php">Post a New Entry</a>
    </p>
</div>
</body>
</html>

<?php

include_once "inc/functions.inc.php";
include_once "inc/db.inc.php";

$db = new PDO(DB_INFO, DB_USER, DB_PASS);
$id = (isset($_GET['id'])) ? (int) $_GET['id'] : NULL;
$e = retrieveEntries($db, $id);
$fulldisp = array_pop($e);
$e = sanitizeData($e);
?>
<div id="entries">
<?php
if($fulldisp==1){
?>
    <h2><?php echo $e['title'] ?> </h2>
    <p> <?php echo $e['entry'] ?> </p>
    <p class="backlink">
    <a href="./">Back to Latest Entries</a>
    </p>
<?php
}else{
    foreach($e as $entry){
 ?> <p><a href="?id=<?php echo $entry['id'] ?>">
    <?php echo $entry['title'] ?> </a></p>
<?php
    }
}
?>
    <p class="backlink">
        <a href="/simple_blog/admin.php">Post a New Entry</a>
    </p>
</div>



