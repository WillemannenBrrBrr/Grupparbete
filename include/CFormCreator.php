<?php

class CFormCreator
{
    public function __construct(CApp &$app)
    {
        $this->m_app = $app;
    }

    public function open(string $class)
    {
        echo('<div class="' . $class . '">');
        echo('<form method="post">');
    }

    public function createInput(string $type, string $name, string $label)
    {
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="' . $type . '" name="' . $name . '" id="' . $name . '">');
    }

    public function createInputTel(string $name, string $label)
    {
        echo('<label for="' . $name . '">' . $label . ':</label>');
        echo('<input type="tel" name="' . $name . '" id="' . $name . '" pattern="[0-9]{10}"');
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

    public function close()
    {
        echo('</form>');
        echo('</div');
    }

    //////////////////////////////////////////////////
    //variables

    private $m_app = null;

};

?>