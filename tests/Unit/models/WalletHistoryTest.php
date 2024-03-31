<?php

namespace Tests\Unit\Models;

use App\Models\WalletHistory;
use Tests\TestCase;

/**
 * Class WalletHistoryTest.
 *
 * @covers \App\Models\WalletHistory
 */
final class WalletHistoryTest extends TestCase
{
    private WalletHistory $walletHistory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->walletHistory = new WalletHistory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->walletHistory);
    }

    public function testUser(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetAmountAttribute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
