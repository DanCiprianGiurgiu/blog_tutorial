<?php
function retrieveEntries($db, $id=NULL){
    if(isset($id)){

    }else{
        $sql = "SELECT id, title FROM entries ORDER BY created DESC";
        foreach($db->query($sql) as $row) {
            $e[] = array('id' => $row['id'],'title' => $row['title']);
        }
        $fulldisp = 0;

    if(!is_array($e))
    {
    $fulldisp = 1;
    $e = array(
        'title' => 'No Entries Yet',
        'entry' => '<a href="simple_blog/admin.php">Post an entry!</a>');
    }


    }
}