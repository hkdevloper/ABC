<?php

namespace Tests\Unit\Models;

use App\Models\DirectMessage;
use Tests\TestCase;

/**
 * Class DirectMessageTest.
 *
 * @covers \App\Models\DirectMessage
 */
final class DirectMessageTest extends TestCase
{
    private DirectMessage $directMessage;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->directMessage = new DirectMessage();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->directMessage);
    }

    public function testCompany(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
