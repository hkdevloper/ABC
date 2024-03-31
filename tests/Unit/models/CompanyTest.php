<?php

namespace Tests\Unit\Models;

use App\Models\Company;
use Tests\TestCase;

/**
 * Class CompanyTest.
 *
 * @covers \App\Models\Company
 */
final class CompanyTest extends TestCase
{
    private Company $company;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->company = new Company();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->company);
    }

    public function testUser(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testJobs(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testEvents(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testBlogs(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForums(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDeals(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCategory(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testFullAddress(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDealsIn(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetReviews(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetReviewsCount(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetAverageRating(): void
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

    public function testProducts(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSeo(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testAddress(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testClaimedBy(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
