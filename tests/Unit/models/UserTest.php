<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Tests\TestCase;

/**
 * Class UserTest.
 *
 * @covers \App\Models\User
 */
final class UserTest extends TestCase
{
    private User $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->user = new User();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->user);
    }

    public function testCanAccessPanel(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCanManageSettings(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCompany(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProfile(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testBlogs(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDeals(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testEvents(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForums(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testJobs(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProducts(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForumReplies(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testHasRated(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDelete(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testBookmarkCompanies(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testIsCompanyBookmarked(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
