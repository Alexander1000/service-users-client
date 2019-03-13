<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users\Request\V1\Save;

class User implements \JsonSerializable
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

        if ($this->id !== null) {
            if ($this->statusId === null) {
                throw new \InvalidArgumentException('statusId is required');
            }
        }

        if ($this->login === null && empty($this->emails) && empty($this->phones)) {
            throw new \InvalidArgumentException('not defined identifier: login or phone or email');
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $params = [];

        if ($this->id !== null) {
            $params = [
                'id' => $this->id,
                'statusId' => $this->statusId,
            ];
        }

        $params['login'] = $this->login;

        if (!empty($this->emails)) {
            $params['emails'] = $this->emails;
        }

        if (!empty($this->phones)) {
            $params['phones'] = $this->phones;
        }

        return $params;
    }
}
