<?php
namespace LosRouterOs\Entity;

use PEAR2\Net\RouterOS\Response;

class Active
{

    private $routerId;

    private $server;

    private $user;

    private $address;

    private $macAddress;

    private $loginBy;

    private $uptime;

    private $keepaliveTimeout;

    private $radius;

    public function __construct(Response $response)
    {
        $options = $response->getIterator();
        $this->routerId = $options['.id'];
        $this->server = $options['server'];
        $this->user = $options['user'];
        $this->address = $options['address'];
        $this->macAddress = $options['mac-address'];
        $this->loginBy = $options['login-by'];
        $this->keepaliveTimeout = $options['keepalive-timeout'];
        $this->radius = $options['radius'];
    }

    public function getRouterId()
    {
        return $this->routerId;
    }

    public function setRouterId($routerId)
    {
        $this->routerId = $routerId;

        return $this;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getMacAddress()
    {
        return $this->macAddress;
    }

    public function setMacAddress($macAddress)
    {
        $this->macAddress = $macAddress;

        return $this;
    }

    public function getLoginBy()
    {
        return $this->loginBy;
    }

    public function setLoginBy($loginBy)
    {
        $this->loginBy = $loginBy;

        return $this;
    }

    public function getUptime()
    {
        return $this->uptime;
    }

    public function setUptime($uptime)
    {
        $this->uptime = $uptime;

        return $this;
    }

    public function getKeepaliveTimeout()
    {
        return $this->keepaliveTimeout;
    }

    public function setKeepaliveTimeout($keepaliveTimeout)
    {
        $this->keepaliveTimeout = $keepaliveTimeout;

        return $this;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }
}
