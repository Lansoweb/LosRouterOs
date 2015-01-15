<?php
namespace LosRouterOs\Entity;

use PEAR2\Net\RouterOS\Client as RouterClient;
use PEAR2\Net\RouterOS\Request;
use PEAR2\Net\RouterOS\Response;

class Client
{

    private $routerClient;

    public function __construct($host, $username, $password = null, $port = 8727)
    {
        $this->routerClient = new RouterClient($host, $username, $password, $port);
    }

    public function getRouterClient()
    {
        return $this->routerClient;
    }

    public function getActives()
    {
        $request = new Request('/ip hotspot active print');
        $ret = $this->routerClient->sendSync($request);

        $actives=[];
        /* @var $response \PEAR2\Net\RouterOS\Response */
        foreach ($ret as $response) {
            if ($response->getType() == Response::TYPE_DATA) {
                $actives[] = new Active($response);
            }
        }

        return $actives;
    }
}