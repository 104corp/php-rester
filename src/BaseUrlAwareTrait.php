<?php

namespace Corp104\Rester;

/**
 * Base URL trait
 */
trait BaseUrlAwareTrait
{
    /**
     * @var null|string
     */
    protected $baseUrl;

    /**
     * @return string
     * @throws \BadMethodCallException
     */
    public function getBaseUrl(): string
    {
        if (null === $this->baseUrl) {
            throw new \BadMethodCallException('baseUrl is not set yet.');
        }

        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl)
    {
        if ('/' === substr($baseUrl, -1)) {
            $baseUrl = substr($baseUrl, 0, -1);
        }

        $this->baseUrl = $baseUrl;
    }
}