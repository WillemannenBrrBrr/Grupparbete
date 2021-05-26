<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];

    
    $query = "SELECT `unix timestamp`, `namn`, `nummer`, `email`, `bord` FROM `booking` WHERE namn='$name' AND nummer='$number' AND email='$email'";
    $result = $app->getdb()->query($query);
    $data = $result->fetch_assoc();
    
    if($result->num_rows != 0)
    {
        echo("Din bokning" . "<br/>");
        echo("Namn: " . $data["namn"] . "<br/>");
        echo("Bord: " . $data["bord"] . "<br/>");
        echo("Datum: " . date('d-m-Y H:i', $data['unix timestamp']) . "<br/>");
        echo('<a class="unbook" href="unbook.php?bord=' . $data["bord"] . '&namn=' . $name . '&nummer=' . $number . '&email=' . $email . '">Avboka här</a>');
    }
    else
    {
        echo('Du har ingen bokning');
    }
}

echo('<h2>Fyll i samma uppgifter som vid bokningen</h2>');
$app->getForm()->openForm("alreadyBookedForm");
$app->getForm()->createInput("text", "name", "För- och Efternamn");
$app->getForm()->createInputTel("number", "Telefonnummer");
$app->getForm()->createInput("email", "email", "E-mail");
$app->getForm()->createSubmit("Se din bokning");
$app->getForm()->closeForm();
$app->getForm()->closeDiv();

$app->renderFooter(); 

?>