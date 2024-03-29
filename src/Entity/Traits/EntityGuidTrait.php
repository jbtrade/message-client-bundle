<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity\Traits;

use StocksApiBundles\MessageClient\Entity\Interfaces\EntityGuidInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Traits EntityGuidTrait.
 */
trait EntityGuidTrait
{
    /**
     * @var \Ramsey\Uuid\Uuid
     *
     * @ORM\Column(name="guid", type="uuid", nullable=false)
     */
    protected $guid;

    /**
     * GuidAwareTrait constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setGuid(\Ramsey\Uuid\Uuid::uuid1());
    }

    /**
     * @return \Ramsey\Uuid\Uuid
     */
    public function getGuid(): \Ramsey\Uuid\UuidInterface
    {
        return $this->guid;
    }

    /**
     * @param \Ramsey\Uuid\Uuid $guid
     *
     * @return EntityGuidInterface
     */
    public function setGuid(\Ramsey\Uuid\UuidInterface $guid): EntityGuidInterface
    {
        $this->guid = $guid;

        return $this;
    }
}
