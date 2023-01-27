<?php

declare(strict_types=1);

namespace App;

use App\Parser\TokenParser;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class PageHandler
{
    private DomCrawler $crawler;

    public function __construct(string $content)
    {
        $this->crawler = new DomCrawler($content);
    }

    public function setContent(string $content): void
    {
        $this->crawler->clear();
        $this->crawler->add($content);
    }

    public function getToken(): string
    {
        $inputTokenElement = $this->crawler
            ->filterXpath('//input[@id="token"]')
            ->first();

        return $inputTokenElement->attr('value');
    }

    public function getParsedToken(): string
    {
        $currentToken = $this->getToken();

        return TokenParser::parser($currentToken);
    }

    public function getAnswer(): string
    {
        $answerElement = $this->crawler
            ->filterXpath('//span[@id="answer"]')
            ->first();

        return $answerElement->text();
    }
}
