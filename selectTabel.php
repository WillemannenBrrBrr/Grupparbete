<?php

require_once("include/CApp.php");

$app->renderHeader("Bords val"); 

$form = $app->getForm();

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = "0" . $_POST["number"];
    $email = $_POST["email"];
    $table = $_POST["table"];

    $query = "INSERT INTO `booking` (`namn`, `nummer`, `email`, `bord`) 
    VALUES ('$name', '$number', '$email', '$table')";

    $app->getdb()->query($query);
}

echo('<h1>Bords val</h1>');

$form->open("personalInfo");
$form->createInput("text", "name", "För/Efternamn");
$form->createInputTel("number", "Telefonnummer");
$form->createInput("email", "email", "E-Mail");
$form->createInputNumber("table", "Bord", "1", "15");
$form->createSubmit("Boka");
$form->close(); 



$app->renderFooter(); 

?>