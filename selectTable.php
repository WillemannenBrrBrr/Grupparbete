<?php

require_once("include/CApp.php");

$form = $app->getForm();

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



$form->openDiv("personalInfo");
$form->openDiv("mapMarkers");
for($i = 1; $i <= 15; $i++)
{
    $query = "SELECT available FROM tables WHERE id='$i'";
    $result = $app->getdb()->query($query);
    $data = $result->fetch_assoc();

    if($data["available"] == 1)
    {
        $color = "rgb(50,255,50)";
    }
    else
    {
        $color = "rgb(255,50,50)";
    }
    
    if($i == 1 || $i == 2)
    {
        $tableInfo = $i ."</br>" . "6p";
    }
    else if($i == 3 || $i == 4 || $i == 5 || $i == 6 || $i == 8 || $i == 9)
    {
        $tableInfo = $i ."</br>" . "4p";
    }
    else if($i == 7 || $i == 10 || $i == 11 || $i == 12 || $i == 14 || $i == 15)
    {
        $tableInfo = $i ."</br>" . "2p";
    }
    if($i == 13)
    {
        $tableInfo = $i ."</br>" . "5p";
    }

    echo('<div class="marker table' . $i . '" style="background-color:' . $color . '">bord ' . $tableInfo . '</div>');
}
$form->closeDiv();
$form->openForm();
$form->createInput("text", "name", "För/Efternamn");
$form->createInputTel("number", "Telefonnummer");
$form->createInput("email", "email", "E-Mail");
$form->createInputNumber("table", "Bord", "1", "15");
$form->createSubmit("Boka");
$form->closeForm();
$form->closeDiv();

$app->renderFooter(); 

?>