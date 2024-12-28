# Sortable Book
Make the title and author sortable for use in a library inventory by moving the article and initials to the end of the string.

This package contains does not contain a class but two helper functions `sortableAuthor()` and `sortableTitle()`.sw

## Installation
### Via Composer
```bash
composer require chhristianberkman/sortable-book
```
The file `sortable-book.php` will be autoloaded.

### Manually
```php
require('src/sortable-book.php');
```

## Usage

```php
$author = sortableAuthor('C.S. Lewis');
// Lewis, C.S.

$title = sortableTitle('The Last Battle');
// Last Battle, The
```

## Function reference

### sortableAuthor(*?string $value*): ?string

Make a book author sortable by moving initials to the end of the string, preceded by a comma and a space

* `string $value` string to format

### sortableTitle(*?string $value, bool $makeSingleSpaces = true, ?string $articles = 'a|an|the'* ): ?string

Make a book title sortable by moving tha article to the end of the string, preceded by a comma and a space.
* `string $value` string to format
* `bool $makeSingleSpaces` convert all whitepaces to a single whitespace
* `string $articles` list of articles seperated by `|`, defaults to 'a|an|the'

*Returns* `string` or `null`
