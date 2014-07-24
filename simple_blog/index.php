<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type"
          content="text/html;charset=utf-8"/>
    <link rel="stylesheet" href="/simple_blog/css/default.css" type="text/css"/>
    <title> Simple Blog </title>
</head>
<body>
<h1> Simple Blog Application </h1>
<ul id="menu">
    <li><a href="/simple_blog/blog/">Blog</a> </li>
    <li><a href="/simple_blog/about/">About the Author</a> </li>
</ul>

<div id="entries">
    <p class="backlink">
        <a href="/simple_blog/admin/<?php echo $page ?>">Post a New Entry</a>
    </p>
</div>
</body>
</html>

<?php

include_once "inc/functions.inc.php";
include_once "inc/db.inc.php";

$db = new PDO(DB_INFO, DB_USER, DB_PASS);
if (isset($_GET['page'])) {
    $page = htmlentities(strip_tags($_GET['page']));
} else {
    $page = 'blog';
}
$url = (isset($_GET['url'])) ? $_GET['url'] : NULL;
$e = retrieveEntries($db, $page, $url);
$fulldisp = array_pop($e);
$e = sanitizeData($e);
?>
<div id="entries">
    <?php
    if ($fulldisp == 1) {
        //$url = (isset($url)) ? $url : $e['url'];
        ?>
        <h2><?php echo $e['title'] ?> </h2>
        <p> <?php echo $e['entry'] ?> </p>
        <?php if ($page == 'blog'): ?>
            <p class="backlink">
                <a href="./">Back to Latest Entries</a>
            </p>
        <?php endif; ?>
    <?php
    } else {
        foreach ($e as $entry) {
            ?> <p><a
                    href="/simple_blog/<?php echo $entry['page'] ?>/<?php echo $entry['url'] ?>">
                    <?php echo $entry['title'] ?> </a></p>
        <?php
        }
    }
    ?>
    <p class="backlink">
        <a href="/simple_blog/admin/<?php echo $page ?> ">Post a New Entry</a>
    </p>
</div>



