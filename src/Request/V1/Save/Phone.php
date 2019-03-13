<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Request\V1\Save;

class Phone implements \JsonSerializable
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
     * @var string
     */
    private $phone;

    public function __construct(
        ?int $id,
        ?int $statusId,
        string $phone
    ) {
        $this->id = $id;
        $this->statusId = $statusId;
        $this->phone = $phone;

        if ($this->id !== null) {
            if ($this->statusId === null) {
                throw new \InvalidArgumentException('statusId is required');
            }
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $params = [
            'phone' => $this->phone,
        ];

        if ($this->id !== null) {
            $params['id'] = $this->id;
            $params['statusId'] = $this->statusId;
        }

        return $params;
    }
}