<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\Job;

use StocksApiBundles\MessageClient\Event\AbstractJobEvent;

class JobCompleteEvent extends AbstractJobEvent
{
    const EVENT_NAME = 'job.complete';
}
