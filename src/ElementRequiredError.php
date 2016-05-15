<?php

namespace stsivin\RssWriter;

class ElementRequiredError extends \Exception
{
    public function __construct($element)
    {
        parent::__construct("Required element $element is missing");
    }
}