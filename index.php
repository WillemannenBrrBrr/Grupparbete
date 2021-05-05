<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 
$app->renderStart();

$query = "SELECT id, `unix timestamp`, bord FROM booking WHERE 1";
$result = $app->getdb()->query($query);
$data = $result->fetch_assoc();

echo("nu: " . date('d-m-Y H:i', time()) . "<br/>");
echo("avbokas vid: " . date('d-m-Y H:i', $data['unix timestamp'] + 200));

if($result->num_rows > 0 && $data["unix timestamp"] > time() + 200)
{
    $query = "UPDATE tables SET available=1 WHERE id = " . $data["bord"] . "";
    $app->getdb()->query($query);

    $query = "DELETE FROM booking WHERE id = " . $data["id"] . "";
    $app->getdb()->query($query);
}

$app->renderFooter(); 

?>