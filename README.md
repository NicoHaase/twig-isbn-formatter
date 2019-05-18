# ISBN formatter extension for Twig

Based on `nicebooks/isbn`, this tiny package provides two Twig filters such that ISBNs can be formatted simply.

## Installation

Just run `composer install nicohaase/twig-isbn-formatter`

## Available filters

- `formatIsbn` will add dashes where neccessary
- `toIsbn13` will provide a ISBN-13 out of any valid (ie. ISBN-10 or ISBN-13) input

## Examples
- `{{"9783411040162"|formatIsbn}}` will output `978-3-411-04016-2`
