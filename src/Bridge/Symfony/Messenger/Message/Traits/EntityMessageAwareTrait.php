<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\Traits;

use Ramsey\Uuid\UuidInterface;
use StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\EntityMessageAwareInterface;

/**
 * Traits EntityMessageAwareTrait.
 */
trait EntityMessageAwareTrait
{
    /**
     * @var UuidInterface
     */
    protected $entityIdentifier;

    /**
     * @var string
     */
    protected $entityClass;

    /**
     * EntityMessageAwareTrait constructor.
     *
     * @param string        $entityClass
     * @param UuidInterface $entityIdentifier
     */
    public function __construct(string $entityClass, UuidInterface $entityIdentifier)
    {
        $this->setEntityClass($entityClass);
        $this->setEntityIdentifier($entityIdentifier);
    }

    /**
     * @return mixed
     */
    public function getEntityClass(): string
    {
        return $this->entityClass;
    }

    /**
     * @param $entityClass
     *
     * @return EntityMessageAwareInterface
     */
    public function setEntityClass($entityClass): EntityMessageAwareInterface
    {
        $this->entityClass = $entityClass;

        return $this;
    }

    /**
     * @return UuidInterface
     */
    public function getEntityIdentifier(): UuidInterface
    {
        return $this->entityIdentifier;
    }

    /**
     * @param $entityIdentifier
     *
     * @return EntityMessageAwareInterface
     */
    public function setEntityIdentifier(UuidInterface $entityIdentifier): EntityMessageAwareInterface
    {
        $this->entityIdentifier = $entityIdentifier;

        return $this;
    }
}
