<?php

declare(strict_types=1);

use NicoHaase\TwigIsbnFormatter\IsbnFormatterExtension;
use PHPUnit\Framework\TestCase;

class IsbnFormatterExtensionTest extends TestCase
{
    /**
     * @dataProvider formattingProvider
     */
    public function testFormatting(string $input, string $expected)
    {
        $extension = new IsbnFormatterExtension();

        $output = $extension->formatIsbn($input);
        $this->assertEquals($expected, $output);
    }

    public static function formattingProvider()
    {
        yield ['9783411040162', '978-3-411-04016-2'];
    }
}
