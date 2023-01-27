<?php

declare(strict_types=1);

namespace App;

use App\Exception\InvalidUrlException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class Crawler
{
    public function __construct(
        private readonly string $url,
        private readonly HttpClientInterface $client
    ) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidUrlException("Invalid URL: $url");
        }
    }

    public function seekAnswer(): string
    {
        $response = $this->client->request('GET', $this->url);
        $pageHandler = new PageHandler($response->getContent());

        $response = $this->client->request('POST', $this->url, [
            'headers' => [
                'Referer' => $this->url,
                'Cookie' => $response->getHeaders()['set-cookie'][0],
            ],
            'body' => [
                'token' => $pageHandler->getParsedToken(),
            ],
        ]);

        $pageHandler->setContent($response->getContent());

        return $pageHandler->getAnswer();
    }
}
