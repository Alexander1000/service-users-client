<?php declare(strict_types = 1);

namespace Alexander1000\Clients\Users;

class Response
{
    /**
     * @var mixed
     */
    private $result;

    /**
     * @var int|null
     */
    private $errorCode;

    /**
     * @var string|null
     */
    private $errorMessage;

    public function __construct($result, ?int $errorCode, ?string $errorMessage)
    {
        $this->result = $result;
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->errorCode !== null || $this->errorMessage !== null;
    }

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }
}
