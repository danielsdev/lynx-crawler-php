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

    private function submitForm(array $formData, string $cookie): string
    {
        $response = $this->client->request('POST', $this->url, [
            'headers' => [
                'Referer' => $this->url,
                'Cookie' => $cookie,
            ],
            'body' => $formData,
        ]);

        return $response->getContent();
    }

    public function seekAnswer(): string
    {
        $response = $this->client->request('GET', $this->url);
        $pageHandler = new PageHandler($response->getContent());

        $answerPageContent = $this->submitForm(
            [
                'token' => $pageHandler->getParsedToken(),
            ],
            $response->getHeaders()['set-cookie'][0] ?? ''
        );
        $pageHandler->setContent($answerPageContent);

        return $pageHandler->getAnswer();
    }
}
