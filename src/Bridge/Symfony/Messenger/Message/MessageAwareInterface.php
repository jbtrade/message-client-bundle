<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message;

use Ramsey\Uuid\UuidInterface;

/**
 * Interface MessageAwareInterface.
 */
interface MessageAwareInterface
{
    /**
     * @return UuidInterface
     */
    public function getIdentifier(): UuidInterface;

    /**
     * @param UuidInterface $identifier
     *
     * @return MessageAwareInterface
     */
    public function setIdentifier(UuidInterface $identifier): MessageAwareInterface;
}
