<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 

$app->getForm()->open("alreadyBooked");
$app->getForm()->createInput("text", "name", "För/Efternamn");
$app->getForm()->createInput("email", "email", "E-mail");
$app->getForm()->createInputTel("number", "Telefonnummer");
$app->getForm()->createSubmit("Kolla");
$app->getForm()->close();

$app->renderFooter(); 

?>