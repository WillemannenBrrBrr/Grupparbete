<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 
$app->renderStart();

$query = "SELECT id, `unix timestamp`, bord FROM booking WHERE 1";
$result = $app->getdb()->query($query);
$data = $result->fetch_assoc();

if($result->num_rows != 0)
{
    for($i = 1; $i <= $result->num_rows; $i++)
    {
        if(($data["unix timestamp"] + 7200) < time())
        {
            $query = "UPDATE tables SET available=1 WHERE id = " . $data["bord"] . "";
            $app->getdb()->query($query);

            $query = "DELETE FROM booking WHERE id = " . $data["id"] . "";
            $app->getdb()->query($query);
        }
    }
}

$app->renderFooter(); 

?>