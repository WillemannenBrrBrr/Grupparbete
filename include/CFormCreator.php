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

    public function createInputTime()
    {
        
    }

    public function createInput(string $type, string $name, string $label)
    {
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="' . $type . '" name="' . $name . '" id="' . $name . '">');
    }

    public function createInputTel(string $name, string $label)
    {
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="tel" name="' . $name . '" id="' . $name . '" pattern="[0-9]{10}">');
    }

    public function createInputNumber(string $name, string $label, int $min, int $max)
    {
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="number" name="' . $name . '" id="' . $name . '" min="' . $min . '" max="' . $max . '">');
    }

    public function createSubmit(string $label)
    {
        echo('<input type="submit" value="' . $label . '">');
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