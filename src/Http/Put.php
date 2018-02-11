<?php

namespace Corp104\Rester\Http;

use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * Put request
 */
class Put extends ResterRequestAbstract
{
    public function sendRequest(
        array $parsedBody = [],
        array $queryParams = [],
        array $guzzleOptions = []
    ): ResponseInterface {

        $guzzleOptions[RequestOptions::JSON] = $parsedBody;
        $guzzleOptions[RequestOptions::HEADERS]['Content-type'] = 'application/json; charset=UTF-8';
        $guzzleOptions[RequestOptions::HEADERS]['Expect'] = '100-continue';

        $this->uri->withQuery(
            $this->buildQueryString($queryParams)
        );

        return $this->httpClient->put((string)$this->uri, $guzzleOptions);
    }
}
