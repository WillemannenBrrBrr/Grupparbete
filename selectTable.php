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

$form->openDiv("mapMarkers");
for($i = 1; $i <= 15; $i++)
{
    $query = "SELECT available FROM tables WHERE id='$i'";
    $result = $app->getdb()->query($query);
    $data = $result->fetch_assoc();

    if($data["available"] == 1)
    {
        $color = "rgb(0,255,0,0.3)";
    }
    else
    {
        $color = "rgb(255,0,0,0.5)";
    }

    echo('<div class="marker' . $i . '" style="background-color:' . $color . '">bord ' . $i . '</div>');
}
$form->closeDiv();

$form->openDiv("personalInfo");
echo('<img class="tableMap" src="img/Skiss_over_restaurang.png">');
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