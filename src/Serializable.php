<?php

namespace stsivin\RssWriter;

class Serializable
{
    /**
     * @var \XMLWriter
     */
    protected $handler = null;

    public function publish($handler)
    {
        $this->handler = $handler;
    }

    public function writeElement($name, $value = null, $attributes = null)
    {
        if (!empty($value) || !empty($attributes))
        {
            $this->handler->startElement($name);
            if (is_array($attributes) && count($attributes))
            {
                foreach($attributes as $attributeName => $attributeValue)
                {
                    $this->handler->writeAttribute($attributeName, $attributeValue);
                }
            }

            if (!empty($value))
            {
                $this->handler->text($value);
            }
            $this->handler->endElement();

        }
    }
}