<?php

class CApp
{
    function renderHeader(string $title)
    {
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo($title)?></title>
            <link rel="stylesheet" href="style/general.css">
        </head>
        <body>

        <?php
    }

    function renderFooter()
    {
        ?>

        <script src="script/tools.js"></script>
        </body>
        </html>

        <?php
    }
};

    $app = new CApp();
?>