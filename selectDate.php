<?php
require_once("include/CApp.php");

$form = $app->getForm();

$app->renderHeader("Datum & Tid"); 

if(!empty($_POST))
{
    redirect("selectTable.php?dateAndTime=". strtotime($_POST["date"] . $_POST["time"]) . "");
}

echo('<h2>Välj datum och tid</h2>');

$form->openDiv("dateAndTime");
$form->openForm();
$form->createInput("date", "date", "Datum");
$form->createInput("time", "time", "Tid");
$form->createSubmit("Gå vidare");
$form->closeForm();
$form->closeDiv();


$app->renderFooter(); 

?>