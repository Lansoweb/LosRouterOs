<?php
namespace LosRouterOs\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{

    private $host;

    private $port = 8728;

    private $username;

    private $password;

    public function getHost()
    {
        return $this->host;
    }

    public function setHost($host)
    {
        $this->host = (string) $host;

        return $this;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function setPort($port)
    {
        $this->port = (int) $port;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = (string) $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = (string) $password;

        return $this;
    }
}
