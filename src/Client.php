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
        $response = $this->executeRequest(new Request\V1\Get($userId));
    }

    /**
     * @param NetworkTransport\Http\Request\Data $requestData
     * @return array
     * @throws \Alexander1000\Clients\Users\Exception
     * @throws \NetworkTransport\Http\Exception\MethodNotAllowed
     */
    protected function executeRequest(NetworkTransport\Http\Request\Data $requestData): array
    {
        $response = $this->transport->send(
            new NetworkTransport\Http\Request($this->requestBuilder, $requestData)
        );

        if ($response->isError()) {
            throw new Exception(
                $response->getErrorMessage() ?? '',
                $response->getErrorCode() ?? 500
            );
        }

        $data = json_decode($response->getResponse() ?? '', true);
        if (json_last_error()) {
            throw new Exception('cannot parse response', 501);
        }

        if (isset($data['error'])) {
            throw new Exception($data['error']['message'], $data['error']['code']);
        }

        return $data;
    }
}
