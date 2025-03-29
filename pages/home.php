<?= $this->title = "Home" ?>
<h1>Im Home Page</h1>
<?php

use cva67\phpmvc\App;

if (App::$app->session->existsSession('user')) {
    $user = App::$app->session->getSession('user')
?>
    <p>My name is: -<?= $user['name']; ?></p>
<?php
}

?>