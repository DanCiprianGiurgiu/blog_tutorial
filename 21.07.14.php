

<?php
/*
$link =new mysqli('localhost', 'root', '', 'test');
    if(!$link){
        die ('connection failed: ' . $link-> error());
    }
$sql = "select artist_name FROM artist";
$result = $link->query($sql);
while($row = $result->fetch_assoc()){
    printf("artist: %s<br />", $row{'artist_name'});
}
$result->close();
$link->close();

*/

echo '<form method="post">
<label for="artist">Select an Artist:</label>
<select name="artist">
    <option value="1">Bon Iver</option>
    <option value="2">Feist</option>
</select>
<input type="submit" />
</form>';

if($_SERVER['REQUEST_METHOD']=='POST')
{

    $link = new mysqli('localhost', 'root', '', 'test');
    if(!$link) {
        die('Connection failed: ' . $mysqli->error());
    }
    $sql = "SELECT album_name FROM albums WHERE artist_id=?";
    if($stmt = $link->prepare($sql))
    {
        $stmt->bind_param('i', $_POST['artist']);
        $stmt->execute();
        $stmt->bind_result($album);
        while($stmt->fetch()) {
            printf("Album: %s<br />", $album);
        }
        $stmt->close();
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
    <?php } ?>