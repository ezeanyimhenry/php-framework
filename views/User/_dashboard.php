<?php 
require_once('views/_query.php');

echo "WELCOME ".$userDetails['username'];
?>
<html>
    <body>
    <form method="post" action="/logout"> 
        <button type="submit">Logout</button>
    </form>
    </body>
</html>