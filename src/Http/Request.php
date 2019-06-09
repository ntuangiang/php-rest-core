<?php

namespace Php\Framework\Http;

class Request
{
    /**
     * @var array
     */
    private $parameters;

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }

}