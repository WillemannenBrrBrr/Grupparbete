<?php

require_once("include/CApp.php");

$app->renderHeader("Bordsval"); 

$form = $app->getForm();
$selectedTime = $_GET["dateAndTime"];

$query = "SELECT `unix timestamp`, bord FROM booking WHERE 1";
$bookingInfo = $app->getdb()->query($query);

$orders = [];
while($timeAndTable = $bookingInfo->fetch_assoc())
{
    $orders[] = $timeAndTable;
}

$form->openDiv("personalInfo");
$form->openDiv("mapMarkers");

for($i = 1; $i <= 15; $i++)
{
    $color = "rgb(50,255,50)";

    foreach($orders as $timeAndTable)
    {
        if($timeAndTable["bord"] == $i)
        {
            if($selectedTime > ($timeAndTable["unix timestamp"] - 7200) && $selectedTime < ($timeAndTable["unix timestamp"] + 7200))
            {
                $color = "rgb(255,50,50)";
                $booked = $i;
            }
        }
    }

    if($i == 1 || $i == 2)
    {
        $peoplePerTable = $i ."</br>" . "6p";
    }
    else if($i == 3 || $i == 4 || $i == 5 || $i == 6 || $i == 8 || $i == 9)
    {
        $peoplePerTable = $i ."</br>" . "4p";
    }
    else if($i == 7 || $i == 10 || $i == 11 || $i == 12 || $i == 14 || $i == 15)
    {
        $peoplePerTable = $i ."</br>" . "2p";
    }
    else if($i == 13)
    {
        $peoplePerTable = $i ."</br>" . "5p";
    }

    echo('<div class="marker table' . $i . '" style="background-color:' . $color . '">bord ' . $peoplePerTable . '</div>');
}

if(!empty($_POST))
{
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $table = $_POST["table"];
    $amount = $_POST["people"];

    if(isset($booked) && $table == $booked)
    {
        echo("Bordet är redan bokat");
    }
    else
    {
        $query = "INSERT INTO booking (`unix timestamp`, namn, nummer, email, bord) 
        VALUES ('$selectedTime', '$name', '$number', '$email', '$table')";
        $app->getdb()->query($query);

        redirect("verification.php?table=$table&time=$selectedTime");
    }
}

$form->closeDiv();
$form->openForm();
$form->createInput("text", "name", "För/Efternamn");
$form->createInputTel("number", "Telefonnummer");
$form->createInput("email", "email", "E-Mail");
$form->createInputNumber("table", "Bord", "1", "15");
$form->createInputNumber("people", "Antal folk", "1", "6");
$form->createSubmit("Boka bord");
$form->closeForm();
$form->closeDiv();

$app->renderFooter(); 

?>