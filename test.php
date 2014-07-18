<?php

echo '<ul id= "menu" >
<li> <a href="index.php">Home</a> </li>
<li> <a href="index.php?page=about">About Us</a> </li>
<li> <a href="index.php?page=contact">Contact Us</a> </li>
<li> <a href="index.php?page=enter_email">Enter for Email</a></li>
</ul>';

?>
<?php
IF (ISSET($_GET['page'])) {
    $PAGE = HTMLENTITIES($_GET['page']);
} ELSE {
    $PAGE = NULL;
}
switch ($PAGE) {
    CASE 'about':
        ECHO "
<h1>ABOUT UP</h1>
<p>SUNT DAN ,DEZVOTATOR WEB</p>";
        break;
    case "contact":
        echo "
<h1>Contact Up</h1>
<p> Email up at <a href=\"mailto:daaa@ex.com\"> daaa@ex.com </a></p>";
        break;

    case "enter_email":
        echo "<h3>Enter for Email</h3>";
        echo '<form action="index.php?submit=true" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username"/>
      <label for="email">Email:</label>
       <input type="text" name="email"/>
      <input type="submit" name="submit" value="Register!" />
  </form>
';
        break;
    default:
        echo "
        <h1> selecteaza pagina </h1>
        <p>  </p>";
        break;


}


