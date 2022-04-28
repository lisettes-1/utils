<?php
declare (strict_types=1);
/**
 * @copyright
 * @version 1.0.0
 * @link
 */

namespace Lisettes\Utils\Exception\Response;

/**
 * ErrorResponse
 *
 * @package Lisettes\Utils\Exception\Response
 */
class ErrorResponse extends Response
{
    public function __construct(string $message, int $code = 0)
    {
        parent::__construct($message, $code);
    }
}