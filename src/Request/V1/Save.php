<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Request\V1;

use NetworkTransport;

class Save extends NetworkTransport\Http\Request\Data
{
    public function __construct(Save\User $user)
    {
        parent::__construct(
            '/v1/user/save',
            'POST',
            [
                'Content-Type' => 'application/json',
            ],
            []
        );

        $this->data = $user;
    }
}
