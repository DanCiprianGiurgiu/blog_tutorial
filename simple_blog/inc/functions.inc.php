<?php
function adminLinks($page, $url)
{
    $editURL = "/simple_blog/admin/$page/$url";
    $deleteURL = "/simple_blog/admin/delete/$url";
    $admin['edit'] = "<a href=\"$editURL\">edit</a>";
    $admin['delete'] = "<a href=\"$deleteURL\">delete</a>";
    return $admin;
}

function retrieveEntries($db, $page, $url)
{
    if (isset($url)) {
        $sql = "SELECT id, page, title, entry FROM entries WHERE url=? LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($url));
        $e = $stmt->fetch();
        $fulldisp = 1;
    } else {
        $sql = "SELECT id, page, title, entry, url FROM entries WHERE page=? ORDER BY created DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($page));
        $e = NULL;
    }
    while ($row = $stmt->fetch()) {
        if ($page == 'blog') {
            $e[] = $row;
            $fulldisp = 0;
        } else {
            $e = $row;
            $fulldisp = 1;
        }
    }

    $fulldisp = 0;

    if (!is_array($e)) {
        $fulldisp = 1;
        $e = array(
            'title' => 'No Entries Yet',
            'entry' => '<a href="/simple_blog/admin.php">Post an entry!</a>');
    }

    array_push($e, $fulldisp);
    return $e;
}

function sanitizeData($data)
{
    if (!is_array($data)) {
        return strip_tags($data, "<a>");
    } else {
        return array_map('sanitizeData', $data);
    }
}

function makeUrl($title)
{
    $patterns = array('/\s+/', '/(?!-)\W+/');
    $replacements = array('-', '');
    return preg_replace($patterns, $replacements, strtolower($title));

}