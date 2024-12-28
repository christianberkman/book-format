<?php

use PHPUnit\Framework\TestCase;

class SortableAuthorTest extends TestCase
{
    public function testNoInitials()
    {
        // Lewis
        $values = ['Lewis', 'lewis', ' Lewis', '    lewis '];

        foreach ($values as $value) {
            $this->assertSame('Lewis', sortableAuthor($value), "Value: {$value}");
        }
    }

    public function testSingleInitials()
    {
        // Shakespeare, W.
        $values = ['Shakespeare, W.', 'w shakespeare', 'W shakespeare', 'w. shakespeare', ' w shakespeare', 'shakespeare, w', 'shakespeare,  w'];

        foreach ($values as $value) {
            $this->assertSame('Shakespeare, W.', sortableAuthor($value), "Value: {$value}");
        }
    }

    public function testMultipleInitials()
    {
        // Lewis, C.S.
        $values = ['Lewis, C. S.', 'C. S. Lewis', 'c s lewis', 'lewis  c  s', 'c  s lewis ', 'C.S. Lewis'];

        foreach ($values as $value) {
            $this->assertSame('Lewis, C.S.', sortableAuthor($value), "Value: {$value}");
        }
    }

    public function testHyphen()
    {
        // Berkman-Schinnell, K.M
        $values = ['Berkman-Schinnell, K.M.', 'berkman-schinnell k m', 'k m berkman-Schinnell'];

        foreach ($values as $value) {
            $this->assertSame('Berkman-Schinnell, K.M.', sortableAuthor($value), "Value: {$value}");
        }

    }

    public function testApostrophe()
    {
        // O'Neill
        $this->assertSame("O'Neill", sortableAuthor("O'Neill"));

        // O'Neill, L'
        $this->assertSame("O'Neill, L.", sortableAuthor("O'Neill L"));
        $this->assertSame("O'Neill, L.", sortableAuthor("L O'Neill"));
    }

}
