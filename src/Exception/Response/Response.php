<?php
declare (strict_types=1);
/**
 * @copyright
 * @version 1.0.0
 * @link
 */

namespace Lisettes\Utils\Exception\Response;

/**
 * Response
 *
 * @package Lisettes\Utils\Exception\Response
 */
class Response extends \RuntimeException
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}