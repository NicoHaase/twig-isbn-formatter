<?php

declare(strict_types=1);

namespace NicoHaase\TwigIsbnFormatter;

use Nicebooks\Isbn\Exception\InvalidIsbnException;
use Nicebooks\Isbn\Isbn;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class IsbnFormatterExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('formatIsbn', [$this, 'formatIsbn']),
            new TwigFilter('toIsbn13', [$this, 'toIsbn13'])
        ];
    }

    public function toIsbn13(string $input): string
    {
        try {
            $isbn = Isbn::of($input);
            return $isbn->to13()->__toString();
        } catch (InvalidIsbnException $ex) {
        }
        return $input;
    }

    public function formatIsbn(string $input): string
    {
        try {
            $isbn = Isbn::of($input);
            $isbn13 = $isbn->to13();
            return $isbn13->format();
        } catch (InvalidIsbnException $ex) {
        }
        return $input;
    }
}
