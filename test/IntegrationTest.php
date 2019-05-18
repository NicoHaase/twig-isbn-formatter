<?php

declare(strict_types=1);

use NicoHaase\TwigIsbnFormatter\IsbnFormatterExtension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class IntegrationTest extends TestCase
{
    /**
     * @dataProvider replacementProvider
     */
    public function testReplacement($input, $expectedOutput)
    {
        $twig = new Environment(new ArrayLoader());
        $twig->addExtension(new IsbnFormatterExtension());

        $template = $twig->createTemplate($input);
        $output = $twig->render($template);

        $this->assertEquals($expectedOutput, $output);
    }

    public static function replacementProvider()
    {
        yield ['', ''];
        yield ['Test', 'Test'];
        yield ['{{"9783411040162"|formatIsbn}}', '978-3-411-04016-2'];
        yield ['Text {{"9783411040162"|formatIsbn}} Text', 'Text 978-3-411-04016-2 Text'];
    }
}
