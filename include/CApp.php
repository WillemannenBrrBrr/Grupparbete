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
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" 
            integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        </head>
        <header>

        </header>
        <section class="container">
        <body>

        <?php
    }

    public function renderFooter()
    {
        ?>

        <script src="script/tools.js"></script>
        </section>
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