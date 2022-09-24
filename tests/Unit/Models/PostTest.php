<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    private string $longText = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor '
    . 'invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores '
    . 'et ea rebum. Stet clita kasd gubergren, no sea. takimata.';

    public function testPostCanHaveSummary(): void
    {
        $post = new Post();
        $post->content = 'Lorem ipsum';

        self::assertEquals('Lorem ipsum', $post->summary);
    }

    public function testPostSummaryIsNotTooLong(): void
    {
        $correctText = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt '
        . 'ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et '
        . 'ea rebum. Stet clita kasd gubergren, no sea.';

        $post = new Post();
        $post->content = $this->longText;

        self::assertTrue(strlen($post->summary) <= 250);
        self::assertEquals($correctText, $post->summary);
    }

    public function testPostSummaryHasNoTags(): void
    {
        $post = new Post();
        $post->content = '<p>Lorem ipsum <strong>dolor</strong> sit amet</p>';

        self::assertEquals('Lorem ipsum dolor sit amet', $post->getSummaryAttribute());
    }
}
