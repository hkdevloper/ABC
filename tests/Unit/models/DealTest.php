<?php

namespace Tests\Unit\Models;

use App\Models\Deal;
use Tests\TestCase;

/**
 * Class DealTest.
 *
 * @covers \App\Models\Deal
 */
final class DealTest extends TestCase
{
    private Deal $deal;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->deal = new Deal();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deal);
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

    public function testSeo(): void
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
}
