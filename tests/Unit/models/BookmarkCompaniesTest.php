<?php

namespace Tests\Unit\Models;

use App\Models\BookmarkCompanies;
use Tests\TestCase;

/**
 * Class BookmarkCompaniesTest.
 *
 * @covers \App\Models\BookmarkCompanies
 */
final class BookmarkCompaniesTest extends TestCase
{
    private BookmarkCompanies $bookmarkCompanies;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->bookmarkCompanies = new BookmarkCompanies();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->bookmarkCompanies);
    }

    public function testCompany(): void
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
