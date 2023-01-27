<?php

declare(strict_types=1);

use App\Crawler;
use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__.'/../vendor/autoload.php';

$client = HttpClient::create();
$crawler = new Crawler('http://applicant-test.us-east-1.elasticbeanstalk.com/', $client);

echo 'A resposta é: '.$crawler->seekAnswer().PHP_EOL;
