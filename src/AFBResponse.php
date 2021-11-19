<?php

class AFBResponse
{
    /**
     * @var int|null
     */
    private ?int $id;

    /**
     * @var int
     */
    private int $code;

    /**
     * @var array
     */
    private array $data;

    /**
     * @var AFBRequest|null
     */
    private ?AFBRequest $request;

    /**
     * @param int|null $id
     * @param int $code
     * @param array $data
     */
    public function __construct(?int $id, int $code, array $data)
    {
        $this->id = $id;
        $this->code = $code;
        $this->data = $data;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return AFBResponse
     */
    public function setId(?int $id): AFBResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return AFBResponse
     */
    public function setCode(int $code): AFBResponse
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return AFBResponse
     */
    public function setData(array $data): AFBResponse
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return AFBRequest|null
     */
    public function getRequest(): ?AFBRequest
    {
        return $this->request;
    }

    /**
     * @param AFBRequest|null $request
     * @return AFBResponse
     */
    public function setRequest(?AFBRequest $request): AFBResponse
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param $json
     * @return AFBResponse
     * @throws Exception
     */
    public static function fromJson($json) : AFBResponse
    {
        $decoded = json_decode($json, JSON_UNESCAPED_SLASHES);
        if (count($decoded) < 3) throw new Exception("Cannot handle response from server, incomplete or undefined format : $json");
        list($code, $id, $data) = $decoded;

        return new AFBResponse($id, $code, $data);
    }
}