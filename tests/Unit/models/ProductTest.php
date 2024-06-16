<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Tests\TestCase;

/**
 * Class ProductTest.
 *
 * @covers \App\Models\Product
 */
final class ProductTest extends TestCase
{
    private Product $product;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->product = new Product();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->product);
    }

    public function testCompany(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testClaimedBy(): void
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
