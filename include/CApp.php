<?php
require_once("CFormCreator.php");
require_once("CDatabase.php");

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
        $this->m_db = new CDatabase($this);
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
        <header></header>
        <section class="content">
            
            
        <body>

        <?php
    }

    public function renderStart()
    {
        ?>
            <div class="container">
                <div class="openingHours"><a href="">Öppettider</a></div>
                <div class="flexContainer">
                    <div class="bookTable"><a href="selectTable.php">Boka nu</a></div>
                    <div class="menu"><a href="menu.php">Se vår meny</a></div>
                </div>
                <div class="alreadyBooked"><a href="alreadyBooked.php">Har du redan bokat ett bord? Se din bokning här</a></div>
            </div>
        <?php
    }

    public function renderFooter()
    {
        ?>
        <footer>
            <div class="footerLeft">Kontakt/Info</div>
            <div class="footerRight">Sociala medier</div>
        </footer>
        <script src="script/tools.js"></script>
        </section>
        </body>
        </html>

        <?php
    }

    public function &getForm()      { return $this->m_formCreator; }
    public function &getDB()        { return $this->m_db; }

    //////////////////////////////////////////////////
    //variables
    private $m_formCreator = null;
    private $m_db = null;

};

    $app = new CApp();
?>