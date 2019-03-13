<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Response\V1;

class Email
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $statusId;

    /**
     * @var string
     */
    private $email;

    public function __construct(int $id, int $statusId, string $email)
    {
        $this->id = $id;
        $this->statusId = $statusId;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
