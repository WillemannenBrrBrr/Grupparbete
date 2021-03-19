<?php

require_once("include/CApp.php");

$app->renderHeader("Bords val"); 

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $table = $_POST["table"];

    $query = "INSERT INTO `booking` (`namn`, `nummer`, `email`, `bord`) 
    VALUES ('$name', '$number', '$email', '$table')";

    $app->getdb()->query($query);
}

echo('<h1>Bords val</h1>');

$app->getForm()->open("personalInfo");
$app->getForm()->createInput("text", "name", "För/Efternamn");
$app->getForm()->createInputTel("number", "Telefonnummer");
$app->getForm()->createInput("email", "email", "E-Mail");
$app->getForm()->createInputNumber("table", "Bord", "1", "15");
$app->getForm()->createSubmit("Boka");
$app->getForm()->close(); 



$app->renderFooter(); 

?>