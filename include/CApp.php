<?php
require_once("CFormCreator.php");
require_once("CDatabase.php");

function print_r_pre($data)
{
    echo('<pre>');
    print_r($data);
    echo('</pre>');
}

function redirect(string $url)
{
	header("location: $url");
	die();
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
            <link rel="icon" href="img/favicon.ico" alt="favicon"/>
        </head>
        <body>
        <header>
        </header>
        <nav class="flexMenu">
            <span class="navbarResponsive" id="jsNavbarResponsive">
                <i class="fas fa-bars"></i>
            </span>
            <a id="logo" href="index.php"><img src="img/logoNav.png" alt="Logga Meny"></a>
            <ul class="mainNav" id="jsMenu">
                <li><a href="restaurantMenu.php">Meny</a></li>
                <li><a href="openingHours.php">Öppettider</a></li>
                <li><a href="contact.php">Kontakt</a></li>
            </ul>
        </nav>
        <section class="content">
            
            
        

        <?php
    }

    public function renderStart()
    {
        ?>
            <div class="container">
                    <div class="flexContainer">
                        <div class="bookTable"><a href="selectDate.php">Boka nu</a></div>
                        <div class="alreadyBooked">Har du redan bokat ett bord? Se din bokning <a href="alreadyBooked.php">här</a></div>
                    </div>
            </div>
        <?php
    }

    public function renderFooter()
    {
        ?>
        </section>
        <footer>
            <img src="img/logoFooter.png" alt="Logga Footer" class="logoFooter">
            <p>Bosses Restaurang | Stenmarksvägen 13 | 0240-34721 | bosses@restaurang.se </p>
            <p>Copyright © Bosses Restaurang -2021</p>
        </footer>
        <script src="script/tools.js"></script>
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