<?php

namespace Tests\Unit\Models;

use App\Models\Job;
use Tests\TestCase;

/**
 * Class JobTest.
 *
 * @covers \App\Models\Job
 */
final class JobTest extends TestCase
{
    private Job $job;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->job = new Job();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->job);
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

    public function testAddress(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testFullAddress(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
