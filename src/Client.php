<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users;

use NetworkTransport;

class Client
{
    private NetworkTransport\Http\Transport $transport;

    private NetworkTransport\Http\Request\Builder $requestBuilder;

    public function __construct(
        NetworkTransport\Http\Transport $transport,
        NetworkTransport\Http\Request\Builder $requestBuilder
    ) {
        $this->transport = $transport;
        $this->requestBuilder = $requestBuilder;
    }

    /**
     * @param int $userId
     * @return Response\V1\User|null
     * @throws Exception
     * @throws NetworkTransport\Http\Exception\MethodNotAllowed
     */
    public function getById(int $userId): ?Response\V1\User
    {
        $result = $this->executeRequest(new Request\V1\Get($userId));

        if ($result->isError()) {
            if ($result->getErrorCode() === 404) {
                return null;
            }
            throw new Exception($result->getErrorMessage() ?? '', $result->getErrorCode() ?? 500);
        }

        $response = $result->getResult();

        return new Response\V1\User(
            (int) $response['id'],
            (int) $response['statusId'],
            $response['login'],
            array_map(
                function (array $row) {
                    return new Response\V1\Email(
                        (int) $row['id'],
                        (int) $row['statusId'],
                        $row['email']
                    );
                },
                $response['emails']
            ),
            array_map(
                function (array $row) {
                    return new Response\V1\Phone(
                        (int) $row['id'],
                        (int) $row['statusId'],
                        $row['phone']
                    );
                },
                $response['phones']
            )
        );
    }

    /**
     * @param string $email
     * @return Response\V1\User|null
     * @throws Exception
     * @throws NetworkTransport\Http\Exception\MethodNotAllowed
     */
    public function getByEmail(string $email): ?Response\V1\User
    {
        $result = $this->executeRequest(new Request\V1\GetByEmail($email));

        if ($result->isError()) {
            if ($result->getErrorCode() === 404) {
                return null;
            }
            throw new Exception($result->getErrorMessage() ?? '', $result->getErrorCode() ?? 500);
        }

        $response = $result->getResult();

        return new Response\V1\User(
            (int) $response['id'],
            (int) $response['statusId'],
            $response['login'],
            array_map(
                function (array $row) {
                    return new Response\V1\Email(
                        (int) $row['id'],
                        (int) $row['statusId'],
                        $row['email']
                    );
                },
                $response['emails']
            ),
            array_map(
                function (array $row) {
                    return new Response\V1\Phone(
                        (int) $row['id'],
                        (int) $row['statusId'],
                        $row['phone']
                    );
                },
                $response['phones']
            )
        );
    }

    /**
     * @param Request\V1\Save\User $user
     * @return Response\V1\User
     * @throws Exception
     * @throws NetworkTransport\Http\Exception\MethodNotAllowed
     */
    public function save(Request\V1\Save\User $user): Response\V1\User
    {
        $result = $this->executeRequest(new Request\V1\Save($user));
        if ($result->isError()) {
            throw new Exception($result->getErrorMessage() ?? '', $result->getErrorCode() ?? 500);
        }

        $response = $result->getResult();

        return new Response\V1\User(
            (int) $response['id'],
            (int) $response['statusId'],
            $response['login'],
            array_map(
                function (array $row) {
                    return new Response\V1\Email(
                        (int) $row['id'],
                        (int) $row['statusId'],
                        $row['email']
                    );
                },
                $response['emails']
            ),
            array_map(
                function (array $row) {
                    return new Response\V1\Phone(
                        (int) $row['id'],
                        (int) $row['statusId'],
                        $row['phone']
                    );
                },
                $response['phones']
            )
        );
    }

    /**
     * @param NetworkTransport\Http\Request\Data $requestData
     * @return Response
     * @throws \Alexander1000\Clients\Users\Exception
     * @throws \NetworkTransport\Http\Exception\MethodNotAllowed
     */
    protected function executeRequest(NetworkTransport\Http\Request\Data $requestData): Response
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

        $errCode = null;
        $errMsg = null;

        if (isset($data['error'])) {
            $errCode = (int) $data['error']['code'];
            $errMsg = $data['error']['message'];
        }

        return new Response($data['result'] ?? null, $errCode, $errMsg);
    }
}
