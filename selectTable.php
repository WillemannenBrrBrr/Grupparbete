<?php

require_once("include/CApp.php");

$app->renderHeader("Bordsval"); 

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $table = $_POST["table"];

    $query = "SELECT `available` FROM `tables` WHERE id = $table";
    $result = $app->getdb()->query($query);
    $data = $result->fetch_assoc();
    
    if($data["available"] == 0)
    {
        echo("bordet är redan bokat");
    }
    else 
    {
        $query = "INSERT INTO `booking` (`namn`, `nummer`, `email`, `bord`) 
        VALUES ('$name', '$number', '$email', '$table')";
        $app->getdb()->query($query);
        
        $query = "UPDATE `tables` SET `available`= 0 WHERE id = $table";
        $app->getdb()->query($query);
    }
    
}

$app->getForm()->openDiv("personalInfo");
echo('<img class="tableMap" src="img/Skiss_over_restaurang.png">');
$app->getForm()->open();
$app->getForm()->createInput("text", "name", "För/Efternamn");
$app->getForm()->createInputTel("number", "Telefonnummer");
$app->getForm()->createInput("email", "email", "E-Mail");
$app->getForm()->createInputNumber("table", "Bord", "1", "15");
$app->getForm()->createSubmit("Boka");
$app->getForm()->close(); 



$app->renderFooter(); 

?>