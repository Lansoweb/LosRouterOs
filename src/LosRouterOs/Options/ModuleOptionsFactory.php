<?php
namespace LosRouterOs\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sl)
    {
        $config = $sl->get('Configuration');
        return new ModuleOptions(isset($config['losrouteros']) ? $config['losrouteros'] : []);
    }
}