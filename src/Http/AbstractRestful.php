<?php

namespace Rest\Http;

abstract class AbstractRestful
{
    /**
     * @var string
     */
    private $api;

    public function __construct(string $api)
    {
        $this->api = $api;
    }

    public function get() {

    }

    public function post() {

    }

    public function put() {

    }

    public function delete() {

    }

    /**
     * @return string
     */
    public function getApi(): string
    {
        return $this->api;
    }

    /**
     * @param string $api
     */
    public function setApi(string $api): void
    {
        $this->api = $api;
    }

}