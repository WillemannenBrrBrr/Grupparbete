<?php
require_once("include/CApp.php");

$app->renderHeader("Home"); 
$app->renderStart();

$query = "SELECT id, `unix timestamp`, bord FROM booking WHERE 1";
$result = $app->getdb()->query($query);

$orders = [];
while($data = $result->fetch_assoc())
{
    $orders[] = $data;
}

if($result->num_rows != 0)
{
    foreach($orders as $data)
    {
        if(($data["unix timestamp"] + 7200) < time())
        {
            $query = "DELETE FROM booking WHERE id = " . $data["id"] . "";
            $app->getdb()->query($query);
        }
    }
}

$app->renderFooter(); 

?>