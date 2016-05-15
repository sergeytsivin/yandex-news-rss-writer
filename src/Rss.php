<?php

namespace stsivin\RssWriter;

class Rss extends Serializable
{
    public $title;
    public $link;
    public $description;

    /**
     * @var array Item
     */
    public $items = [];

    public function __construct($kwArgs)
    {
        $requiredElements = ['title', 'link', 'description'];

        foreach($requiredElements as $element)
        {
            if (empty($kwArgs[$element]))
                throw new ElementRequiredError($element);
        }

        $this->title = $kwArgs['title'];
        $this->link = $kwArgs['link'];
        $this->description = $kwArgs['description'];
    }

    public function rss()
    {
        $handler = new \XMLWriter();
        $handler->openMemory();
        $handler->setIndent(true);

        $handler->startDocument('1.0', 'utf-8');

        $handler->startElement('rss');
        $this->publish($handler);
        $handler->endElement();

        $handler->endDocument();

        return $handler->outputMemory();

    }

    public function publish($handler)
    {
        parent::publish($handler);
        $this->handler->startElement("channel");
        $this->handler->writeElement("title", $this->title);
        $this->handler->writeElement("link", $this->link);
        $this->handler->writeElement("description", $this->description);
        foreach($this->items as $item)
        {
            /** @var Item $item */
            $item->publish($handler);
        }
        $this->handler->endElement();
    }
}