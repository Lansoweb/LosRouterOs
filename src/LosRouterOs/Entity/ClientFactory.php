<?php
namespace LosRouterOs\Entity;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ClientFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sl)
    {
        $options = $sl->get('losrouteros.options');
        return new Client($options->getHost(), $options->getUsername(), $options->getPassword(), $options->getPort());
    }
}