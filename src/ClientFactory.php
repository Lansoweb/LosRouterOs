<?php

declare(strict_types=1);

namespace LosRouterOs;

use Psr\Container\ContainerInterface;

class ClientFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $options = $container->get('config')['los']['router-os'] ?? [];

        return new Client($options['host'], $options['username'], $options['password'], $options['port']);
    }
}
