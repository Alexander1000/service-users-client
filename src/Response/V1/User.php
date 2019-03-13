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

    /**
     * @var Email[]
     */
    private $emails;

    /**
     * @var Phone[]
     */
    private $phones;

    public function __construct(
        int $userId,
        int $statusId,
        ?string $login,
        array $emails,
        array $phones
    ) {
        $this->userId = $userId;
        $this->statusId = $statusId;
        $this->login = $login;
        $this->emails = $emails;
        $this->phones = $phones;
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

    /**
     * @return Email[]
     */
    public function getEmails(): array
    {
        return $this->emails;
    }

    /**
     * @return Phone[]
     */
    public function getPhones(): array
    {
        return $this->phones;
    }
}
