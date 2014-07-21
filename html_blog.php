<?php
echo'
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type"
content="text/html;charset=utf-8" />
<title> Simple Blog </title>
</head>
<body>
<h3> Simple Blog Application </h3>
<form method="post" action="inc/update.inc.php">
<fieldset>
<legend>New Entry Submission</legend>
<label>Title
<input type="text" name="title" maxlength="150" />
</label>
<label>Entry
<textarea name="entry" cols="45" rows="10"></textarea>
</label>
<input type="submit" name="submit" value="Save Entry" />
<input type="submit" name="submit" value="Cancel" />
</fieldset>
</form>
</body>
</html>';
