<?php
require_once("include/CApp.php");

$form = $app->getForm();

$app->renderHeader("Välj tid och datum"); 

if(!empty($_POST))
{
    redirect("selectTable.php?dateAndTime=". strtotime($_POST["date"] . $_POST["time"]) . "");
}

$form->openDiv("dateAndTime");
$form->openForm();
$form->createInput("date", "date", "Datum");
$form->createInput("time", "time", "Tid");
$form->createSubmit("Välj bord");
$form->closeForm();
$form->closeDiv();


$app->renderFooter(); 

?>