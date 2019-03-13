<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Response\V1;

class Phone
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
    private $phone;

    public function __construct(int $id, int $statusId, string $phone)
    {
        $this->id = $id;
        $this->statusId = $statusId;
        $this->phone = $phone;
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
    public function getPhone(): string
    {
        return $this->phone;
    }
}
