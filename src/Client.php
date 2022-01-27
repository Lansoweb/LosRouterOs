<?php

declare(strict_types=1);

namespace LosRouterOs;

use PEAR2\Net\RouterOS\Client as RouterClient;
use PEAR2\Net\RouterOS\Request;
use PEAR2\Net\RouterOS\Response;
use PEAR2\Net\RouterOS\ResponseCollection;

use function assert;

class Client
{
    /** @var RouterClient */
    private $routerClient;

    /** @var ResponseCollection */
    private $lastResponse;

    public function __construct(string $host, string $username, string $password, int $port = 8727, int $timeout = 60)
    {
        $this->routerClient = new RouterClient(
            $host,
            $username,
            $password,
            $port,
            false,
            $timeout
        );
    }

    /**
     * @return RouterClient
     */
    public function getRouterClient()
    {
        return $this->routerClient;
    }

    /**
     * @return array<int,mixed>
     */
    public function getActives()
    {
        return $this->execute('/ip hotspot active print');
    }

    /**
     * @return array<int,mixed>
     */
    public function getScripts()
    {
        return $this->execute('/system script print');
    }

    /**
     * @return array<int,mixed>
     */
    public function execute(string $command)
    {
        $request            = new Request($command);
        $this->lastResponse = $this->routerClient->sendSync($request);

        $list = [];
        foreach ($this->lastResponse as $response) {
            assert($response instanceof Response);
            if ($response->getType() === Response::TYPE_DATA) {
                $list[] = $response->getIterator();
            }
        }

        return $list;
    }

    public function lastResponse(): ResponseCollection
    {
        return $this->lastResponse;
    }
}
