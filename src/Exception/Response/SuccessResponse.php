<?php
declare (strict_types=1);
/**
 * @copyright
 * @version 1.0.0
 * @link
 */

namespace Lisettes\Utils\Exception\Response;

use Hyperf\Context\Context;

/**
 * SuccessResponse
 *
 * @package Lisettes\Utils\Exception\Response
 */
class SuccessResponse extends Response
{
    public function __construct(array $data, string $message = 'success', int $code = 1)
    {
        Context::set('__response__data__', $data);
        parent::__construct($message, $code);
    }
}