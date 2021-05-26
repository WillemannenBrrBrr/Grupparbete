<?php
require_once("include/CApp.php");

$app->renderHeader("Tack");
$table = $_GET["table"];
$time = $_GET["time"];

?>
<h2>Tack för din beställning</h2>
<p>Du har bokat bord <?php echo($table) ?> till den <?php echo(date("d-m-Y H:i", $time)) ?></p>
<?php

$app->renderFooter(); 

?>