## stsivin\RssWriter

Generates RSS feed for yandex news agregator, see https://news.yandex.ru

Internally it uses `XMLWriter` to generate XML, so it can efficiently generate large RSS feeds with full-text articles.

It is inspired by Santiago Valdarrama's [rfeed](https://github.com/svpino/rfeed)

## Example

```php

<?php

use \stsivin\RssWriter\Item;
use \stsivin\RssWriter\Rss;

$item1 = new Item([
    'title' => "First article",
    'link' => "http://www.example.com/articles/1",
    'author' => "Jordano Bruno",
    'description' => "This is the description of the first article",
    'pubDate' => strtotime("Sun May 15 17:32:35 MSK 2016")
]);

$item2 = new Item([
    'title' => "Second article",
    'link' => "http://www.example.com/articles/2",
    'author' => 'Isaac Newton',
    'description' => "This is the description of the second article",
    'pubDate' => strtotime("Sun May 15 16:12:35 MSK 2016")
]);


$feed = new Rss([
    'title' => "Sample RSS Feed",
    'link' => "http://www.example.com/rss",
    'description' => "This is an example of how to use rfeed to generate an RSS 2.0 feed",
]);

$feed->items = [$item1, $item2];

print $feed->rss();

```


## License

[MIT Licence](https://github.com/svpino/rfeed/blob/master/LICENSE)

Copyright (c) 2016 Sergey Tsivin