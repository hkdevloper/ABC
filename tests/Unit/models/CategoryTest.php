<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use Tests\TestCase;

/**
 * Class CategoryTest.
 *
 * @covers \App\Models\Category
 */
final class CategoryTest extends TestCase
{
    private Category $category;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->category = new Category();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->category);
    }

    public function testParent(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testChildren(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSeo(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProducts(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testBlogs(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCompanies(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDeals(): void
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

    public function testForums(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testScopeActive(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testScopeFeatured(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCountItem(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
