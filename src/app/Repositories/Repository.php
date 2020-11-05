<?php


namespace App\Repositories;


class Repository
{
    /**
     * @var array
     */
    protected array $parameters;

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function setParameter(string $key, $value): Repository
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    /**
     * @return array
     */
    protected function getParameters(): array
    {
        $this->parameters;
    }

    /**
     * @param string $parameter
     * @return mixed|null
     */
    protected function getParameter(string $parameter)
    {
        return $this->parameters[$parameter] ?? null;
    }
}
