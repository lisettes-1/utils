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
use Hyperf\Context\Context;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use Lisettes\Utils\Exception\LogicException;
use Lisettes\Utils\Exception\Response\Response;
use Lisettes\Utils\Exception\Response\SuccessResponse;

/**
 * ResponseExceptionHandler
 *
 * @package Lisettes\Utils\Exception\Handler
 */
class ResponseExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response): ResponseInterface
    {
        $data = [
            'status'    => $throwable->getCode(),
            'message'   => $throwable->getMessage(),
            'result'    => [],
            'timestamp' => time()
        ];
        if ($throwable instanceof SuccessResponse) {
            $data['result'] = Context::get('__response__data__', []);
        }
        $this->stopPropagation();

        return $response->withStatus(200)
            ->withBody(new SwooleStream(Json::encode($data, JSON_UNESCAPED_UNICODE)))
            ->withHeader('Content-Type', 'application/json;charset=utf-8');
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof Response || $throwable instanceof LogicException;
    }
}