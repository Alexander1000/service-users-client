<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Response\V1;

class User
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $statusId;

    /**
     * @var string|null
     */
    private $login;

    public function __construct(
        int $userId,
        int $statusId,
        ?string $login
    ) {
        $this->userId = $userId;
        $this->statusId = $statusId;
        $this->login = $login;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }
}
