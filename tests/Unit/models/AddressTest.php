<?php

namespace models;

use App\Models\Address;
use Tests\TestCase;

/**
 * Class AddressTest.
 *
 * @covers \App\Models\Address
 */
final class AddressTest extends TestCase
{
    private Address $address;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->address = new Address();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->address);
    }

    public function testState(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCountry(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSeo(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
