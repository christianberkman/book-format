<?php

use PHPUnit\Framework\TestCase;

class SortableTitleTest extends TestCase
{
    public function testDefaultArticles()
    {
        // Beautiful Code, The
        $values = ['the beautiful code', 'The Beautiful Code', ' The  Beautiful Code', 'beautiful code, the'];
        foreach ($values as $value) {
            $this->assertSame('Beautiful Code, The', sortableTitle($value), "Value: {$value}");
        }

        // Beautiful Code, A
        $values = ['a beautiful code', 'A Beautiful Code', ' A  Beautiful Code', 'beautiful code, a'];
        foreach ($values as $value) {
            $this->assertSame('Beautiful Code, A', sortableTitle($value), "Value: {$value}");
        }

        // Excellent Code, An
        $values = ['an excellent code', 'An Excellent Code', ' An  Excellent Code', 'excellent code, an'];
        foreach ($values as $value) {
            $this->assertSame('Excellent Code, An', sortableTitle($value), "Value: {$value}");
        }
    }

    public function testCustomArticles()
    {
        $customArticles = ['de', 'het', 'een'];
        $articles = implode('|', $customArticles);
        $testTitle = 'is a custom article';

        foreach ($customArticles as $customArticle) {
            $value = "{$customArticle} {$testTitle}";
            $expected = ucwords($testTitle) .', '. ucfirst($customArticle);

            $this->assertSame($expected, sortableTitle($value, true, $articles), "Value: {$value}");
        }
    }

    public function testEmptyValue()
    {
        $this->assertNull(sortableTitle(null));
        $this->assertEmpty(sortableTitle(''));
        $this->assertEmpty(sortableTitle(' '));
    }

    public function testWhiteSpace()
    {
        $this->assertSame('Beautiful Code, The', sortableTitle('the   beautiful code', true));
        $this->assertSame('Beautiful  Code, The', sortableTitle('Beautiful  Code, The', false));
    }

}
