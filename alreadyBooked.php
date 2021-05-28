<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 
$form = $app->getForm();

if(isset($_GET["personalCode"]))
{
    $personalCode = $_GET['personalCode'];

    $query = "SELECT `unix timestamp`, `namn`, `nummer`, `email`, `bord` FROM `booking` WHERE personalCode = $personalCode";
    $result = $app->getdb()->query($query);
    $data = $result->fetch_assoc();

    if($result->num_rows != 0)
    {
        $form->openDiv("unbookMSG");
        echo("<p>Din bokning</p>");
        echo("<p>Namn: " . $data["namn"] . "</p>");
        echo("<p>Bord: " . $data["bord"] . "</p>");
        echo("<p>Datum: " . date('d-m-Y H:i', $data['unix timestamp']) . "</p>");
        echo('<p><a class="unbook" href="unbook.php?personalCode=' . $personalCode . '">Avboka här</a></p>');
        $form->closeDiv();
    }
}

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];

    $query = "SELECT `unix timestamp`, `namn`, `nummer`, `email`, `bord`, personalCode FROM `booking` WHERE namn='$name' AND nummer='$number' AND email='$email'";
    $result = $app->getdb()->query($query);
    $data = $result->fetch_assoc();

    if($result->num_rows != 0)
    {
        $form->openDiv("unbookMSG");
        echo("<p>Din bokning</p>");
        echo("<p>Namn: " . $data["namn"] . "</p>");
        echo("<p>Bord: " . $data["bord"] . "</p>");
        echo("<p>Datum: " . date('d-m-Y H:i', $data['unix timestamp']) . "</p>");
        echo('<p><a class="unbook" href="unbook.php?personalCode=' . $data["personalCode"] . '">Avboka här</a></p>');
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