<?php
require dirname(__DIR__, 3) . '/src/Link.php';

use Short\Link;
if(!empty($_POST['link']))
{
    $output = new Link();
    echo $output->shortenLink($link);
}

?>