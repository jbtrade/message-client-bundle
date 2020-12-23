<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient;

use App\MessageClient\Protocol\Credentials;
use Bunny\Client;

/**
 * Interface SyncClientFactory.
 */
interface SyncClientFactory
{
    /**
     * @param Credentials|null $credentials
     *
     * @return Client
     */
    public function createClient(?Credentials $credentials): Client;
}
