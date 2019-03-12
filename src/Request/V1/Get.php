<?php declare(stricts_type = 1);

namespace Alexander1000\Clients\Users\Request\V1;

use NetworkTransport;

class Get extends NetworkTransport\Http\Request\Data
{
    public function __construct(int $userId)
    {
        parent::__construct(
            '/v1/user/get',
            'POST',
            [
                'Content-Type' => 'application/json',
            ],
            []
        );

        $this->data['id'] = $userId;
    }
}
