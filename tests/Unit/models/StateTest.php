<?php

namespace Tests\Unit\Models;

use App\Models\State;
use Tests\TestCase;

/**
 * Class StateTest.
 *
 * @covers \App\Models\State
 */
final class StateTest extends TestCase
{
    private State $state;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->state = new State();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->state);
    }

    public function testCountry(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCities(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testAddresses(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
