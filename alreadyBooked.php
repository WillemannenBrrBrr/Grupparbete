<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 
$form = $app->getForm();

if(isset($_GET["personalCode"]))
{
    $personalCode = $_GET["personalCode"];

    $query = "SELECT `unix timestamp`, `namn`, `nummer`, `email`, `bord` FROM `booking` WHERE personalCode = $personalCode";
    $result = $app->getdb()->query($query);
    $data = $result->fetch_assoc();
    
    $name = $data["namn"];
    $number = $data["nummer"];
    $email = $data["email"];

    if($result->num_rows != 0)
    {
        echo("Din bokning" . "<br/>");
        echo("Namn: " . $data["namn"] . "<br/>");
        echo("Bord: " . $data["bord"] . "<br/>");
        echo("Datum: " . date('d-m-Y H:i', $data['unix timestamp']) . "<br/>");
        echo('<a class="unbook" href="unbook.php?bord=' . $data["bord"] . '&namn=' . $name . '&nummer=' . $number . '&email=' . $email . '">Avboka här</a>');
    }
}

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
        $form->openDiv("unbookMSG");
        echo("Din bokning" . "<br/>");
        echo("Namn: " . $data["namn"] . "<br/>");
        echo("Bord: " . $data["bord"] . "<br/>");
        echo("Datum: " . date('d-m-Y H:i', $data['unix timestamp']) . "<br/>");
        echo('<a class="unbook" href="unbook.php?bord=' . $data["bord"] . '&namn=' . $name . '&nummer=' . $number . '&email=' . $email . '">Avboka här</a>');
        $form->closeDiv();
    }
    else
    {
        echo('Du har ingen bokning');
    }
}

if(empty($_POST))
{
    if(!isset($_GET["personalCode"]))
    {
        echo('<h2>Fyll i samma uppgifter som vid bokningen</h2>');
        $form->openForm("alreadyBookedForm");
        $form->createInput("text", "name", "För- och Efternamn");
        $form->createInputTel("number", "Telefonnummer");
        $form->createInput("email", "email", "E-mail");
        $form->createSubmit("Se din bokning");
        $form->closeForm();
        $form->closeDiv();    
    }
}


$app->renderFooter(); 

?>