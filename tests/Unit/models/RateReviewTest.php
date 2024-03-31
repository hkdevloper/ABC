<?php

namespace Tests\Unit\Models;

use App\Models\RateReview;
use Tests\TestCase;

/**
 * Class RateReviewTest.
 *
 * @covers \App\Models\RateReview
 */
final class RateReviewTest extends TestCase
{
    private RateReview $rateReview;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->rateReview = new RateReview();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->rateReview);
    }

    public function testUser(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCompany(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProduct(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testEvent(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
