<?php

declare(strict_types=1);

namespace App\Test\Unit\Parser;

use App\Parser\TokenParser;
use PHPUnit\Framework\TestCase;

final class TokenParserTest extends TestCase
{
    public function testCanGenerateParsedToken(): void
    {
        $parsedToken = TokenParser::parser('8952788xw42v1y47wx476x08zzxv5515');

        $this->assertIsString($parsedToken);
        $this->assertEquals('1047211cd57e8b52dc523c91aace4484', $parsedToken);
    }
}
