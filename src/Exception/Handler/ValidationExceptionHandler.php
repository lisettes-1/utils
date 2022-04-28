<?php
declare (strict_types=1);
/**
 * @copyright
 * @version 1.0.0
 * @link
 */

namespace Lisettes\Utils\Exception\Handler;

use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Codec\Json;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * ValidationExceptionHandler
 *
 * @package Lisettes\Utils\Exception\Handler
 */
class ValidationExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response): ResponseInterface
    {
        /** @var ValidationException $throwable */
        $data = [
            'status'    => 403,
            'message'   => $throwable->validator->errors()->first(),
            'result'    => [],
            'timestamp' => time()
        ];
        $this->stopPropagation();

        return $response->withStatus(200)
            ->withBody(new SwooleStream(Json::encode($data, JSON_UNESCAPED_UNICODE)))
            ->withHeader('Content-Type', 'application/json;charset=utf-8');
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof ValidationException;
    }
}