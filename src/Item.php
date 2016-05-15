<?php

namespace stsivin\RssWriter;

class Item extends Serializable
{
    public $title;
    public $link;
    public $description;
    public $author;
    public $pdaLink;

    /** @var  integer pubDate unix timestamp */
    public $pubDate;

    /** @var  Serializable */
    public $enclosure;

    public function __construct($kwArgs)
    {
        $requiredElements = ['title', 'link', 'description', 'author', 'pubDate'];

        foreach($requiredElements as $element)
        {
            if (empty($kwArgs[$element]))
                throw new ElementRequiredError($element);
        }

        $this->title = $kwArgs['title'];
        $this->link = $kwArgs['link'];
        $this->description = $kwArgs['description'];
        $this->author = $kwArgs['author'];
        $this->pdaLink = !empty($kwArgs['pdaLink']) ? $kwArgs['pdaLink'] : $kwArgs['link'];
        $this->pubDate = $kwArgs['pubDate'];
    }

    public function publish($handler)
    {
        parent::publish($handler);
        $this->handler->startElement("item");
        $this->handler->writeElement("title", $this->title);
        $this->handler->writeElement("link", $this->link);
        $this->handler->writeElement("description", $this->description);
        $this->handler->writeElement("author", $this->author);
        $this->handler->writeElement("pubDate", date(DATE_RSS, $this->pubDate));

        if (!empty($this->pdaLink))
        {
            $this->handler->writeElement("pdaLink", $this->pdaLink);
        }

        if (!empty($this->enclosure))
        {
            $this->enclosure->publish($this->handler);
        }
        $this->handler->endElement();
    }
}