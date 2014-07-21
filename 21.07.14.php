<?php

$link =new mysqli('localhost', 'root', '', 'blog_text');
    if(!$link){
        die ('Connection failed: ' . $link-> error());
    }
$sql = "SELECT artist_name FROM artists";
$result = $link->query($sql);
while($row = $result->fetch_assoc()){
    printf("artist: %s<br />", $row{'artist_name'});
}
$result->close();
$link->close();

echo '<form method="post">
    <label for="artist">Select an Artist:</label>
    <select name="artist">
        <option value="1">Bon Iver</option>
        <option value="2">Feist</option>
    </select>
    <input type="submit" />
    </form>';

if($_SERVER['REQUEST_METHOD']=='POST') {
    $link = new mysqli('localhost', 'root', '', 'blog_text');
    if(!$link) {
        die('Connection failed: ' . $mysqli->error());
    }
    $sql = "SELECT album_name FROM albums WHERE artist_id=?";
    if($stmt = $link->prepare($sql)) {
        $stmt->bind_param('i', $_POST['artist']);
        $stmt->execute();
        $stmt->bind_result($album);
        while($stmt->fetch()) {
            printf("album: %s<br />", $album);
        }
        $stmt->close();
    }
    else {
        echo '<form method="post">
            <label for="artist">Select an Artist:</label>
            <select name="artist">
                <option value="1">Bon Iver</option>
                <option value="2">Feist</option>
            </select>
            <input type="submit" />
        </form>';
    }
}
/*if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dbinfo = 'mysql:host=localhost;dbname=test';
    $user= 'root';
    $pass= '';
    $link = new PDO($dbinfo, $user, $pass);
    $sql = "SELECT album_name FROM album  WHERE artist_id=?";
  $stmt= $link->prepare($sql);
    if($stmt->execute(array($_POST['artist']))) {
        while($row= $stmt->fetch()) {
            printf("Album:%s <br />", $row['album_name']);
        }
        $stmt->closeCursor();
    }
}
else{

   ?>
    <form method="post">
        <label for="artist">Select an Artist:</label>
        <select name="artist">
            <option value="1">Bon Iver</option>
            <option value="2">Feist</option>
        </select>
        <input type="submit" />
    </form>
<?php }

*/


/*$dbinfo = 'mysql:dbname=blog_text;host=localhost';
$user= 'root';
$pass= '';
try{
    $db=new PDO($dbinfo, $user, $pass);

} catch(PDOException $e){
    echo 'Connection failed: ',$e->getMessage();

}
$sql = "SELECT entry FROM entry_pages WHERE page='blog_text'";
$entries = NULL;
 foreach($db->query($sql) as $row) {
    $sql2 = "SELECT test FROM entries WHERE title='$row[entry]'";
 foreach($db->query($sql) as $row2) {
    $entries[] = array($row['title'], $row2['entry']);
    }
}
print_r($entries);

*/
$dbinfo = 'mysql:host=localhost;dbname=blog_text';
$user = 'root';
$pass = '';
try {
    $db = new PDO($dbinfo, $user, $pass);
} catch(PDOException $e) {
    echo 'Connection failed: ', $e->getMessage();
}
// Wrong in the tutorial.
$sql = "SELECT * FROM albums";
$statement = $db->prepare($sql);
$statement->execute();
$rows = $statement->fetch();
var_dump($rows);

