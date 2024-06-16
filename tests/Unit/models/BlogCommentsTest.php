<?php

namespace Tests\Unit\Models;

use App\Models\BlogComments;
use Tests\TestCase;

/**
 * Class BlogCommentsTest.
 *
 * @covers \App\Models\BlogComments
 */
final class BlogCommentsTest extends TestCase
{
    private BlogComments $blogComments;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->blogComments = new BlogComments();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->blogComments);
    }

    public function testBlog(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUser(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
