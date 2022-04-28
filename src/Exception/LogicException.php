<?php
declare (strict_types=1);

namespace Lisettes\Utils\Exception;

/**
 * LogicException
 */
class LogicException extends \RuntimeException
{
    public function __construct(string $message, int $code = 0)
    {
        parent::__construct($message, $code);
    }
}