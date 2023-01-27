<?php

declare(strict_types=1);

namespace App\Test\Unit;

use App\PageHandler;
use PHPUnit\Framework\TestCase;

final class PageHandlerTest extends TestCase
{
    public const FORM_PAGE_CONTENT = <<<'HTML'
        <html>
            <head>
            </head>
            <body>
            <form action="/" method="post" id="form">
                <input type="hidden" name="token" id="token" value="4049671w92956zvu09zw2wwux5056zu0" />
                <input type="button" value="Descobrir resposta" onClick="findAnswer()">
            </form>
            </body>
        </html>
    HTML;

    public const ANSWER_PAGE_CONTENT = <<<'HTML'
        <html>
            <head>
            </head>
            <body>
                <span id="answer">58</span>
            </body>
        </html>
    HTML;

    public function testGetTokenIsValid(): void
    {
        $pageHandler = new PageHandler(self::FORM_PAGE_CONTENT);

        $this->assertEquals('4049671w92956zvu09zw2wwux5056zu0', $pageHandler->getToken());
    }

    public function testGetParsedTokenIsValid(): void
    {
        $pageHandler = new PageHandler(self::FORM_PAGE_CONTENT);

        $this->assertEquals('5950328d07043aef90ad7ddfc4943af9', $pageHandler->getParsedToken());
    }

    public function testGetValidAnswer(): void
    {
        $pageHandler = new PageHandler(self::ANSWER_PAGE_CONTENT);
        $answer = $pageHandler->getAnswer();

        $this->assertIsString($answer);
        $this->assertEquals('58', $answer);
    }
}
