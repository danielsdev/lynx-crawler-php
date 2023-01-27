<?php

declare(strict_types=1);

namespace App\Test\Functional;

use App\Crawler;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

final class SeekAnswerTest extends TestCase
{
    public const URL = 'http://applicant-test.us-east-1.elasticbeanstalk.com/';

    public function testSeekTheAnswer(): void
    {
        $client = HttpClient::create();
        $crawler = new Crawler(self::URL, $client);
        $answer = $crawler->seekAnswer();

        $this->assertIsString($answer);
    }
}
