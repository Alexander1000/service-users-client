<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users;

use NetworkTransport;

class Client
{
    /**
     * @var NetworkTransport\Http\Transport
     */
    private $transport;

    /**
     * @var NetworkTransport\Http\Request\Builder
     */
    private $requestBuilder;

    public function __construct(
        NetworkTransport\Http\Transport $transport,
        NetworkTransport\Http\Request\Builder $requestBuilder
    ) {
        $this->transport = $transport;
        $this->requestBuilder = $requestBuilder;
    }

    public function getById(int $userId)
    {
        $response = $this->transport->send(
            new NetworkTransport\Http\Request(
                $this->requestBuilder,
                new Request\V1\Get($userId)
            )
        );

        if ($response->isError()) {
            throw new Exception(
                $response->getErrorMessage() ?? '',
                $response->getErrorCode() ?? 500
            );
        }
    }
}
