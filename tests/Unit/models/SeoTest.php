<?php

namespace Tests\Unit\Models;

use App\Models\Seo;
use Tests\TestCase;

/**
 * Class SeoTest.
 *
 * @covers \App\Models\Seo
 */
final class SeoTest extends TestCase
{
    private Seo $seo;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->seo = new Seo();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->seo);
    }

    public function testDeal(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testEvent(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCategory(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProduct(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testBlog(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCompany(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testAddress(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testJob(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
