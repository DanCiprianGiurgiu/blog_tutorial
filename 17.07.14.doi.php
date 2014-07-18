<?php
if(isset($_COOKIE['username'])){
    echo "bine ai revenit,", htmlentities($_COOKIE['username']),"<br />";

}
else if($_SERVER['REQUEST_METHOD']) {


}