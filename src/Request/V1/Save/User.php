<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Request\V1\Save;

class User
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $statusId;

    /**
     * @var string|null
     */
    private $login;

    /**
     * @var array|null
     */
    private $emails;

    /**
     * @var array|null
     */
    private $phones;

    public function __construct(
        ?int $id,
        ?int $statusId,
        ?string $login,
        ?array $emails,
        ?array $phones
    ) {
        $this->id = $id;
        $this->statusId = $statusId;
        $this->login = $login;
        $this->emails = $emails;
        $this->phones = $phones;
    }
}
