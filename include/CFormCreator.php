<?php

class CFormCreator
{
    public function __construct(CApp &$app)
    {
        $this->m_app = $app;
    }

    public function openDiv(string $class)
    {
        echo('<div class="' . $class . '">');
    }

    public function openForm()
    {
        echo('<form method="post">');
    }

    public function createInput(string $type, string $name, string $label)
    {
        echo('<div class="flexForm">');
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="' . $type . '" name="' . $name . '" id="' . $name . '" required>');
        echo('</div>');
    }

    public function createInputTel(string $name, string $label)
    {
        echo('<div class="flexForm">');
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="tel" name="' . $name . '" id="' . $name . '" pattern="[0-9]{10}">');
        echo('</div>');
    }

    public function createInputNumber(string $name, string $label, int $min, int $max)
    {
        echo('<div class="flexForm">');
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="number" name="' . $name . '" id="' . $name . '" min="' . $min . '" max="' . $max . '">');
        echo('</div>');
    }

    public function createSubmit(string $label)
    {
        echo('<div class="flexForm">');
        echo('<input type="submit" value="' . $label . '">');
        echo('</div>');
    }

    public function closeForm()
    {
        echo('</form>');
    }

    public function closeDiv()
    {
        echo('</div>');
    }

    //////////////////////////////////////////////////
    //variables

    private $m_app = null;

};

?>