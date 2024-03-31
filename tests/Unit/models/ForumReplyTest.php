<?php

namespace Tests\Unit\Models;

use App\Models\ForumReply;
use Tests\TestCase;

/**
 * Class ForumReplyTest.
 *
 * @covers \App\Models\ForumReply
 */
final class ForumReplyTest extends TestCase
{
    private ForumReply $forumReply;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->forumReply = new ForumReply();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->forumReply);
    }

    public function testUser(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForum(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
