<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 7/15/14
 * Time: 5:14 PM
 */
// operatori logici
/*&& and si (|| or sau ), if daca,*/
/* $x = 4 ;
$b = TRUE ;
if ( $x <10  == $b )
{
    $x = 7;
    echo "a este mai mica decat 10 , valoare lui a este $x <br /";
}
*/
if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if(isset($_FILES['photo'])
          && is_uploaded_file($_FILES['photo']['tmp_name'])


    && $_FILES['photo']['error']==UPLOAD_ERR_OK){
      foreach($_FILES['photo'] as $key => $value){
          echo "$key : $value <br />";
      }
}else {             echo "No file uploaded!";         }

}else {}

echo'<form action="test.php" method="post"
    enctype="multipart/form-data">
    <label for="photo">User Photo:</label>
    <input type="file" name="photo" />
    <input type="submit" value="Upload a Photo" />
    </form>';
