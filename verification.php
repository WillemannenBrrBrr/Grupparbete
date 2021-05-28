<?php
require_once("include/CApp.php");

$app->renderHeader("Tack");
$table = $_GET["table"];
$time = $_GET["time"];
$personalCode = $_GET["personalCode"];

?>
<h2>Tack för din beställning</h2>
<p>Du har bokat bord <?php echo($table) ?> till den <?php echo(date("d-m-Y H:i", $time)) ?></p>
<p>vi kontaktar dig om det blir problem med din bokning</p>
<p>Se din bokning <a href="alreadyBooked.php?personalCode=<?php echo($personalCode) ?> ">här</a></p>
<?php

$app->renderFooter();

?>