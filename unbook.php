<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 

if(isset($_GET['personalCode']))
{
    $personalCode = $_GET['personalCode'];
}
else
{
    throw new Exception("allt är inte ifyllt");
}

$query= "DELETE FROM booking WHERE personalCode='$personalCode'";
$app->getdb()->query($query);

redirect("index.php");

$app->renderFooter(); 

?>