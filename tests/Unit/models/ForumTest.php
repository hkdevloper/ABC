<?php

namespace Tests\Unit\Models;

use App\Models\Forum;
use Tests\TestCase;

/**
 * Class ForumTest.
 *
 * @covers \App\Models\Forum
 */
final class ForumTest extends TestCase
{
    private Forum $forum;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->forum = new Forum();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->forum);
    }

    public function testCompany(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCategory(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForumReplies(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCountAnswers(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDelete(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
