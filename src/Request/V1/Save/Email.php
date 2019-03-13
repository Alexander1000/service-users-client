<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Request\V1\Save;

class Email implements \JsonSerializable
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
    private $email;

    public function __construct(
        ?int $id,
        ?int $statusId,
        string $email
    ) {
        $this->id = $id;
        $this->statusId = $statusId;
        $this->email = $email;

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
            'email' => $this->email,
        ];
        
        if ($this->id !== null) {
            $params['id'] = $this->id;
            $params['statusId'] = $this->statusId;
        }

        return $params;
    }
}