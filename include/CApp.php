<?php

require_once("CFormCreator.php");

function print_r_pre($data)
{
    echo('<pre>');
    print_r($data);
    echo('</pre>');
}

class CApp
{
    public function __construct()
    {
        $this->m_formCreator = new CFormCreator($this);
    }

    public function renderHeader(string $title)
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

    public function renderFooter()
    {
        ?>

        <script src="script/tools.js"></script>
        </body>
        </html>

        <?php
    }

    public function &getForm() { return $this->m_formCreator; }

    //////////////////////////////////////////////////
    //variables
    private $m_formCreator = null;

};

    $app = new CApp();
?>