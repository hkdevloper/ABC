<?php

namespace Tests\Unit\Models;

use App\Models\Claims;
use Tests\TestCase;

/**
 * Class ClaimsTest.
 *
 * @covers \App\Models\Claims
 */
final class ClaimsTest extends TestCase
{
    private Claims $claims;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->claims = new Claims();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->claims);
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
}
