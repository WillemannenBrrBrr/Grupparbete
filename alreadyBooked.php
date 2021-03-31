<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];

    $query = "SELECT `namn`, `nummer`, `email`, `bord` FROM `booking` WHERE namn='$name' AND nummer='$number' AND email='$email'";
    $result = $app->getdb()->query($query);
    if($result->num_rows != 0)
    {
        echo('Din bokning');
    }
    else
    {
        echo('Du har ingen bokning');
    }
}

$app->getForm()->open("alreadyBookedForm");
$app->getForm()->createInput("text", "name", "För/Efternamn");
$app->getForm()->createInput("email", "email", "E-mail");
$app->getForm()->createInputTel("number", "Telefonnummer");
$app->getForm()->createSubmit("Se din bokning");
$app->getForm()->close();

$app->renderFooter(); 

?>