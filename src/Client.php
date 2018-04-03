<?php

declare(strict_types=1);

namespace LosRouterOs;

use PEAR2\Net\RouterOS\Client as RouterClient;
use PEAR2\Net\RouterOS\Request;
use PEAR2\Net\RouterOS\Response;
use PEAR2\Net\RouterOS\ResponseCollection;

class Client
{
    /** @var RouterClient */
    private $routerClient;

    /** @var ResponseCollection */
    private $lastResponse;

    /**
     * Client constructor.
     * @param string $host
     * @param string $username
     * @param string $password
     * @param int $port
     */
    public function __construct(string $host, string $username, string $password, int $port = 8727)
    {
        $this->routerClient = new RouterClient($host, $username, $password, $port);
    }

    /**
     * @return RouterClient
     */
    public function getRouterClient()
    {
        return $this->routerClient;
    }

    /**
     * @return array
     */
    public function getActives()
    {
        return $this->execute('/ip hotspot active print');
    }

    public function getScripts()
    {
        return $this->execute('/system script print');
    }

    /**
     * @param string $command
     * @return array
     */
    public function execute(string $command)
    {
        $request = new Request($command);
        $this->lastResponse = $this->routerClient->sendSync($request);

        $list = [];
        /** @var Response $response */
        foreach ($this->lastResponse as $response) {
            if ($response->getType() == Response::TYPE_DATA) {
                $list[] = $response->getIterator();
            }
        }

        return $list;
    }

    /**
     * @return ResponseCollection
     */
    public function lastResponse(): ResponseCollection
    {
        return $this->lastResponse;
    }
}
