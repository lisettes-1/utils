<?php
declare (strict_types=1);

namespace Lisettes\Utils;

use Hyperf\Logger\LoggerFactory;
use Hyperf\Utils\ApplicationContext;
use Psr\Log\LoggerInterface;

/**
 * Logger
 *
 * @package Lisettes\Utils
 */
class Logger
{
    /**
     * @param string $name
     * @param string $group
     *
     * @return LoggerInterface
     */
    public static function get(string $name, string $group = 'default'): LoggerInterface
    {
        return ApplicationContext::getContainer()->get(LoggerFactory::class)->get($name, $group);
    }
}