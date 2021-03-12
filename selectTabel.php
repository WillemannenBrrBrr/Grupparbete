<?php

require_once("include/CApp.php");

$app->renderHeader("Bords val"); 

$form = $app->getForm();

echo('<h1>Bords val</h1>');

$form->open("personalInfo");
$form->createInput("text", "name", "för/efternamn");
$form->createInput("number", "number", "telefonnummer");
$form->createInput("email", "email", "E-Mail");
$form->createSubmit("Boka");
$form->close(); 

$app->renderFooter(); 

?>