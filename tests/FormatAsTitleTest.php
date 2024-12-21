<?php

use PHPUnit\Framework\TestCase;

class FormatAsTitleTest extends TestCase
{
    public function testDefaultArticles()
    {
        // Beautiful Code, The
        $values = ['the beautiful code', 'The Beautiful Code', ' The  Beautiful Code', 'beautiful code, the'];
        foreach ($values as $value) {
            $this->assertSame('Beautiful Code, The', formatAsTitle($value), "Value: {$value}");
        }

        // Beautiful Code, A
        $values = ['a beautiful code', 'A Beautiful Code', ' A  Beautiful Code', 'beautiful code, a'];
        foreach ($values as $value) {
            $this->assertSame('Beautiful Code, A', formatAsTitle($value), "Value: {$value}");
        }

        // Excellent Code, An
        $values = ['an excellent code', 'An Excellent Code', ' An  Excellent Code', 'excellent code, an'];
        foreach ($values as $value) {
            $this->assertSame('Excellent Code, An', formatAsTitle($value), "Value: {$value}");
        }
    }

    public function testCustomArticles()
    {
        $customArticles = ['de', 'het', 'een'];
        $testTitle = 'is a custom article';

        foreach ($customArticles as $customArticle) {
            $value = "{$customArticle} {$testTitle}";
            $expected = ucwords($testTitle) .', '. ucfirst($customArticle);

            $this->assertSame($expected, formatAsTitle($value, true, $customArticles), "Value: {$value}");
        }
    }

    public function testEmptyValue()
    {
        $this->assertNull(formatAsTitle(null));
        $this->assertEmpty(formatAsTitle(''));
        $this->assertEmpty(formatAsTitle(' '));
    }

    public function testWhiteSpace()
    {
        $this->assertSame('Beautiful Code, The', formatAsTitle('the   beautiful code', true));
        $this->assertSame('Beautiful  Code, The', formatAsTitle('Beautiful  Code, The', false));
    }

}
