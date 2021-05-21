<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 

if(isset($_GET['bord']) && isset($_GET['namn']) && isset($_GET['nummer']) && isset($_GET['email']))
{
    $tableId = $_GET['bord'];
    $name = $_GET['namn'];
    $number = $_GET['nummer'];
    $email = $_GET['email'];
}
else
{
    throw new Exception("allt är inte ifyllt");
}

$query= "DELETE FROM booking WHERE namn='$name' AND nummer='$number' AND email='$email'";
$app->getdb()->query($query);

redirect("index.php");

$app->renderFooter(); 

?>