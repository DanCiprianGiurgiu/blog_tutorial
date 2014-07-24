<?php
if (isset($_GET['page'])) {
    $page = htmlentities(strip_tags($_GET['page']));
} else {
    $page = 'blog';
}
echo
'
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type"
          content="text/html;charset=utf-8"/>
    <link rel="stylesheet" href="/simple_blog/css/default.css" type="text/css"/>
    <title> Simple Blog </title>
</head>
<body>
<h2> Simple Blog Application </h2>

<form method="post" action="/simple_blog/inc/update.inc.php">
    <fieldset>
        <legend>New Entry Submission</legend>
        <label>Title
            <input type="text" name="title" maxlength="150"/>
        </label>
        <label>Entry
            <textarea name="entry" cols="45" rows="10"></textarea>
        </label>
        <input type="hidden" name="page" value="<?php echo $page ?>"/>
        <input type="submit" name="submit" value="Save Entry"/>
        <input type="submit" name="submit" value="Cancel"/>
    </fieldset>
</form>
</body>
</html>';

