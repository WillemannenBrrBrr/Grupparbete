<?php

require_once("include/CApp.php");

$app->renderHeader("Bordsval"); 

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $table = $_POST["table"];

    $query = "SELECT bord FROM booking WHERE id = $table";
    $result = $app->getdb()->query($query);
    
    if($result->num_rows == 0)
    {
        die("bordet är redan bokat");
    }

    $query = "INSERT INTO `booking` (`namn`, `nummer`, `email`, `bord`) 
    VALUES ('$name', '$number', '$email', '$table')";
    $app->getdb()->query($query);

    $query = "UPDATE `tables` SET `available`= 0 WHERE id = $table";
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