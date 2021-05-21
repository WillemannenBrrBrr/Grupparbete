<?php
require_once("include/CApp.php");

$app->renderHeader("Tack");
$table = $_GET["table"];
$time = date("d-m-Y H:i", $_GET["time"]);

?>
<h2>Tack för din beställning</h2>
<p>Du har bokat bord <?php echo($table) ?> till den <?php echo($time) ?></p>
<?php

$app->renderFooter(); 

?>