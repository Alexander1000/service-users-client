<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Request\V1;

use NetworkTransport;

class GetByEmail extends NetworkTransport\Http\Request\Data
{
    public function __construct(string $email)
    {
        parent::__construct(
            '/v1/user/get_by_email',
            'POST',
            [
                'Content-Type' => 'application/json',
            ],
            []
        );

        $this->data['email'] = $email;
    }
}
