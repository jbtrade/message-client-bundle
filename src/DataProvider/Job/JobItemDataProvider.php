<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\DataProvider\Job;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ItemNotFoundException;
use StocksApiBundles\MessageClient\Entity\Job;
use StocksApiBundles\MessageClient\Entity\Manager\JobEntityManager;
use StocksApiBundles\MessageClient\Service\JobService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class JobItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    const RESOURCE_CLASS = Job::class;
    const OPERATION_NAME = 'get';

    /**
     * @var JobEntityManager
     */
    private $entityManager;

    /**
     * @var JobService
     */
    private $jobService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * JobItemDataProvider constructor.
     *
     * @param JobEntityManager $entityManager
     * @param JobService       $jobService
     * @param LoggerInterface  $logger
     */
    public function __construct(
        JobEntityManager $entityManager,
        JobService $jobService,
        LoggerInterface $logger
    ) {
        $this->entityManager = $entityManager;
        $this->jobService = $jobService;
        $this->logger = $logger;
    }

    /**
     * @param string      $resourceClass
     * @param string|null $operationName
     * @param array       $context
     *
     * @return bool
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return self::RESOURCE_CLASS === $resourceClass && self::OPERATION_NAME === $operationName;
    }

    /**
     * @param string           $resourceClass
     * @param array|int|string $id
     * @param string|null      $operationName
     * @param array            $context
     *
     * @return object|void|null
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        $job = $this->entityManager->findOneBy(['guid' => $id]);

        if (!$job instanceof Job) {
            throw new ItemNotFoundException('Job Not Found');
        }

        return $job->setPercentComplete($this->jobService->calculateJobPercentageComplete($job));
    }
}
