<?php
include_once 'inc/functions.inc.php';
include_once 'inc/db.inc.php';
$db = new PDO(DB_INFO, DB_USER, DB_PASS);
$page = isset($_GET['page']) ? htmlentities(strip_tags($_GET['page'])) : 'blog';
if(isset($_POST['action']) && $_POST['action'] == 'delete')
{
    if($_POST['submit'] == 'Yes')
    {
        $url = htmlentities(strip_tags($_POST['url']));
        if(deleteEntry($db, $url))
        {
            header("Location: /simple_blog/");
            exit;
        }
        else
        {
            exit("Error deleting the entry!");
        }
    }
    else
    {
        header("Location: /simple_blog/blog/$url");
        exit; }
}
if (isset($_GET['url'])) {
    $url = htmlentities(strip_tags($_GET['url']));
    if($page == 'delete') {
        $confirm = confirmDelete($db, $url);
    }
    $legend = "Edit This Entry";
    $e = retrieveEntries($db, $page, $url);
    $id = $e['id'];
    $title = $e['title'];
    $entry = $e['entry'];

} else {
    $legend = "New Entry Submission";
    $id = NULL;
    $title = NULL;
    $entry = NULL;

}
?>
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
<?php if($page == 'delete'): {
    echo $confirm;
}else:
?>
<form method="post" action="/simple_blog/inc/update.inc.php">
    <fieldset>
        <legend><?php echo $legend ?></legend>
        <label>Title
            <input type="text" name="title" maxlength="150"
                   value="<?php echo htmlentities($title) ?>"/>
        </label>
        <label>Entry
            <textarea name="entry" cols="45" rows="10"
                      rows="10"><?php echo sanitizeData($entry) ?></textarea>
        </label>
        <input type="hidden" name="id"
               value="<?php echo $id ?>"/>
        <input type="hidden" name="page"
               value="<?php echo $page ?>"/>
        <input type="submit" name="submit" value="Save Entry"/>
        <input type="submit" name="submit" value="Cancel"/>
    </fieldset>
</form>
<?php endif; ?>
</body>
</html>