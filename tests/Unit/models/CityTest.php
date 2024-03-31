<?php

namespace Tests\Unit\Models;

use App\Models\City;
use Tests\TestCase;

/**
 * Class CityTest.
 *
 * @covers \App\Models\City
 */
final class CityTest extends TestCase
{
    private City $city;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->city = new City();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->city);
    }

    public function testState(): void
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
