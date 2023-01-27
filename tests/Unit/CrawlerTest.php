<?php

declare(strict_types=1);

namespace App\Test\Unit;

use App\Crawler;
use App\Exception\InvalidUrlException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

final class CrawlerTest extends TestCase
{
    public function testTryingToInstantiateACrawlerWithInvalidUrlMustFail(): void
    {
        $this->expectException(InvalidUrlException::class);

        $invalidUrl = 'teste/123';
        new Crawler($invalidUrl, HttpClient::create());
    }
}
