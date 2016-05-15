<?php

$oXMLout = new XMLWriter();
$oXMLout->openMemory();
$oXMLout->setIndent(true);
$oXMLout->startDocument('1.0', 'utf-8');
    $oXMLout->startElement('rss');
        $oXMLout->writeAttributeNs('xmlns', 'yandex', null, "http://news.yandex.ru");
        $oXMLout->startElement("quantity");
        $oXMLout->writeAttribute("annotation", "Proctor&Gamble > Moody's \"incredible\"");
        $oXMLout->text("Агентство Moody's  < компания > Proctor&Gamble");
        $oXMLout->endElement();
        $oXMLout->writeElement("name", "Агентство Moody's  < компания > Proctor&Gamble" );
        $oXMLout->writeElement("price_per_quantity", 110);
        $oXMLout->writeElementNs('yandex', 'full-text', null, "Агентство Moody's  < компания > Proctor&Gamble");
    $oXMLout->endDocument();
$oXMLout->endDocument();
print $oXMLout->outputMemory();